<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResellerController extends Controller
{
    function index()
    {
        $page_title = 'White Label Digital Services from Kolkata, West Bengal, India';
        $meta_description = 'Partner with Fusioncentrix in Kolkata, West Bengal, India for white-label web development, SEO, design and software delivery for agencies serving India and international markets.';
        $meta_keywords = 'white label web development India, SEO reseller Kolkata, outsourcing company West Bengal, agency partner India, white label software company Kolkata';

        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "White-label Digital Services",
            "provider" => [
                "@type" => "Organization",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('logo.png'),
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ]
            ],
            "description" => $meta_description,
            "areaServed" => ["Kolkata", "West Bengal", "India", "Worldwide"],
            "audience" => [
                "@type" => "Audience",
                "audienceType" => "Agencies, Resellers, Consultants"
            ]
        ];
        return view('resellers', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }
}
