<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\PageVisit;
use App\Models\VisitorSession;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    /**
     * Analytics overview
     */
    public function overview(Request $request)
    {
        $period = (int) $request->get('period', 30);
        $startDate = Carbon::now()->subDays($period);

        // Real tracking stats
        $totalViews = PageVisit::where('created_at', '>=', $startDate)->count();
        $uniqueVisitors = PageVisit::where('created_at', '>=', $startDate)
            ->distinct('visitor_id')->count('visitor_id');
        $returningVisitors = PageVisit::where('created_at', '>=', $startDate)
            ->where('is_returning_visitor', true)
            ->distinct('visitor_id')->count('visitor_id');

        // Previous period for growth calculation
        $prevStartDate = Carbon::now()->subDays($period * 2);
        $prevEndDate = $startDate;
        $prevViews = PageVisit::whereBetween('created_at', [$prevStartDate, $prevEndDate])->count();
        $prevVisitors = PageVisit::whereBetween('created_at', [$prevStartDate, $prevEndDate])
            ->distinct('visitor_id')->count('visitor_id');

        $viewsGrowth = $prevViews > 0 ? round((($totalViews - $prevViews) / $prevViews) * 100, 1) : 0;
        $visitorsGrowth = $prevVisitors > 0 ? round((($uniqueVisitors - $prevVisitors) / $prevVisitors) * 100, 1) : 0;

        // Average session duration
        $avgDuration = VisitorSession::where('created_at', '>=', $startDate)
            ->where('duration', '>', 0)
            ->avg('duration') ?? 0;
        $avgTimeMinutes = floor($avgDuration / 60);
        $avgTimeSeconds = $avgDuration % 60;
        $avgTime = sprintf('%d:%02d', $avgTimeMinutes, $avgTimeSeconds);

        // Bounce rate (sessions with only 1 page view)
        $totalSessions = VisitorSession::where('created_at', '>=', $startDate)->count();
        $bounceSessions = VisitorSession::where('created_at', '>=', $startDate)
            ->where('page_views', 1)->count();
        $bounceRate = $totalSessions > 0 ? round(($bounceSessions / $totalSessions) * 100, 1) : 0;

        $stats = [
            'total_views' => $totalViews,
            'views_growth' => $viewsGrowth,
            'unique_visitors' => $uniqueVisitors,
            'visitors_growth' => $visitorsGrowth,
            'avg_time' => $avgTime,
            'bounce_rate' => $bounceRate,
        ];

        // Traffic sources
        $trafficSources = $this->getTrafficSources($startDate);

        // Top pages
        $topPages = PageVisit::where('created_at', '>=', $startDate)
            ->select('url', DB::raw('COUNT(*) as visits'))
            ->groupBy('url')
            ->orderByDesc('visits')
            ->take(10)
            ->get();

        // Top countries
        $topCountries = PageVisit::where('created_at', '>=', $startDate)
            ->whereNotNull('country')
            ->select('country', DB::raw('COUNT(*) as visits'))
            ->groupBy('country')
            ->orderByDesc('visits')
            ->take(10)
            ->get();

        // Device distribution
        $devices = PageVisit::where('created_at', '>=', $startDate)
            ->select('device_type', DB::raw('COUNT(*) as count'))
            ->groupBy('device_type')
            ->get()
            ->mapWithKeys(function ($item) use ($totalViews) {
                $percentage = $totalViews > 0 ? round(($item->count / $totalViews) * 100, 1) : 0;
                return [$item->device_type => $percentage];
            });

        // Browser distribution
        $browsers = PageVisit::where('created_at', '>=', $startDate)
            ->whereNotNull('browser')
            ->select('browser', DB::raw('COUNT(*) as count'))
            ->groupBy('browser')
            ->orderByDesc('count')
            ->take(5)
            ->get();

        // Popular blog posts
        $popularPosts = Blog::where('is_published', true)
            ->orderBy('views', 'desc')
            ->take(10)
            ->get();

        // Popular categories
        $popularCategories = BlogCategory::withCount('blogs')
            ->orderBy('blogs_count', 'desc')
            ->take(5)
            ->get();

        // Daily stats for chart
        $dailyStats = [];
        for ($i = min($period, 30) - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dailyStats[] = [
                'date' => $date->format('M d'),
                'views' => PageVisit::whereDate('created_at', $date)->count(),
                'visitors' => PageVisit::whereDate('created_at', $date)
                    ->distinct('visitor_id')->count('visitor_id'),
            ];
        }

        return view('admin.analytics.overview', compact(
            'stats',
            'trafficSources',
            'topPages',
            'topCountries',
            'devices',
            'browsers',
            'popularPosts',
            'popularCategories',
            'dailyStats',
            'period'
        ));
    }

    /**
     * Real-time visitors
     */
    public function realtime()
    {
        $fiveMinutesAgo = now()->subMinutes(5);

        $activeVisitors = PageVisit::where('created_at', '>=', $fiveMinutesAgo)
            ->select('visitor_id', 'url', 'country', 'city', 'device_type', 'browser', 'created_at')
            ->orderByDesc('created_at')
            ->get()
            ->unique('visitor_id');

        $activeCount = $activeVisitors->count();

        // Current page distribution
        $currentPages = PageVisit::where('created_at', '>=', $fiveMinutesAgo)
            ->select('url', DB::raw('COUNT(DISTINCT visitor_id) as visitors'))
            ->groupBy('url')
            ->orderByDesc('visitors')
            ->take(10)
            ->get();

        return view('admin.analytics.realtime', compact('activeVisitors', 'activeCount', 'currentPages'));
    }

    /**
     * Detailed page analytics
     */
    public function pages(Request $request)
    {
        $period = (int) $request->get('period', 30);
        $startDate = Carbon::now()->subDays($period);

        $pages = PageVisit::where('created_at', '>=', $startDate)
            ->select(
                'url',
                DB::raw('COUNT(*) as views'),
                DB::raw('COUNT(DISTINCT visitor_id) as unique_visitors'),
                DB::raw('AVG(time_on_page) as avg_time'),
                DB::raw('SUM(CASE WHEN is_bounce = 1 THEN 1 ELSE 0 END) as bounces')
            )
            ->groupBy('url')
            ->orderByDesc('views')
            ->paginate(20);

        return view('admin.analytics.pages', compact('pages', 'period'));
    }

    /**
     * Geographic analytics
     */
    public function locations(Request $request)
    {
        $period = (int) $request->get('period', 30);
        $startDate = Carbon::now()->subDays($period);

        $countries = PageVisit::where('created_at', '>=', $startDate)
            ->whereNotNull('country')
            ->select(
                'country',
                DB::raw('COUNT(*) as views'),
                DB::raw('COUNT(DISTINCT visitor_id) as visitors')
            )
            ->groupBy('country')
            ->orderByDesc('visitors')
            ->paginate(20);

        $cities = PageVisit::where('created_at', '>=', $startDate)
            ->whereNotNull('city')
            ->select(
                'city',
                'country',
                DB::raw('COUNT(*) as views'),
                DB::raw('COUNT(DISTINCT visitor_id) as visitors')
            )
            ->groupBy('city', 'country')
            ->orderByDesc('visitors')
            ->take(50)
            ->get();

        return view('admin.analytics.locations', compact('countries', 'cities', 'period'));
    }

    protected function getTrafficSources(Carbon $startDate): array
    {
        $total = VisitorSession::where('created_at', '>=', $startDate)->count();

        if ($total === 0) {
            return [
                ['name' => 'Direct', 'value' => 0, 'color' => '#0d6efd'],
                ['name' => 'Organic', 'value' => 0, 'color' => '#198754'],
                ['name' => 'Social', 'value' => 0, 'color' => '#ffc107'],
                ['name' => 'Referral', 'value' => 0, 'color' => '#dc3545'],
            ];
        }

        // Direct (no referrer)
        $direct = VisitorSession::where('created_at', '>=', $startDate)
            ->whereNull('referrer')->count();

        // Organic (search engines)
        $searchEngines = ['google', 'bing', 'yahoo', 'duckduckgo', 'baidu'];
        $organic = VisitorSession::where('created_at', '>=', $startDate)
            ->where(function ($q) use ($searchEngines) {
                foreach ($searchEngines as $engine) {
                    $q->orWhere('referrer', 'like', "%{$engine}%");
                }
            })->count();

        // Social
        $socialSites = ['facebook', 'twitter', 'linkedin', 'instagram', 'youtube', 'tiktok'];
        $social = VisitorSession::where('created_at', '>=', $startDate)
            ->where(function ($q) use ($socialSites) {
                foreach ($socialSites as $site) {
                    $q->orWhere('referrer', 'like', "%{$site}%");
                }
            })->count();

        // Referral (everything else with a referrer)
        $referral = $total - $direct - $organic - $social;

        return [
            ['name' => 'Direct', 'value' => round(($direct / $total) * 100), 'color' => '#0d6efd'],
            ['name' => 'Organic', 'value' => round(($organic / $total) * 100), 'color' => '#198754'],
            ['name' => 'Social', 'value' => round(($social / $total) * 100), 'color' => '#ffc107'],
            ['name' => 'Referral', 'value' => round(($referral / $total) * 100), 'color' => '#dc3545'],
        ];
    }
}
