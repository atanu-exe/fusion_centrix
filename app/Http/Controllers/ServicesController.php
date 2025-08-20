<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    function index()
    {
        return view('services.index');
    }

    function web_and_app_development()
    {
         $jsonLd = [
        "@context" => "https://schema.org",
        "@type" => "Service",
        "serviceType" => "Web & App Development",
        "provider" => [
            "@type" => "LocalBusiness",
            "name" => "Fusioncentrix Solutions",
            "url" => url('/')
        ],
        "description" => "Build fast, scalable, and secure websites and mobile apps with responsive design, top SEO performance, and excellent user experience.",
        "areaServed" => ["US", "Canada", "India", "Global"],
        "url" => url('/services/web-and-app-development')
    ];

        return view('services.web_app_development',compact('jsonLd'));
    }

    function e_commerce()
    {
        return view('services.ecommerce_development');
    }

    function marketing()
    {
        return view('services.digital_marketing');
    }

    function custom_software()
    {
        return view('services.custom_software_development');
    }

    function graphics()
    {
        return view('services.ui_ux_design');
    }

    function branding()
    {
        return view('services.branding_identity');
    }
}
