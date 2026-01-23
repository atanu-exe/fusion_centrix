<!DOCTYPE html>
<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V9ZFLYSZ8K"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-V9ZFLYSZ8K');
    </script>
    <meta charset="UTF-8">
    <title>
        {{ isset($page_title) && $page_title ? $page_title . ' | ' : '' }}
        Fusioncentrix
    </title>
    <meta name="description"
        content="{{ isset($meta_description) && $meta_description ? $meta_description : 'Fusion Centrix Solutions provides professional IT services including web and app development, e-commerce solutions, digital marketing, UI/UX design, branding, and custom software for businesses in the US, Canada, India, and worldwide. Delivering scalable, SEO-friendly, and high-performance solutions to drive growth and engagement.' }}">
    <meta name="keywords"
        content="{{ $meta_keywords ?? 'Fusioncentrix, digital marketing India, SEO, branding, app development, social media marketing, logo design, advertising agency' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    {{-- bootstrap  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/swiper/swiper-bundle.min.css') }}">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-7.0.0/css/all.min.css') }}">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-icons/font/bootstrap-icons.min.css') }}">
    {{-- custom css  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleBtn = document.getElementById("menuToggle");
            const menu = document.getElementById("mainMenu");
            const overlay = document.getElementById("menuOverlay");
            
            toggleBtn.addEventListener("click", function() {
                menu.classList.toggle("active");
                overlay.classList.toggle("active");
                document.body.style.overflow = menu.classList.contains("active") ? "hidden" : "auto";
            });

            // Close menu when clicking overlay
            overlay.addEventListener("click", function() {
                menu.classList.remove("active");
                overlay.classList.remove("active");
                document.body.style.overflow = "auto";
            });

            // Close menu when clicking a link
            const menuLinks = menu.querySelectorAll("a");
            menuLinks.forEach(link => {
                link.addEventListener("click", function() {
                    menu.classList.remove("active");
                    overlay.classList.remove("active");
                    document.body.style.overflow = "auto";
                });
            });
        });
    </script>
    <script src="{{ asset('assets/plugins/swiper/swiper-bundle.min.js') }}" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Structured Data for Google -->
    @if (!empty($jsonLd))
        <script type="application/ld+json">
{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
    @else
        @verbatim
            <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Fusioncentrix Solutions",
  "image": "https://www.fusioncentrix.com/logo.png",
  "url": "https://www.fusioncentrix.com",
  "telephone": "+91-9477614409",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Sector V, Salt Lake",
    "addressLocality": "Kolkata",
    "addressRegion": "West Bengal",
    "postalCode": "700091",
    "addressCountry": "IN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "22.5810",
    "longitude": "88.4152"
  },
  "openingHours": "Mo-Sa 10:00-19:00",
  "priceRange": "$$",
  "sameAs": [
    "https://www.linkedin.com/company/fusioncentrix",
    "https://www.facebook.com/fusioncentrix",
    "https://www.instagram.com/fusioncentrix"
  ]
}
</script>
        @endverbatim
    @endif
</head>

<body style="background-color: #f4f6f8;">
    <header>
        <nav class="fc-navbar" role="navigation" aria-label="Main Navigation">
            <div class="fc-navbar-container">
                <!-- Logo -->
                <div class="fc-navbar-brand">
                    <a href="{{ url('/') }}" class="fc-brand-link">
                        <img src="{{ asset('logo.png') }}" alt="fusion centrix logo" class="fc-brand-logo">
                    </a>
                </div>

                <!-- Desktop Menu -->
                <ul class="fc-navbar-menu" id="mainMenu">
                    <li class="fc-nav-item"><a href="{{ url('') }}" class="fc-nav-link">Home</a></li>
                    <li class="fc-nav-item"><a href="{{ url('about') }}" class="fc-nav-link">About Us</a></li>
                    <li class="fc-nav-item"><a href="{{ url('services') }}" class="fc-nav-link">Services</a></li>
                    <li class="fc-nav-item"><a href="{{ url('portfolio') }}" class="fc-nav-link">Portfolio</a></li>
                    <li class="fc-nav-item"><a href="{{ url('blog') }}" class="fc-nav-link">Blog</a></li>
                    <li class="fc-nav-item"><a href="{{ url('contact-us') }}" class="fc-nav-link">Contact Us</a></li>
                </ul>

                <!-- Hamburger Menu Button -->
                <button id="menuToggle" class="fc-menu-toggle" aria-label="Toggle navigation menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </nav>
        <!-- Mobile Menu Overlay -->
        <div id="menuOverlay" class="fc-menu-overlay"></div>
    </header>
    <div>
