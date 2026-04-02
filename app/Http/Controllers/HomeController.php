<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class HomeController extends Controller
{
    public function index()
    {
        $page_title = 'Web Development, SEO, Branding & Software Company in Kolkata, West Bengal, India';
        $meta_description = 'Fusioncentrix delivers web development, ecommerce, SEO, branding, app development and custom software services from Kolkata, West Bengal, India for businesses across India and worldwide.';
        $meta_keywords = 'web development company Kolkata, SEO company Kolkata, software company West Bengal, ecommerce development India, digital marketing Kolkata, branding agency Kolkata, app development company India';


        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "LocalBusiness",
            "name" => "Fusioncentrix Solutions",
            "url" => url('/'),
            "logo" => asset('logo.png'),
            "sameAs" => [
                "https://www.facebook.com/fusioncentrix",
                "https://www.linkedin.com/company/fusioncentrix",
                "https://www.instagram.com/fusioncentrix"
            ],
            "description" => $meta_description,
            "address" => [
                "@type" => "PostalAddress",
                "addressLocality" => "Kolkata",
                "addressRegion" => "West Bengal",
                "addressCountry" => "IN"
            ],
            "areaServed" => ["Kolkata", "West Bengal", "India", "Worldwide"],
        ];

        return view('home', compact('page_title', 'meta_description', 'jsonLd', 'meta_keywords'));
    }

    public function about()
    {
        $page_title = 'About Fusioncentrix - Digital Company in Kolkata, West Bengal, India';
        $meta_description = 'Learn about Fusioncentrix, a Kolkata, West Bengal digital company helping businesses in India and worldwide with web development, SEO, branding, ecommerce and software solutions.';
        $meta_keywords = 'about Fusioncentrix Kolkata, software company West Bengal, digital agency India, SEO company Kolkata, web development team India, branding company Kolkata';


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
        $page_title = 'Contact Fusioncentrix - Kolkata, West Bengal, India Digital Services Company';
        $meta_description = 'Contact Fusioncentrix in Kolkata, West Bengal, India for web development, SEO, branding, ecommerce, mobile apps and custom software projects for India and international markets.';
        $meta_keywords = 'contact SEO company Kolkata, contact web development company Kolkata, West Bengal software company contact, India digital agency quote, request website quote Kolkata';


        $jsonLd = [
            "@context" => "https://schema.org",
            "@type" => "ContactPage",
            "name" => $page_title,
            "description" => $meta_description,
            "url" => url('/contact-us'),
            "contactPoint" => [
                "@type" => "ContactPoint",
                "telephone" => "+91-9830107481",
                "contactType" => "Customer Service",
                "areaServed" => ["Kolkata", "West Bengal", "India", "Worldwide"],
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
