<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    function index()
    {
        $page_title = 'Our Portfolio – Web Design, Mobile Apps, Graphics & Branding';
        $meta_description = 'Discover Fusioncentrix portfolio showcasing modern websites, mobile applications, professional branding, logos, posters, brochures, and digital design work. See real client projects and results.';
        $meta_keywords = 'portfolio, web design, mobile app development, graphic design, logo design, branding, brochure design, poster design, UI/UX design, website portfolio, digital solutions, client work, design agency, web development services';

        // Get all active portfolio items with featured items first
        $portfolios = Portfolio::where('is_active', true)
            ->orderByRaw('featured DESC')
            ->orderByDesc('created_at')
            ->get();

        // Get featured items for homepage-style display
        $featuredPortfolios = Portfolio::where('is_active', true)
            ->where('featured', true)
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        // Build JSON-LD structured data for SEO
        $creativeWorks = $portfolios->map(function($portfolio) {
            return [
                "@type" => "CreativeWork",
                "name" => $portfolio->title,
                "description" => $portfolio->short_description,
                "url" => url('/portfolio/' . $portfolio->slug),
                "image" => $portfolio->image_url,
                "creator" => [
                    "@type" => "Organization",
                    "name" => "Fusioncentrix"
                ],
                "client" => $portfolio->client_name,
                "category" => $portfolio->category,
                "datePublished" => $portfolio->created_at->toIso8601String()
            ];
        })->toArray();

        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "CollectionPage",
            "name" => $page_title,
            "description" => $meta_description,
            "url" => url('/portfolio'),
            "dateModified" => now()->toIso8601String(),
            "hasPart" => $creativeWorks,
            "breadcrumb" => [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    [
                        "@type" => "ListItem",
                        "position" => 1,
                        "name" => "Home",
                        "item" => url('/')
                    ],
                    [
                        "@type" => "ListItem",
                        "position" => 2,
                        "name" => "Portfolio",
                        "item" => url('/portfolio')
                    ]
                ]
            ]
        ];

        return view('portfolio', compact(
            'page_title',
            'meta_description',
            'meta_keywords',
            'jsonLd',
            'portfolios',
            'featuredPortfolios'
        ));
    }

    function show($slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();

        $page_title = $portfolio->title . ' - Fusioncentrix Portfolio';
        $meta_description = $portfolio->short_description . ' | ' . $portfolio->client_name . ' - Fusioncentrix Project';
        $meta_keywords = implode(', ', array_merge($portfolio->technologies ?? [], [$portfolio->category, $portfolio->client_name]));

        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "CreativeWork",
            "name" => $portfolio->title,
            "description" => $portfolio->description,
            "image" => $portfolio->image_url,
            "url" => url('/portfolio/' . $portfolio->slug),
            "client" => [
                "@type" => "Organization",
                "name" => $portfolio->client_name
            ],
            "creator" => [
                "@type" => "Organization",
                "name" => "Fusioncentrix"
            ],
            "datePublished" => $portfolio->created_at->toIso8601String(),
            "keywords" => $meta_keywords
        ];

        // Get related portfolios (same category, max 3)
        $relatedPortfolios = Portfolio::where('category', $portfolio->category)
            ->where('id', '!=', $portfolio->id)
            ->where('is_active', true)
            ->limit(3)
            ->get();

        return view('portfolio-detail', compact(
            'portfolio',
            'page_title',
            'meta_description',
            'meta_keywords',
            'jsonLd',
            'relatedPortfolios'
        ));
    }

    // API endpoint to export portfolio data as JSON (for admin/reference)
    function exportJson()
    {
        $portfolios = Portfolio::where('is_active', true)
            ->orderByRaw('featured DESC')
            ->orderByDesc('created_at')
            ->get()
            ->map(function($portfolio) {
                return [
                    'id' => $portfolio->id,
                    'title' => $portfolio->title,
                    'slug' => $portfolio->slug,
                    'category' => $portfolio->category,
                    'description' => $portfolio->description,
                    'short_description' => $portfolio->short_description,
                    'image_url' => $portfolio->image_url,
                    'thumb_url' => $portfolio->thumb_url,
                    'client_name' => $portfolio->client_name,
                    'client_industry' => $portfolio->client_industry,
                    'technologies' => $portfolio->technologies,
                    'project_url' => $portfolio->project_url,
                    'live_demo_url' => $portfolio->live_demo_url,
                    'case_study_url' => $portfolio->case_study_url,
                    'results' => $portfolio->results,
                    'year_completed' => $portfolio->year_completed,
                    'featured' => $portfolio->featured,
                    'created_at' => $portfolio->created_at
                ];
            });

        return response()->json([
            'success' => true,
            'total_items' => $portfolios->count(),
            'exported_at' => now(),
            'portfolios' => $portfolios
        ], 200, [], JSON_PRETTY_PRINT);
    }
}
