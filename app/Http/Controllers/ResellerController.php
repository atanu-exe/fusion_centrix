<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResellerController extends Controller
{
    function index()
    {
        $page_title = 'White-Label Digital Services for Agencies & Resellers';
        $meta_description = 'Partner with Fusioncentrix Solutions to scale your agency. We offer white-label web development, app design, SEO, and IT services under your brand – reliable, confidential, and on time.';
        $meta_keywords = 'white-label web development, reseller digital services, agency partnership, outsource web development, SEO reselling, branding reseller program, Fusioncentrix for agencies, IT outsourcing India';

        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "White-label Digital Services",
            "provider" => [
                "@type" => "Organization",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('assets/images/logo.png'),
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ]
            ],
            "description" => $meta_description,
            "areaServed" => ["US", "Canada", "India", "Global"],
            "audience" => [
                "@type" => "Audience",
                "audienceType" => "Agencies, Resellers, Consultants"
            ]
        ];
        return view('resellers', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }
}
