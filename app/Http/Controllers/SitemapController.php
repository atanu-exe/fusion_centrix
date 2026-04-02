<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portfolio;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate dynamic sitemap with published blogs + live portfolios
     */
    public function index()
    {
        // Get all published blogs
        $blogs = Blog::published()
            ->select('slug', 'updated_at')
            ->orderBy('published_at', 'desc')
            ->get();

        // Get all active portfolio projects for SEO indexing
        $portfolios = Portfolio::where('is_active', true)
            ->select('slug', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->get();

        $urls = [
            ['loc' => url('/'), 'changefreq' => 'weekly', 'priority' => '1.0'],
            ['loc' => url('/about'), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => url('/services'), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => url('/portfolio'), 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => url('/contact-us'), 'changefreq' => 'monthly', 'priority' => '0.6'],
            ['loc' => url('/blog'), 'changefreq' => 'daily', 'priority' => '0.8'],
            ['loc' => url('/services/web-app-development'), 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => url('/services/e-commerce-development'), 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => url('/services/mobile-app-development'), 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => url('/services/digital-marketing'), 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => url('/services/graphics-design'), 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => url('/services/seo'), 'changefreq' => 'monthly', 'priority' => '0.7'],
        ];

        foreach ($blogs as $blog) {
            $urls[] = ['loc' => url('/blog/' . $blog->slug), 'lastmod' => $blog->updated_at->toIso8601String(), 'changefreq' => 'weekly', 'priority' => '0.6'];
        }

        foreach ($portfolios as $portfolio) {
            $urls[] = ['loc' => url('/portfolio/' . $portfolio->slug), 'lastmod' => $portfolio->updated_at->toIso8601String(), 'changefreq' => 'monthly', 'priority' => '0.6'];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $u) {
            $xml .= '<url>';
            $xml .= '<loc>' . e($u['loc']) . '</loc>';
            if (isset($u['lastmod'])) {
                $xml .= '<lastmod>' . e($u['lastmod']) . '</lastmod>';
            } else {
                $xml .= '<lastmod>' . now()->toIso8601String() . '</lastmod>';
            }
            $xml .= '<changefreq>' . e($u['changefreq']) . '</changefreq>';
            $xml .= '<priority>' . e($u['priority']) . '</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml')
            ->header('X-Content-Type-Options', 'nosniff');
    }

    /**
     * Generate robots.txt
     */
    public function robots()
    {
        $sitemapUrl = url('/sitemap.xml');
        
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /admin/*\n";
        $content .= "\n";
        $content .= "Sitemap: {$sitemapUrl}\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }
}
