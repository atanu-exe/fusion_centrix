<?php

namespace App\Services;

use App\Models\EmailLog;
use Illuminate\Support\Str;

class EmailTrackingService
{
    /**
     * Generate tracking token for email log
     */
    public static function generateToken(): string
    {
        return Str::random(32);
    }

    /**
     * Get tracking pixel HTML
     */
    public static function getTrackingPixel(EmailLog $emailLog): string
    {
        if (!$emailLog->tracking_token) {
            return '';
        }

        $url = route('admin.email.track-open', ['token' => $emailLog->tracking_token]);
        return '<img src="' . htmlspecialchars($url) . '" width="1" height="1" alt="" style="display:none;" />';
    }

    /**
     * Get tracked click link
     */
    public static function getTrackedLink(EmailLog $emailLog, string $url): string
    {
        if (!$emailLog->tracking_token) {
            return $url;
        }

        return route('admin.email.track-click', [
            'token' => $emailLog->tracking_token,
            'url' => base64_encode($url),
        ]);
    }

    /**
     * Wrap links in email body with tracking URLs
     */
    public static function wrapLinksWithTracking(EmailLog $emailLog, string $html): string
    {
        if (!$emailLog->tracking_token) {
            return $html;
        }

        // Pattern to match href="/url" or href='url' or href=url
        $pattern = '/href=["\']?([^"\'>\s]+)["\']?/i';
        
        return preg_replace_callback($pattern, function ($matches) use ($emailLog) {
            $originalUrl = $matches[1];
            
            // Skip tracking for unsubscribe links and other special links
            if (strpos($originalUrl, '[unsubscribe') !== false || 
                strpos($originalUrl, 'mailto:') === 0 ||
                strpos($originalUrl, '#') === 0) {
                return $matches[0];
            }
            
            // Create tracked URL
            $trackedUrl = self::getTrackedLink($emailLog, $originalUrl);
            
            // Return with original quotes style
            if (strpos($matches[0], "'") !== false) {
                return "href='" . htmlspecialchars($trackedUrl) . "'";
            } else {
                return 'href="' . htmlspecialchars($trackedUrl) . '"';
            }
        }, $html);
    }

    /**
     * Get campaign open rate
     */
    public static function getOpenRate(\App\Models\EmailCampaign $campaign): string
    {
        if ($campaign->sent_count == 0) return '0%';
        return round(($campaign->opened_count / $campaign->sent_count) * 100, 2) . '%';
    }

    /**
     * Get campaign click rate
     */
    public static function getClickRate(\App\Models\EmailCampaign $campaign): string
    {
        if ($campaign->sent_count == 0) return '0%';
        return round(($campaign->clicked_count / $campaign->sent_count) * 100, 2) . '%';
    }

    /**
     * Get campaign bounce rate
     */
    public static function getBounceRate(\App\Models\EmailCampaign $campaign): string
    {
        if ($campaign->sent_count == 0) return '0%';
        return round(($campaign->bounced_count / $campaign->sent_count) * 100, 2) . '%';
    }
}
