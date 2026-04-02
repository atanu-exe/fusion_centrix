<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    function index()
    {
        $page_title = 'Portfolio - Web Development, SEO, Branding & App Projects for US, UK, India and Worldwide';
        $meta_description = 'Explore Fusioncentrix portfolio of web development, ecommerce, mobile app, branding and SEO-focused digital projects delivered for businesses in the US, UK, India and worldwide. Review real project outcomes and request a similar solution.';
        $meta_keywords = 'portfolio, web development company portfolio, mobile app portfolio, branding portfolio, ecommerce development portfolio, SEO agency portfolio, US web development company, UK digital agency, India software company, worldwide development agency';

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
            "@graph" => [
                [
                    "@type" => "CollectionPage",
                    "name" => $page_title,
                    "description" => $meta_description,
                    "url" => url('/portfolio'),
                    "dateModified" => now()->toIso8601String(),
                    "hasPart" => $creativeWorks,
                    "about" => [
                        ["@type" => "Thing", "name" => "Web Development"],
                        ["@type" => "Thing", "name" => "SEO"],
                        ["@type" => "Thing", "name" => "Mobile App Development"],
                        ["@type" => "Thing", "name" => "Branding"],
                    ]
                ],
                [
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

        $page_title = $portfolio->title . ' - Case Study for US, UK, India & Global Businesses | Fusioncentrix';
        $meta_description = $portfolio->short_description . ' Delivered by Fusioncentrix for growth-focused businesses in the US, UK, India and worldwide. Review the case study, technologies, outcomes and request a similar solution.';
        $meta_keywords = implode(', ', array_filter(array_merge(
            $portfolio->technologies ?? [],
            [$portfolio->category, $portfolio->client_name, 'US digital agency', 'UK software company', 'India web development company', 'global technology partner']
        )));

        $faqSchema = [
            "@type" => "FAQPage",
            "mainEntity" => [
                [
                    "@type" => "Question",
                    "name" => 'Can Fusioncentrix build similar projects for businesses in the US, UK, India and worldwide?',
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => 'Yes. Fusioncentrix works with companies across the US, UK, India and global markets on web, mobile, branding and growth-focused digital projects.'
                    ]
                ],
                [
                    "@type" => "Question",
                    "name" => 'How do we start a similar project?',
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => 'Share your goals, timeline and scope through the contact page. The team will review requirements and propose the right delivery plan, budget range and next steps.'
                    ]
                ]
            ]
        ];

        $jsonLd = [
            "@context" => "https://schema.org",
            "@graph" => [
                [
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
                ],
                [
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
                        ],
                        [
                            "@type" => "ListItem",
                            "position" => 3,
                            "name" => $portfolio->title,
                            "item" => url('/portfolio/' . $portfolio->slug)
                        ]
                    ]
                ],
                $faqSchema
            ]
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
