<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    function index()
    {
        $page_title = 'Our Work – Web, App & Marketing Projects';
        $meta_description = 'Explore our portfolio of successful web development, mobile apps, branding, and digital marketing projects. See how Fusioncentrix delivers real results.';
        $meta_keywords = 'Fusioncentrix portfolio, digital agency projects, web development showcase, app development examples, SEO results, branding case studies, e-commerce work, UI/UX designs, client work samples';

        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "CollectionPage",
            "name" => $page_title,
            "description" => $meta_description,
            "url" => url('/portfolio'),
            // "hasPart" => [
            //     [
            //         "@type" => "CreativeWork",
            //         "name" => "E-commerce Website for ABC Corp",
            //         "url" => url('/portfolio/abc-ecommerce'),
            //         "description" => "Custom WooCommerce e-commerce website development for ABC Corp."
            //     ],
            //     [
            //         "@type" => "CreativeWork",
            //         "name" => "Mobile App for XYZ Ltd.",
            //         "url" => url('/portfolio/xyz-mobile-app'),
            //         "description" => "Cross-platform mobile app development for XYZ Ltd."
            //     ],
            //     // Add more portfolio items here as needed
            // ],
        ];
        return view('portfolio', compact('page_title', 'meta_description', 'jsonLd','meta_keywords'));
    }
}
