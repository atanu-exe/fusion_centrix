<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Fonts: Example with font-display: swap -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Preconnect & Prefetch for external resources -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="//www.googletagmanager.com">
    @php
        $canonicalUrl = $canonical_url ?? url()->current();
        $defaultSeoTitle =
            'Fusioncentrix - Web Development, SEO, Branding & Software Company in Kolkata, West Bengal, India';
        $defaultSeoDescription =
            'Fusioncentrix is a web development, SEO, branding, ecommerce and software company in Kolkata, West Bengal, India serving clients across India and worldwide with conversion-focused digital solutions.';
        $defaultSeoKeywords =
            'web development company Kolkata, SEO company Kolkata, digital marketing company West Bengal, software company India, branding agency Kolkata, ecommerce development India, Fusioncentrix';
        $defaultSeoImage = asset('logo.png');
        $seoTitle = isset($page_title) && $page_title ? trim($page_title . ' | Fusioncentrix') : $defaultSeoTitle;
        $seoDescription = isset($meta_description) && $meta_description ? $meta_description : $defaultSeoDescription;
        $seoKeywords = isset($meta_keywords) && $meta_keywords ? $meta_keywords : $defaultSeoKeywords;
        $seoImage = $seo_image ?? $defaultSeoImage;
    @endphp
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
    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="keywords" content="{{ $seoKeywords }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="author" content="Fusioncentrix">
    <meta name="geo.region" content="IN-WB">
    <meta name="geo.placename" content="Kolkata">
    <meta name="geo.position" content="22.5810;88.4152">
    <meta name="ICBM" content="22.5810, 88.4152">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    @if (!request()->routeIs('blog.show'))
        {{-- Default OG tags for all non-blog pages --}}
        <meta property="og:site_name" content="Fusioncentrix">
        <meta property="og:locale" content="en_IN">
        <meta property="og:title" content="{{ $seoTitle }}">
        <meta property="og:description" content="{{ $seoDescription }}">
        <meta property="og:url" content="{{ $canonicalUrl }}">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ $seoImage }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">
    @yield('meta')
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    {{-- bootstrap  --}}
    <link rel="preload" as="style" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <!-- Swiper CSS -->
    <link rel="preload" as="style" href="{{ asset('assets/plugins/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/swiper/swiper-bundle.min.css') }}" media="print"
        onload="this.media='all'">
    <!-- Font Awesome CDN -->
    <link rel="preload" as="style" href="{{ asset('assets/plugins/fontawesome-7.0.0/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-7.0.0/css/all.min.css') }}" media="print"
        onload="this.media='all'">
    <!-- Bootstrap Icons CDN -->
    <link rel="preload" as="style"
        href="{{ asset('assets/plugins/bootstrap-icons/font/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-icons/font/bootstrap-icons.min.css') }}"
        media="print" onload="this.media='all'">
    {{-- custom css  --}}
    <link rel="preload" as="style" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/v2/fusioncentrix-v2-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/v2/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/v2/fusioncentrix-v2-hero.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/v2/style.css') }}">

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleBtn = document.getElementById("menuToggle");
            const menu = document.getElementById("mainMenu");
            const overlay = document.getElementById("menuOverlay");

            toggleBtn.addEventListener("click", function() {
                menu.classList.toggle("active");
                overlay.classList.toggle("active");
                toggleBtn.classList.toggle("active");
                document.body.style.overflow = menu.classList.contains("active") ? "hidden" : "auto";
            });

            // Close menu when clicking overlay
            overlay.addEventListener("click", function() {
                menu.classList.remove("active");
                overlay.classList.remove("active");
                toggleBtn.classList.remove("active");
                document.body.style.overflow = "auto";
            });

            // Close menu when clicking a link
            const menuLinks = menu.querySelectorAll("a");
            menuLinks.forEach(link => {
                link.addEventListener("click", function() {
                    menu.classList.remove("active");
                    overlay.classList.remove("active");
                    toggleBtn.classList.remove("active");
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
  "telephone": "+91-8282098384",
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
    "https://www.instagram.com/fusioncentrix_global"
  ]
}
</script>
        @endverbatim
    @endif
</head>

<body style="background-color: #f4f6f8;">
    <header>
        <nav class="fc-navbar" role="navigation" aria-label="Main Navigation">
            <!-- Mobile Menu Overlay -->
            <div id="menuOverlay" class="fc-menu-overlay"></div>
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
                    <li class="fc-nav-item"><a href="{{ url('contact-us') }}" class="fc-nav-link">Contact Us</a>
                    </li>
                </ul>
                <div>
                    <a href="{{ url('contact-us') }}" id="nav-free-consult-btn"
                        class="fc-btn fc-btn-primary fw-bold  rounded-pill"> <span>Get a Free</span>
                        Quote</a>

                </div>
                <!-- Hamburger Menu Button -->
                <button id="menuToggle" class="fc-menu-toggle" aria-label="Toggle navigation menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </nav>

    </header>
    <div>
