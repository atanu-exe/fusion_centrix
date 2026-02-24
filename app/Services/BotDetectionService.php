<?php

namespace App\Services;

class BotDetectionService
{
    /**
     * List of common bot user agent patterns
     */
    private static $botPatterns = [
        'googlebot',
        'bingbot',
        'slurp',
        'duckduckbot',
        'baiduspider',
        'yandexbot',
        'facebookexternalhit',
        'twitterbot',
        'linkedinbot',
        'whatsapp',
        'telegram',
        'curl',
        'wget',
        'python',
        'java',
        'perl',
        'php',
        'ruby',
        'node',
        'scrapy',
        'selenium',
        'phantom',
        'headless',
        'crawl',
        'spider',
        'robot',
        'checker',
        'monitor',
        'scanner',
        'httpclient',
        'urllib',
        'requests',
        'axios',
        'fetch',
        'meteor',
        'netcraft',
        'nikto',
        'masscan',
        'nmap',
        'shodan',
        'ahrefs',
        'semrush',
        'majestic',
        'mj12bot',
        'seznambot',
        'googleadsbot',
        'googlebot-mobile',
        'mediapartners',
        'adsbot',
        'feedfetcher',
        'archive.org_bot',
        'wget',
        'curl',
        'php_curl',
        'java',
        'libwww',
        'lwp-trivial',
        'python',
        'requests',
        'mechanize',
        'urllib',
        'perl',
        'lwp',
        'ruby',
        'net::http',
        'go-http-client',
        'node',
        'axios',
        'fetch',
        'undici',
        '.net',
        'winhttp',
        'powershell',
        'edge',
        'chrome-lighthouse',
        'pagespeed',
        'gtmetrix',
        'pingdom',
        'uptime',
        'blackstratus',
        'cabot',
        'cloudscan',
        'consul',
        'datadog',
        'dns',
        'dotbot',
        'googlebot-image',
        'http-client',
        'hubpages',
        'htmlparser',
        'javak',
        'libcurl',
        'libwww-perl',
        'lwp',
        'makewebrequest',
        'msiecrawler',
        'netaddr',
        'netrescanbot',
        'scrapy',
        'wget',
        'whcc',
        'wordpress',
        'xmlrpc',
        'yisou',
    ];

    /**
     * Check if a user agent belongs to a bot
     */
    public static function isBot(?string $userAgent): bool
    {
        if (empty($userAgent)) {
            return true; // No user agent = likely a bot
        }

        $userAgentLower = strtolower($userAgent);

        // Check against known bot patterns
        foreach (self::$botPatterns as $pattern) {
            if (strpos($userAgentLower, $pattern) !== false) {
                return true;
            }
        }

        // Check for suspicious patterns
        if (self::hasSuspiciousPatterns($userAgentLower)) {
            return true;
        }

        return false;
    }

    /**
     * Check for suspicious user agent patterns
     */
    private static function hasSuspiciousPatterns(string $userAgent): bool
    {
        $suspicious = [
            '/^[a-z0-9\-_.]+$/i', // Only simple identifiers, no real browser info
            '/^\d+\.\d+$/', // Only version numbers
        ];

        foreach ($suspicious as $pattern) {
            if (preg_match($pattern, $userAgent) && strlen($userAgent) < 10) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check for bot-like IP behavior patterns
     */
    public static function hasBotsuspiciousIPBehavior(?string $ipAddress): bool
    {
        // Reserved/Private IP ranges (usually VPNs or private networks)
        $privateRanges = [
            '10.0.0.0/8',
            '172.16.0.0/12',
            '192.168.0.0/16',
            '127.0.0.0/8',
        ];

        if (empty($ipAddress)) {
            return true;
        }

        // Check if IP is private/reserved
        if (filter_var($ipAddress, FILTER_VALIDATE_IP, 
            FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            return true;
        }

        return false;
    }

    /**
     * Comprehensive bot check
     */
    public static function detectBot(?string $userAgent, ?string $ipAddress = null, array $headers = []): bool
    {
        // Check user agent
        if (self::isBot($userAgent)) {
            return true;
        }

        // Check IP address
        if ($ipAddress && self::hasBotsuspiciousIPBehavior($ipAddress)) {
            return true;
        }

        // Check for missing headers that legitimate browsers send
        if (!empty($headers)) {
            if (empty($headers['accept'] ?? null) || empty($headers['accept-language'] ?? null)) {
                // Missing common browser headers
                if (empty($headers['user-agent'] ?? null)) {
                    return true;
                }
            }
        }

        return false;
    }
}
