<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class HomeController extends Controller
{
    public function index()
    {
        $page_title = 'Web, App, E-commerce & Digital Marketing Services';
        $meta_description = 'Fusioncentrix Solutions offers full-cycle web, app, e-commerce, and digital marketing services tailored to modern business needs.';
        $meta_keywords = 'Fusioncentrix Solutions, digital agency India, web development, mobile app development, e-commerce solutions, SEO services, digital marketing, branding, custom software, IT solutions';


        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "Organization",
            "name" => "Fusioncentrix Solutions",
            "url" => url('/'),
            "logo" => asset('logo.png'), // adjust path as needed
            "sameAs" => [
                "https://www.facebook.com/fusioncentrix",
                "https://www.linkedin.com/company/fusioncentrix",
                "https://www.instagram.com/fusioncentrix"
            ],
            "description" => $meta_description,
        ];

        return view('home', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }

    public function about()
    {
        $page_title = 'About Us – IT Solutions for Web, App & Digital Growth';
        $meta_description = 'Learn more about Fusioncentrix Solutions — your one-stop provider for digital and IT solutions focused on innovation, performance, and long-term success.';
        $meta_keywords = 'about Fusioncentrix, IT company profile, digital solutions provider, software agency India, web agency background, team of developers, company values';


        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "AboutPage",
            "name" => $page_title,
            "description" => $meta_description,
            "url" => url('/about'),
            "mainEntityOfPage" => url('/about'),
        ];

        return view('about', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }

    public function contact_us()
    {
        $page_title = 'Contact Fusioncentrix Solutions – Let’s Build Something Great Together';
        $meta_description = 'Get in touch with Fusioncentrix Solutions for white-label development, digital marketing, or custom IT solutions. We’re here to help your business grow.';
        $meta_keywords = 'contact Fusioncentrix, digital agency contact, IT services inquiry, request a quote, web development quote, get in touch, tech support, business consultation';


        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "ContactPage",
            "name" => $page_title,
            "description" => $meta_description,
            "url" => url('/contact-us'),
            "contactPoint" => [
                "@type" => "ContactPoint",
                "telephone" => "+9830107481",  // Replace with your phone number
                "contactType" => "Customer Service",
                "areaServed" => ["US", "CA", "IN"],
                "availableLanguage" => ["English"]
            ]
        ];

        return view('contact_us', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }

    function contact_us_submit(Request $request)
    {
        // ✅ 1. Validate input
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
        $filter_data = $request;
        // phpinfo();die;
        // ✅ 3. Send email (you can use your domain mail)
        try {
            Mail::to('info@fusioncentrix.com')->send(new ContactFormMail($filter_data));

            return back()->with('success', 'Thank you for contacting us! We’ll get back to you soon.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong while sending your message. Please try again later.');
        }
    }
}
