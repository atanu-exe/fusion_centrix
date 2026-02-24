<?php

namespace App\Http\Middleware;

use App\Models\PageVisit;
use App\Models\VisitorSession;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use App\Services\BotDetectionService;

class TrackPageVisit
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Only track GET requests and non-AJAX requests
        if ($request->method() !== 'GET' || $request->ajax()) {
            return $response;
        }

        // Skip admin and API routes
        if ($request->is('admin/*') || $request->is('api/*')) {
            return $response;
        }

        // Skip assets
        $path = $request->path();
        if (preg_match('/\.(css|js|jpg|jpeg|png|gif|ico|svg|woff|woff2|ttf|eot)$/i', $path)) {
            return $response;
        }

        // Detect bots
        $isBot = \App\Services\BotDetectionService::detectBot($request->userAgent(), $request->ip(), $request->headers->all());
        if ($isBot) {
            return $next($request); // Skip tracking for bots
        }

        try {
            $this->trackVisit($request);
        } catch (\Exception $e) {
            // Log error but don't interrupt the request
            \Log::error('Tracking error: ' . $e->getMessage());
        }

        return $response;
    }

    protected function trackVisit(Request $request): void
    {
        $visitorId = $this->getOrCreateVisitorId($request);
        $sessionId = session()->getId();
        $ipAddress = $request->ip();

        // Detect device info
        $agent = new Agent();
        $agent->setUserAgent($request->userAgent());

        $deviceType = $agent->isTablet() ? 'tablet' : ($agent->isMobile() ? 'mobile' : 'desktop');
        $browser = $agent->browser();
        $os = $agent->platform();

        // Check if returning visitor
        $isReturning = PageVisit::where('visitor_id', $visitorId)
            ->where('created_at', '<', now()->subHours(24))
            ->exists();

        // Get location (basic - use a service like MaxMind for production)
        $location = $this->getLocationFromIp($ipAddress);

        // Create page visit record
        PageVisit::create([
            'session_id' => $sessionId,
            'visitor_id' => $visitorId,
            'ip_address' => $ipAddress,
            'url' => $request->fullUrl(),
            'page_title' => null, // Can be set via JS
            'referrer' => $request->header('referer'),
            'user_agent' => $request->userAgent(),
            'device_type' => $deviceType,
            'browser' => $browser,
            'os' => $os,
            'country' => $location['country'] ?? null,
            'city' => $location['city'] ?? null,
            'region' => $location['region'] ?? null,
            'is_returning_visitor' => $isReturning,
            'user_id' => auth()->id(),
        ]);

        // Update or create session
        $this->updateSession($visitorId, $sessionId, $request, $deviceType, $browser, $os, $location, $isReturning);
    }

    protected function getOrCreateVisitorId(Request $request): string
    {
        $cookieName = 'fc_visitor_id';
        $visitorId = $request->cookie($cookieName);

        if (!$visitorId) {
            $visitorId = Str::uuid()->toString();
            cookie()->queue($cookieName, $visitorId, 60 * 24 * 365); // 1 year
        }

        return $visitorId;
    }

    protected function updateSession(
        string $visitorId,
        string $sessionId,
        Request $request,
        string $deviceType,
        ?string $browser,
        ?string $os,
        array $location,
        bool $isReturning
    ): void {
        $session = VisitorSession::where('session_id', $sessionId)->first();

        if ($session) {
            $session->increment('page_views');
            $session->update([
                'exit_page' => $request->fullUrl(),
                'ended_at' => now(),
                'duration' => now()->diffInSeconds($session->started_at),
            ]);
        } else {
            VisitorSession::create([
                'visitor_id' => $visitorId,
                'session_id' => $sessionId,
                'ip_address' => $request->ip(),
                'country' => $location['country'] ?? null,
                'city' => $location['city'] ?? null,
                'device_type' => $deviceType,
                'browser' => $browser,
                'os' => $os,
                'landing_page' => $request->fullUrl(),
                'exit_page' => $request->fullUrl(),
                'referrer' => $request->header('referer'),
                'utm_source' => $request->get('utm_source'),
                'utm_medium' => $request->get('utm_medium'),
                'utm_campaign' => $request->get('utm_campaign'),
                'page_views' => 1,
                'is_returning_visitor' => $isReturning,
                'started_at' => now(),
            ]);
        }
    }

    protected function getLocationFromIp(string $ip): array
    {
        // For localhost/private IPs
        if (in_array($ip, ['127.0.0.1', '::1']) || filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            return ['country' => 'Local', 'city' => 'Local', 'region' => null];
        }

        // Try to get location from free IP API
        try {
            $response = @file_get_contents("http://ip-api.com/json/{$ip}?fields=status,country,regionName,city,lat,lon");
            if ($response) {
                $data = json_decode($response, true);
                if ($data && $data['status'] === 'success') {
                    return [
                        'country' => $data['country'] ?? null,
                        'city' => $data['city'] ?? null,
                        'region' => $data['regionName'] ?? null,
                        'latitude' => $data['lat'] ?? null,
                        'longitude' => $data['lon'] ?? null,
                    ];
                }
            }
        } catch (\Exception $e) {
            // Silently fail
        }

        return [];
    }
}
