<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fusioncentrix Solutions - One-Stop Digital & IT Solutions Provider</title>
    <meta name="description"
        content="Fusioncentrix Solutions is a leading India-based digital agency delivering web development, SEO, advertising, branding, and marketing services for US businesses.">
    <meta name="keywords"
        content="Fusioncentrix, digital marketing India, SEO, branding, app development, social media marketing, logo design, advertising agency">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    {{-- bootstrap  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/swiper/swiper-bundle.min.css') }}">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


    {{-- custom css  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">




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
  "image": "https://www.fusioncentrix.com/assets/images/logo.png",
  "url": "https://www.fusioncentrix.com",
  "telephone": "+91-9876543210",
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
    <nav class="d-flex justify-content-between px-5 bg-gradient-dark" role="navigation" aria-label="Main Navigation">
        <div class="brand d-flex"><a href="{{url('/')}}"><img src="{{ asset('assets/images/logo.png') }}" alt="fusion centrix logo"></a></div>
        <ul class="d-flex list-unstyled align-items-center">
            <li><a href="{{ url('') }}" class="text-decoration-none">Home</a></li>
            <li><a href="{{ url('about') }}" class="text-decoration-none">About Us</a></li>
            <li><a href="{{ url('services') }}" class="text-decoration-none">Services</a></li>
            <li><a href="{{ url('portfolio') }}" class="text-decoration-none">Portfolio</a></li>
            <li><a href="{{ url('blog') }}" class="text-decoration-none">Blog</a></li>
            <li><a href="{{ url('contact-us') }}" class="text-decoration-none">Contact</a></li>
        </ul>
    </nav>
    </header>
    <div>
