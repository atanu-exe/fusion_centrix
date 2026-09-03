@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/v2/services.css') }}">

    <main id="main-content">

        {{-- ========================================================
         01 — WEB & APP DEVELOPMENT HERO
         Same structure as Services page
         ======================================================== --}}

        <section class="fc-services-hero">

            <div class="fc-hero-grid"></div>

            <div class="container">

                <div class="row align-items-center g-5">

                    {{-- Hero Content --}}
                    <div class="col-lg-6">

                        <div class="fc-services-eyebrow">

                            <span></span>

                            Web & App Development

                        </div>


                        <h1 class="fc-services-title">

                            Web & app solutions
                            <span>built for</span>

                            real
                            <strong>growth.</strong>

                        </h1>


                        <p class="fc-services-description">

                            We build high-performance websites, web applications,
                            mobile apps, and custom digital platforms designed
                            around your business goals. From strategy and UX to
                            development, SEO, integrations, and ongoing support,
                            we create digital products that are built to perform
                            and evolve.

                        </p>


                        <div class="fc-services-actions">

                            <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary">

                                Start a Conversation

                            </a>


                            <a href="#webapp-solutions" class="fc-btn fc-btn-dark-outline">

                                Explore Development

                            </a>

                        </div>

                    </div>


                    {{-- Hero Visual --}}
                    <div class="col-lg-6">

                        <div class="fc-services-orbit" aria-hidden="true">

                            <div class="fc-orbit orbit-one"></div>

                            <div class="fc-orbit orbit-two"></div>

                            <div class="fc-orbit-line line-one"></div>

                            <div class="fc-orbit-line line-two"></div>

                            <div class="fc-orbit-line line-three"></div>

                            <span class="fc-orbit-dot dot-one"></span>

                            <span class="fc-orbit-dot dot-two"></span>

                            <span class="fc-orbit-dot dot-three"></span>

                            <span class="fc-orbit-dot dot-four"></span>


                            <div class="fc-orbit-center">

                                <strong>FC</strong>

                                <span>TECH</span>

                            </div>


                            <div class="fc-orbit-card orbit-design">

                                <i class="fas fa-code"></i>

                                <span>Web</span>

                            </div>


                            <div class="fc-orbit-card orbit-development">

                                <i class="fas fa-mobile-alt"></i>

                                <span>Mobile</span>

                            </div>


                            <div class="fc-orbit-card orbit-growth">

                                <i class="fas fa-layer-group"></i>

                                <span>Apps</span>

                            </div>


                            <div class="fc-orbit-card orbit-intelligence">

                                <i class="fas fa-plug"></i>

                                <span>API</span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================
         02 — ENGINEERED FOR THE FUTURE
         Same capability structure as Services page
         ======================================================== --}}

        <section id="webapp-overview" class="fc-services-intro">

            <div class="container">

                <div class="text-center">

                    <div class="fc-section-eyebrow">

                        <span></span>

                        Engineered for the Future

                        <span></span>

                    </div>


                    <h2 class="fc-services-intro-title">

                        Technology that works
                        <span>for your business.</span>

                    </h2>


                    <p class="fc-services-intro-text">

                        We use modern frameworks, proven development practices,
                        and thoughtful architecture to create digital products
                        that are fast, secure, scalable, search-friendly,
                        and ready for future growth.

                    </p>

                </div>


                <div class="row g-4 fc-capability-row">


                    {{-- 01 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-bolt"></i>

                            </div>

                            <span>01</span>

                            <h3>
                                Performance
                            </h3>

                            <p>
                                Fast-loading experiences with performance
                                and Core Web Vitals in mind.
                            </p>

                        </div>

                    </div>


                    {{-- 02 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-shield-alt"></i>

                            </div>

                            <span>02</span>

                            <h3>
                                Security
                            </h3>

                            <p>
                                Secure architecture and development practices
                                from the beginning.
                            </p>

                        </div>

                    </div>


                    {{-- 03 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-expand-arrows-alt"></i>

                            </div>

                            <span>03</span>

                            <h3>
                                Scalability
                            </h3>

                            <p>
                                Modular solutions designed to grow with
                                your users and business.
                            </p>

                        </div>

                    </div>


                    {{-- 04 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-mobile-alt"></i>

                            </div>

                            <span>04</span>

                            <h3>
                                Mobile-First
                            </h3>

                            <p>
                                Responsive experiences built for phones,
                                tablets, and desktops.
                            </p>

                        </div>

                    </div>


                    {{-- 05 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-search"></i>

                            </div>

                            <span>05</span>

                            <h3>
                                SEO Ready
                            </h3>

                            <p>
                                Semantic markup and technical foundations
                                that support search visibility.
                            </p>

                        </div>

                    </div>


                    {{-- 06 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-cogs"></i>

                            </div>

                            <span>06</span>

                            <h3>
                                API-First
                            </h3>

                            <p>
                                Flexible architecture for integrations,
                                mobile apps, and connected systems.
                            </p>

                        </div>

                    </div>


                    {{-- 07 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-universal-access"></i>

                            </div>

                            <span>07</span>

                            <h3>
                                Accessible
                            </h3>

                            <p>
                                Interfaces designed with usability and
                                accessibility in mind.
                            </p>

                        </div>

                    </div>


                    {{-- 08 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-code"></i>

                            </div>

                            <span>08</span>

                            <h3>
                                Maintainable
                            </h3>

                            <p>
                                Clean, organized solutions that are easier
                                to manage and evolve.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================
         03 — WHAT WE BUILD
         Exact service-card structure
         ======================================================== --}}

        <section id="webapp-solutions" class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">

                            <span></span>

                            What We Build

                        </div>


                        <h2 class="fc-services-list-title">

                            Digital solutions designed around
                            <span>your business.</span>

                        </h2>

                    </div>


                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">

                            From websites and web applications to mobile
                            experiences, e-commerce, and custom software,
                            we build the technology your business actually needs.

                        </p>

                    </div>

                </div>


                <div class="row g-4">


                    {{-- 01 --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    01
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-globe"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Website Development
                                </span>


                                <h3>
                                    Business Websites
                                </h3>


                                <p>
                                    Professional, responsive, and conversion-focused
                                    websites that communicate your brand clearly,
                                    support your goals, and provide a strong
                                    foundation for SEO and growth.
                                </p>


                                <div class="fc-service-tags">

                                    <span>Corporate</span>

                                    <span>Landing Pages</span>

                                    <span>SEO</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Start a Website Project

                            </a>

                        </article>

                    </div>



                    {{-- 02 --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    02
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-laptop-code"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Web Applications
                                </span>


                                <h3>
                                    Custom Web Applications
                                </h3>


                                <p>
                                    Purpose-built applications for dashboards,
                                    portals, management systems, customer
                                    platforms, workflows, and internal operations.
                                </p>


                                <div class="fc-service-tags">

                                    <span>Laravel</span>

                                    <span>PHP</span>

                                    <span>MySQL</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Discuss Your Application

                            </a>

                        </article>

                    </div>



                    {{-- 03 --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    03
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-mobile-alt"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Mobile Development
                                </span>


                                <h3>
                                    Mobile Applications
                                </h3>


                                <p>
                                    Mobile experiences designed around usability,
                                    performance, and seamless communication with
                                    your web application or backend systems.
                                </p>


                                <div class="fc-service-tags">

                                    <span>Mobile</span>

                                    <span>API</span>

                                    <span>UX</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Discuss Mobile Development

                            </a>

                        </article>

                    </div>



                    {{-- 04 --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    04
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-shopping-cart"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    E-Commerce
                                </span>


                                <h3>
                                    E-Commerce Development
                                </h3>


                                <p>
                                    Online stores designed around product discovery,
                                    secure payments, smoother checkout experiences,
                                    and easier day-to-day management.
                                </p>


                                <div class="fc-service-tags">

                                    <span>Stores</span>

                                    <span>Payments</span>

                                    <span>Checkout</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Build Your Store

                            </a>

                        </article>

                    </div>



                    {{-- 05 --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    05
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-plug"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Integration
                                </span>


                                <h3>
                                    API & System Integration
                                </h3>


                                <p>
                                    Connect your digital products with payment
                                    gateways, CRMs, third-party APIs, business
                                    tools, and internal systems.
                                </p>


                                <div class="fc-service-tags">

                                    <span>REST API</span>

                                    <span>CRM</span>

                                    <span>Automation</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Discuss Integration

                            </a>

                        </article>

                    </div>



                    {{-- 06 --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    06
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-layer-group"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Custom Software
                                </span>


                                <h3>
                                    Business Platforms
                                </h3>


                                <p>
                                    Purpose-built software designed around your
                                    workflows, teams, data, permissions, reporting,
                                    and operational requirements.
                                </p>


                                <div class="fc-service-tags">

                                    <span>Platforms</span>

                                    <span>Systems</span>

                                    <span>Workflows</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Build Your Platform

                            </a>

                        </article>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================
         04 — CMS & DYNAMIC CONTENT
         Uses existing Services visual language
         ======================================================== --}}

        <section id="cms-services" class="fc-services-intro">

            <div class="container">

                <div class="text-center">

                    <div class="fc-section-eyebrow">

                        <span></span>

                        CMS & Dynamic Content

                        <span></span>

                    </div>


                    <h2 class="fc-services-intro-title">

                        Give your team
                        <span>control.</span>

                    </h2>


                    <p class="fc-services-intro-text">

                        Whether you need WordPress, a headless CMS, or
                        custom content management, we create flexible
                        systems that make it easier for your team to
                        manage content and digital experiences.

                    </p>

                </div>


                <div class="row g-4 fc-capability-row">


                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fab fa-wordpress"></i>

                            </div>

                            <span>01</span>

                            <h3>
                                WordPress CMS
                            </h3>

                            <p>
                                Custom themes, plugins, and content
                                management experiences.
                            </p>

                        </div>

                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-layer-group"></i>

                            </div>

                            <span>02</span>

                            <h3>
                                Headless CMS
                            </h3>

                            <p>
                                API-first content architecture for
                                modern digital experiences.
                            </p>

                        </div>

                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-lock"></i>

                            </div>

                            <span>03</span>

                            <h3>
                                Access Control
                            </h3>

                            <p>
                                Role-based permissions for secure
                                publishing workflows.
                            </p>

                        </div>

                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-search"></i>

                            </div>

                            <span>04</span>

                            <h3>
                                SEO Tools
                            </h3>

                            <p>
                                Structured content, metadata, schema,
                                and sitemap-ready foundations.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================
         05 — RESPONSIVE & ACCESSIBLE
         Old page image retained
         ======================================================== --}}

        <section id="responsive-design" class="fc-section fc-section-dark">

            <div class="container">

                <div class="row align-items-center g-5">


                    <div class="col-lg-6">

                        <div class="fc-webapp-image">

                            <img src="{{ asset('assets/images/web-1.webp') }}" alt="Responsive web and app development"
                                loading="lazy" class="img-fluid">

                        </div>

                    </div>


                    <div class="col-lg-6">

                        <span class="fc-section-eyebrow">

                            Mobile First

                        </span>


                        <h2 class="fc-section-title">

                            Responsive &
                            <span class="fc-gradient-text">
                                Accessible
                            </span>

                        </h2>


                        <p class="fc-section-description">

                            We design for the smallest screen first, ensuring
                            your experience translates naturally to tablets
                            and desktops. Accessibility and usability are
                            considered throughout the development process.

                        </p>


                        <div class="row g-3 mt-4">


                            <div class="col-6">

                                <div class="fc-webapp-check">

                                    <i class="fas fa-check-circle"></i>

                                    <span>
                                        Fluid Layouts
                                    </span>

                                </div>

                            </div>


                            <div class="col-6">

                                <div class="fc-webapp-check">

                                    <i class="fas fa-check-circle"></i>

                                    <span>
                                        Touch Friendly
                                    </span>

                                </div>

                            </div>


                            <div class="col-6">

                                <div class="fc-webapp-check">

                                    <i class="fas fa-check-circle"></i>

                                    <span>
                                        Retina Ready
                                    </span>

                                </div>

                            </div>


                            <div class="col-6">

                                <div class="fc-webapp-check">

                                    <i class="fas fa-check-circle"></i>

                                    <span>
                                        Cross-Browser
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================
         06 — MAINTENANCE & OPTIMIZATION
         ======================================================== --}}

        <section id="maintenance" class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">

                            <span></span>

                            Long-Term Partnership

                        </div>


                        <h2 class="fc-services-list-title">

                            Maintenance &
                            <span>Optimization</span>

                        </h2>

                    </div>


                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">

                            Launch is only the beginning. We help keep your
                            digital products secure, reliable, fast, and
                            ready for continued improvement.

                        </p>

                    </div>

                </div>


                <div class="row g-4">


                    {{-- 01 --}}
                    <div class="col-12 col-md-6 col-xl-3">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    01
                                </span>

                                <div class="fc-service-icon">

                                    <i class="fas fa-server"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Reliability
                                </span>

                                <h3>
                                    Monitoring
                                </h3>

                                <p>
                                    Proactive monitoring helps identify
                                    issues before they become larger problems.
                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- 02 --}}
                    <div class="col-12 col-md-6 col-xl-3">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    02
                                </span>

                                <div class="fc-service-icon">

                                    <i class="fas fa-shield-alt"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Security
                                </span>

                                <h3>
                                    Security Updates
                                </h3>

                                <p>
                                    Regular patches and maintenance to
                                    keep your platform protected.
                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- 03 --}}
                    <div class="col-12 col-md-6 col-xl-3">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    03
                                </span>

                                <div class="fc-service-icon">

                                    <i class="fas fa-tachometer-alt"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Performance
                                </span>

                                <h3>
                                    Performance Tuning
                                </h3>

                                <p>
                                    Continuous optimization focused on
                                    speed, usability, and Core Web Vitals.
                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- 04 --}}
                    <div class="col-12 col-md-6 col-xl-3">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    04
                                </span>

                                <div class="fc-service-icon">

                                    <i class="fas fa-life-ring"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Support
                                </span>

                                <h3>
                                    Ongoing Assistance
                                </h3>

                                <p>
                                    Troubleshooting, content updates,
                                    enhancements, and technical support
                                    when your business needs it.
                                </p>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================
         07 — PROCESS
         Exact existing fc-work structure
         ======================================================== --}}

        <section id="process" class="fc-work-section">

            <div class="container">

                <div class="fc-work-header">

                    <div class="fc-work-eyebrow">

                        <span class="fc-work-eyebrow-line"></span>

                        How We Build

                    </div>


                    <div class="row align-items-end g-4">

                        <div class="col-lg-7">

                            <h2 class="fc-work-title">

                                SEO, performance,
                                <span>and UX in one plan.</span>

                            </h2>

                        </div>


                        <div class="col-lg-5">

                            <p class="fc-work-intro">

                                Every engagement follows a structured process
                                that brings together user experience, technical
                                performance, SEO foundations, and business goals.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="row g-4 fc-work-process">


                    {{-- 01 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <article class="fc-work-card fc-work-card-featured">

                            <div class="fc-work-card-top">

                                <span class="fc-work-number">
                                    01
                                </span>


                                <div class="fc-work-icon">

                                    <i class="fas fa-search"></i>

                                </div>

                            </div>


                            <div class="fc-work-card-content">

                                <span class="fc-work-label">
                                    Discovery
                                </span>


                                <h3>
                                    Discovery & IA
                                </h3>


                                <p>
                                    Understand the business, audience,
                                    content, search intent, requirements,
                                    and information architecture.
                                </p>

                            </div>


                            <span class="fc-work-card-accent"></span>

                        </article>

                    </div>



                    {{-- 02 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <article class="fc-work-card">

                            <div class="fc-work-card-top">

                                <span class="fc-work-number">
                                    02
                                </span>


                                <div class="fc-work-icon">

                                    <i class="fas fa-pencil-ruler"></i>

                                </div>

                            </div>


                            <div class="fc-work-card-content">

                                <span class="fc-work-label">
                                    Design
                                </span>


                                <h3>
                                    Design & UX
                                </h3>


                                <p>
                                    Responsive layouts, accessible patterns,
                                    intuitive user flows, and clear calls
                                    to action.
                                </p>

                            </div>


                            <span class="fc-work-card-accent"></span>

                        </article>

                    </div>



                    {{-- 03 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <article class="fc-work-card">

                            <div class="fc-work-card-top">

                                <span class="fc-work-number">
                                    03
                                </span>


                                <div class="fc-work-icon">

                                    <i class="fas fa-code"></i>

                                </div>

                            </div>


                            <div class="fc-work-card-content">

                                <span class="fc-work-label">
                                    Build
                                </span>


                                <h3>
                                    Build & Optimize
                                </h3>


                                <p>
                                    Clean development, semantic markup,
                                    structured data, optimized assets,
                                    and performance tuning.
                                </p>

                            </div>


                            <span class="fc-work-card-accent"></span>

                        </article>

                    </div>



                    {{-- 04 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <article class="fc-work-card">

                            <div class="fc-work-card-top">

                                <span class="fc-work-number">
                                    04
                                </span>


                                <div class="fc-work-icon">

                                    <i class="fas fa-chart-line"></i>

                                </div>

                            </div>


                            <div class="fc-work-card-content">

                                <span class="fc-work-label">
                                    Launch
                                </span>


                                <h3>
                                    Launch & Measure
                                </h3>


                                <p>
                                    QA, analytics, conversion tracking,
                                    monitoring, and continuous improvements
                                    based on real data.
                                </p>

                            </div>


                            <span class="fc-work-card-accent"></span>

                        </article>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================
         08 — FAQ
         Uses existing service-card system
         ======================================================== --}}

        <section id="faq" class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">

                            <span></span>

                            Frequently Asked Questions

                        </div>


                        <h2 class="fc-services-list-title">

                            Questions about
                            <span>web & app development.</span>

                        </h2>

                    </div>


                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">

                            A few common questions businesses ask before
                            starting a web or application development project.

                        </p>

                    </div>

                </div>


                <div class="row g-4">


                    {{-- FAQ 01 --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    01
                                </span>

                                <div class="fc-service-icon">

                                    <i class="fas fa-rocket"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    PERFORMANCE & SEO
                                </span>

                                <h3>
                                    How do you make websites perform better?
                                </h3>

                                <p>
                                    We focus on semantic markup, optimized assets,
                                    Core Web Vitals, technical SEO, structured data,
                                    and performance-conscious development.
                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- FAQ 02 --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    02
                                </span>

                                <div class="fc-service-icon">

                                    <i class="fas fa-mobile-alt"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    MOBILE
                                </span>

                                <h3>
                                    Can you support both web and mobile apps?
                                </h3>

                                <p>
                                    Yes. API-first architectures can support
                                    websites, web applications, mobile clients,
                                    and third-party systems from a connected
                                    backend.
                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- FAQ 03 --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    03
                                </span>

                                <div class="fc-service-icon">

                                    <i class="fas fa-tools"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    MAINTENANCE
                                </span>

                                <h3>
                                    What's included in maintenance?
                                </h3>

                                <p>
                                    Depending on the engagement, maintenance
                                    can include security updates, monitoring,
                                    performance optimization, troubleshooting,
                                    content updates, and technical improvements.
                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- FAQ 04 --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    04
                                </span>

                                <div class="fc-service-icon">

                                    <i class="fas fa-code"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    TECHNOLOGY
                                </span>

                                <h3>
                                    What technologies do you work with?
                                </h3>

                                <p>
                                    Depending on the project, we work with
                                    technologies such as Laravel, PHP, React,
                                    Vue.js, Node.js, WordPress, MySQL, APIs,
                                    and modern web development tools.
                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- FAQ 05 --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    05
                                </span>

                                <div class="fc-service-icon">

                                    <i class="fas fa-clock"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    TIMELINE
                                </span>

                                <h3>
                                    How long does a project take?
                                </h3>

                                <p>
                                    Timelines depend on scope, features,
                                    integrations, design requirements, and
                                    technical complexity. We define clear
                                    milestones during planning.
                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- FAQ 06 --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    06
                                </span>

                                <div class="fc-service-icon">

                                    <i class="fas fa-comments"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    GET STARTED
                                </span>

                                <h3>
                                    How do we get started?
                                </h3>

                                <p>
                                    Tell us about your business, goals,
                                    requirements, and current challenges.
                                    We'll discuss the project and determine
                                    the right approach together.
                                </p>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Talk to Our Team

                            </a>

                        </article>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================
         09 — CTA
         Exact existing CTA structure
         ======================================================== --}}

        <section class="fc-services-cta">

            <div class="fc-cta-glow"></div>

            <div class="container">

                <div class="fc-services-cta-inner">

                    <div class="fc-section-eyebrow fc-section-eyebrow-light">

                        <span></span>

                        Have a Project in Mind?

                        <span></span>

                    </div>


                    <h2 class="fc-services-cta-title">

                        Ready to build something
                        <span>that moves forward?</span>

                    </h2>


                    <p class="fc-services-cta-text">

                        Tell us what you're building, where you want
                        to go, and what you need to get there.

                    </p>


                    <div class="fc-services-cta-actions">

                        <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary fc-btn-large">

                            Start a Conversation

                        </a>


                        <a href="{{ url('portfolio') }}" class="fc-btn fc-btn-dark-outline fc-btn-large">

                            View Our Work

                        </a>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================
         10 — RELATED SERVICES
         Same include as Services page
         ======================================================== --}}

        <section id="related-services" class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">

                            <span></span>

                            More Services

                        </div>


                        <h2 class="fc-services-list-title">

                            Explore our
                            <span>other services.</span>

                        </h2>

                    </div>


                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">

                            Explore other FusionCentrix capabilities that
                            can complement your development project.

                        </p>

                    </div>

                </div>


                @include('includes.services')

            </div>

        </section>


    </main>
@endsection
