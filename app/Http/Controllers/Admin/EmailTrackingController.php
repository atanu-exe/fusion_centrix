<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmailCampaign;
use App\Models\EmailLog;
use Illuminate\Http\Request;

class EmailTrackingController extends Controller
{
    /**
     * Track email opens via pixel
     */
    public function trackOpen($token)
    {
        $log = EmailLog::where('tracking_token', $token)->first();
        
        if ($log && !$log->opened_at) {
            $log->update([
                'opened_at' => now(),
                'status' => 'opened',
            ]);

            // Update campaign open count
            if ($log->campaign) {
                $log->campaign->increment('opened_count');
            }
        }

        // Return 1x1 transparent GIF
        return response(base64_decode('R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'), 200, [
            'Content-Type' => 'image/gif',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
        ]);
    }

    /**
     * Track email bounces
     */
    public function trackBounce(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'bounce_type' => 'required|in:permanent,temporary,undetermined',
            'campaign_id' => 'nullable|exists:email_campaigns,id',
        ]);

        $log = EmailLog::where('to_email', $request->email)
            ->when($request->campaign_id, fn($q) => $q->where('campaign_id', $request->campaign_id))
            ->latest()
            ->first();

        if ($log) {
            $log->update([
                'status' => 'bounced',
                'error_message' => $request->input('bounce_type'),
            ]);

            // Update campaign bounce count
            if ($log->campaign) {
                $log->campaign->increment('bounced_count');
            }
        }

        return response()->json(['success' => true]);
    }

    /**
     * Track email clicks via redirect link
     */
    public function trackClick($token)
    {
        $log = EmailLog::where('tracking_token', $token)->first();
        
        if ($log && !$log->clicked_at) {
            $log->update([
                'clicked_at' => now(),
            ]);

            // Update campaign click count
            if ($log->campaign) {
                $log->campaign->increment('clicked_count');
            }
        }

        // Retrieve the original URL from request
        $redirectUrl = request()->query('url');
        
        if ($redirectUrl) {
            // Try to decode if base64 encoded
            $decoded = base64_decode($redirectUrl, true);
            if ($decoded && (filter_var($decoded, FILTER_VALIDATE_URL) || strpos($decoded, '/') === 0)) {
                return redirect($decoded);
            } elseif (filter_var($redirectUrl, FILTER_VALIDATE_URL)) {
                return redirect($redirectUrl);
            }
        }

        return redirect('/');
    }

    /**
     * Get campaign tracking stats
     */
    public function campaignStats(EmailCampaign $campaign)
    {
        return response()->json([
            'campaign_id' => $campaign->id,
            'total_sent' => $campaign->total_recipients,
            'sent_count' => $campaign->sent_count,
            'delivered_count' => $campaign->delivered_count,
            'opened_count' => $campaign->opened_count,
            'opened_rate' => $campaign->sent_count > 0 
                ? round(($campaign->opened_count / $campaign->sent_count) * 100, 2) . '%'
                : '0%',
            'clicked_count' => $campaign->clicked_count,
            'click_rate' => $campaign->sent_count > 0 
                ? round(($campaign->clicked_count / $campaign->sent_count) * 100, 2) . '%'
                : '0%',
            'bounced_count' => $campaign->bounced_count,
            'bounce_rate' => $campaign->sent_count > 0 
                ? round(($campaign->bounced_count / $campaign->sent_count) * 100, 2) . '%'
                : '0%',
        ]);
    }
}
