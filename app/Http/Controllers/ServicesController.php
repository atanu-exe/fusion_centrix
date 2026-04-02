<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $page_title = 'Digital Services Company in Kolkata, West Bengal, India | Web, SEO, Branding & Software';

        $meta_description = 'Explore Fusioncentrix digital services from Kolkata, West Bengal, India including web development, ecommerce, SEO, digital marketing, branding, UI/UX and custom software for local and global growth.';
        $meta_keywords = 'digital services company Kolkata, web development Kolkata, SEO company West Bengal, branding agency Kolkata, ecommerce development India, software company Kolkata';

        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "ProfessionalService",
            "name" => "Fusioncentrix Solutions",
            "url" => url('/services'),
            "logo" => asset('logo.png'),
            "description" => $meta_description,
            "areaServed" => ["Kolkata", "West Bengal", "India", "Worldwide"],
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
                "telephone" => "+91-9830107481",
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
        $page_title = 'Web & App Development Company in Kolkata, West Bengal, India';
        $meta_description = 'Fusioncentrix is a web and mobile app development company in Kolkata, West Bengal, India building SEO-ready websites, responsive apps and scalable digital products for Indian and global businesses.';
        $meta_keywords = 'web development company Kolkata, app development company Kolkata, website design West Bengal, mobile app development India, SEO friendly website company Kolkata';
        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "Web & Mobile App Development",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('logo.png'),
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ],
                "telephone" => "+91-9830107481"
            ],
            "description" => $meta_description,
            "areaServed" => ["Kolkata", "West Bengal", "India", "Worldwide"],
            "url" => url('/services/web-app-development')
        ];

        return view('services.web_app_development', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }


    public function e_commerce()
    {
        $page_title = 'Ecommerce Development Company in Kolkata, West Bengal, India';
        $meta_description = 'Get custom ecommerce development in Kolkata, West Bengal, India with WooCommerce, Shopify and scalable online store solutions built for SEO, performance and higher conversions.';
        $meta_keywords = 'ecommerce development company Kolkata, Shopify development Kolkata, WooCommerce developer West Bengal, online store development India, ecommerce SEO company Kolkata';
        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "E-commerce Development",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('logo.png'),
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ],
                "telephone" => "+91-9830107481"
            ],
            "description" => $meta_description,
            "areaServed" => ["Kolkata", "West Bengal", "India", "Worldwide"],
            "url" => url('/services/e-commerce-development')
        ];

        return view('services.ecommerce_development', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }


    public function marketing()
    {
        $page_title = 'SEO & Digital Marketing Company in Kolkata, West Bengal, India';
        $meta_description = 'Fusioncentrix is an SEO and digital marketing company in Kolkata, West Bengal, India offering local SEO, technical SEO, PPC, content and social growth services for Indian and global brands.';
        $meta_keywords = 'SEO company Kolkata, digital marketing company Kolkata, local SEO West Bengal, PPC agency Kolkata, content marketing India, social media agency Kolkata';
        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "Digital Marketing",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('logo.png'),
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ],
                "telephone" => "+91-9830107481"
            ],
            "description" => $meta_description,
            "areaServed" => ["Kolkata", "West Bengal", "India", "Worldwide"],
            "url" => url('/services/digital-marketing')
        ];

        return view('services.digital_marketing', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }


    public function custom_software()
    {
        $page_title = 'Custom Software Development Company in Kolkata, West Bengal, India';
        $meta_description = 'Fusioncentrix provides custom software development in Kolkata, West Bengal, India for CRM, ERP, SaaS, automation and tailored business applications built for scale.';
        $meta_keywords = 'custom software development company Kolkata, CRM software company West Bengal, SaaS development India, ERP development Kolkata, business software company India';
        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "Custom Software Development",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('logo.png'),
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ],
                "telephone" => "+91-9830107481"
            ],
            "description" => $meta_description,
            "areaServed" => ["Kolkata", "West Bengal", "India", "Worldwide"],
            "url" => url('/services/custom-software-development')
        ];

        return view('services.custom_software_development', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }


    public function graphics()
    {
        $page_title = 'UI UX Design Company in Kolkata, West Bengal, India';
        $meta_description = 'Fusioncentrix offers UI UX design services in Kolkata, West Bengal, India for websites, apps and dashboards with modern interfaces, better user journeys and stronger conversions.';
        $meta_keywords = 'UI UX design company Kolkata, web UI design West Bengal, mobile app UX design India, product design company Kolkata, Figma design agency India';
        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "UI/UX Design",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('logo.png'),
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ],
                "telephone" => "+91-9830107481"
            ],
            "description" => $meta_description,
            "areaServed" => ["Kolkata", "West Bengal", "India", "Worldwide"],
            "url" => url('/services/ui-ux-design')
        ];

        return view('services.ui_ux_design', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }


    public function branding()
    {
        $page_title = 'Branding Agency in Kolkata, West Bengal, India';

        $meta_description = 'Fusioncentrix is a branding agency in Kolkata, West Bengal, India delivering logo design, brand identity, packaging, collateral and visual systems for businesses across India and worldwide.';
        $meta_keywords = 'branding agency Kolkata, logo design company Kolkata, brand identity design West Bengal, packaging design India, brochure design company Kolkata';
        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "serviceType" => "Branding & Identity Services",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Fusioncentrix Solutions",
                "url" => url('/'),
                "logo" => asset('logo.png'),
                "sameAs" => [
                    "https://www.facebook.com/fusioncentrix",
                    "https://www.linkedin.com/company/fusioncentrix",
                    "https://www.instagram.com/fusioncentrix"
                ],
                "telephone" => "+91-9830107481"
            ],
            "description" => $meta_description,
            "areaServed" => ["Kolkata", "West Bengal", "India", "Worldwide"],
            "url" => url('/services/branding-identity')
        ];

        return view('services.branding_identity', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }
}
