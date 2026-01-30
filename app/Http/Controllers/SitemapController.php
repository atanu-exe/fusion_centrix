<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate dynamic sitemap with only published blogs
     */
    public function index()
    {
        // Get all published blogs
        $blogs = Blog::published()
            ->select('slug', 'updated_at')
            ->orderBy('published_at', 'desc')
            ->get();

        $content = view('sitemap', compact('blogs'))->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
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
