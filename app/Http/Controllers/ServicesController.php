<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $page_title = 'Our Services – Web, App, E-commerce, Digital Marketing & More | Fusioncentrix Solutions';

        $meta_description = 'Explore Fusioncentrix Solutions’ comprehensive digital and IT services, including custom web & mobile app development, e-commerce platforms, digital marketing, branding, and software solutions designed to grow your business globally.';
        $meta_keywords = 'web development, mobile apps, e-commerce platforms, Shopify, WooCommerce, SEO, social media marketing, branding, UI/UX design, software development, digital services India';

        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "ProfessionalService",
            "name" => "Fusioncentrix Solutions",
            "url" => url('/services'),
            "logo" => asset('assets/images/logo.png'), // Adjust path as needed
            "description" => $meta_description,
            "areaServed" => ["US", "Canada", "India", "Global"],
            "serviceType" => [
                "Web & Mobile App Development",
                "E-commerce Development",
                "Digital Marketing",
                "Custom Software Development",
                "UI/UX Design",
                "Branding & Identity"
            ],
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "telephone" => "+1-555-555-5555", // Replace with your contact
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ]
            ],
            "url" => url('/services')
        ];

        return view('services.index', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }


    public function web_and_app_development()
    {
        $page_title = 'Web & Mobile App Development Services - US, Canada & Global | Fusioncentrix Solutions';
        $meta_description = 'Build fast, scalable, and secure websites and mobile apps with responsive design, top SEO performance, and excellent user experience from Fusioncentrix Solutions.';
        $meta_keywords = 'web development, mobile app development, responsive websites, Android app development, iOS app development, cross-platform apps, progressive web apps, app maintenance, Fusion Centrix Solutions';
        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "Web & Mobile App Development",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('assets/images/logo.png'), // adjust path as needed
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ],
                "telephone" => "+1-555-555-5555" // replace with your contact number
            ],
            "description" => $meta_description,
            "areaServed" => ["US", "Canada", "India", "Global"],
            "url" => url('/services/web-app-development')
        ];

        return view('services.web_app_development', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }


    public function e_commerce()
    {
        $page_title = 'E-commerce Development – WooCommerce & Shopify | Fusioncentrix Solutions';
        $meta_description = 'Custom WooCommerce and Shopify development services by Fusioncentrix Solutions. Build scalable, secure, and SEO-friendly online stores tailored to your business needs.';
        $meta_keywords = 'e-commerce development, custom e-commerce platforms, WooCommerce development, Shopify development, inventory management system, multi-vendor marketplace, Fusion Centrix Solutions';
        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "E-commerce Development",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('assets/images/logo.png'), // adjust logo path as needed
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ],
                "telephone" => "+1-555-555-5555" // replace with your contact number
            ],
            "description" => $meta_description,
            "areaServed" => ["US", "Canada", "India", "Global"],
            "url" => url('/services/e-commerce-development')
        ];

        return view('services.ecommerce_development', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }


    public function marketing()
    {
        $page_title = 'Digital Marketing Services – SEO, PPC, Social Media | Fusioncentrix Solutions';
        $meta_description = 'Comprehensive digital marketing services including SEO, PPC advertising, social media marketing, and content strategy by Fusioncentrix Solutions. Drive growth and visibility.';
        $meta_keywords = 'digital marketing, SEO, social media marketing, PPC advertising, email marketing, content marketing, influencer marketing, conversion rate optimization, marketing funnels, Google Analytics, Fusion Centrix Solutions';
        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "Digital Marketing",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('assets/images/logo.png'), // adjust as needed
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ],
                "telephone" => "+1-555-555-5555" // replace with your contact
            ],
            "description" => $meta_description,
            "areaServed" => ["US", "Canada", "India", "Global"],
            "url" => url('/services/digital-marketing')
        ];

        return view('services.digital_marketing', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }


    public function custom_software()
    {
        $page_title = 'Custom Software Development Solutions | Fusioncentrix Solutions';
        $meta_description = 'Expert custom software development services by Fusioncentrix Solutions. Build scalable, secure, and tailored software solutions for your unique business needs.';
        $meta_keywords = 'custom software development, CRM system development, ERP solutions, SaaS application development, billing systems, LMS, booking systems, HR software, data analytics tools, API development, Fusion Centrix Solutions';
        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "Custom Software Development",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('assets/images/logo.png'), // adjust logo path as needed
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ],
                "telephone" => "+1-555-555-5555" // replace with your contact number
            ],
            "description" => $meta_description,
            "areaServed" => ["US", "Canada", "India", "Global"],
            "url" => url('/services/custom-software-development')
        ];

        return view('services.custom_software_development', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }


    public function graphics()
    {
        $page_title = 'UI/UX Design Services – Web & Mobile Interfaces | Fusioncentrix Solutions';
        $meta_description = 'Professional UI/UX design services for web and mobile interfaces by Fusioncentrix Solutions. Enhance user experience with modern, intuitive, and responsive designs.';
        $meta_keywords = 'UI design, UX design, web UI, mobile UI, wireframing, prototyping, Figma, Adobe XD, user journey mapping, design systems, Fusion Centrix Solutions';
        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "UI/UX Design",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('assets/images/logo.png'), // adjust the logo path as needed
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ],
                "telephone" => "+1-555-555-5555" // replace with your actual contact number
            ],
            "description" => $meta_description,
            "areaServed" => ["US", "Canada", "India", "Global"],
            "url" => url('/services/ui-ux-design')
        ];

        return view('services.ui_ux_design', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }


    public function branding()
    {
        $page_title = 'Comprehensive Branding & Identity Services | Logos, Merchandise, Collateral & More | Fusioncentrix Solutions';

        $meta_description = 'Fusioncentrix Solutions offers end-to-end branding and identity services including logo design, brand strategy, business cards, custom merchandise, festoon banners, packaging solutions, bags, and all marketing collateral tailored to elevate your brand’s presence.';
        $meta_keywords = 'branding, logo design, brand strategy, business stationery, social media branding, marketing collateral, brochures, banners, flyers, Fusion Centrix Solutions';
        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "Branding & Identity Services",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('assets/images/logo.png'), // Update path as needed
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ],
                "telephone" => "+1-555-555-5555" // Replace with your contact number
            ],
            "description" => $meta_description,
            "areaServed" => ["US", "Canada", "India", "Global"],
            "url" => url('/services/branding-identity')
        ];

        return view('services.branding_identity', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }
}
