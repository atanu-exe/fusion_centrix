@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/v2/ecosystem.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/v2/home.css') }}">

    <script src="{{ asset('assets/js/v2/ecosystem.js') }}" defer></script>
    <section id="home-hero-section" class="fc-hero-section position-relative text-white overflow-hidden" role="banner"
        aria-label="FusionCentrix Solutions">

        <div class="container">

            <div class="row align-items-center">

                {{-- =================================================
                 HERO CONTENT
            ================================================== --}}
                <div class="col-lg-6 fc-hero-content">

                    <h1 class="fc-hero-title">

                        Building Intelligent
                        Solutions for a

                        <span class="fc-hero-highlight">
                            Better Tomorrow
                        </span>

                    </h1>


                    <p class="fc-hero-subtitle">

                        FusionCentrix helps businesses accelerate
                        growth with technology, design, and digital
                        innovation.

                    </p>


                    {{-- =================================================
                     CTA
                ================================================== --}}
                    <div class="fc-hero-cta">

                        <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary" aria-label="Get Started"
                            onclick="Calendly.initPopupWidget({url: 'https://calendly.com/fusioncentrix/30min?hide_event_type_details=1&hide_gdpr_banner=1'});return false;">

                            <span>
                                Get Started
                            </span>

                            <i class="fas fa-arrow-right" aria-hidden="true"></i>

                        </a>


                        <a href="{{ url('portfolio') }}" class="fc-btn fc-btn-secondary" aria-label="View Our Work">

                            <i class="fas fa-play" aria-hidden="true"></i>

                            <span>
                                View Our Work
                            </span>

                        </a>

                    </div>


                    {{-- =================================================
                     STATS
                ================================================== --}}
                    <div class="fc-hero-stats">

                        <div class="row g-0">

                            <div class="col-6 col-sm-3">

                                <div class="fc-stat">

                                    <h2 class="fc-stat-number">
                                        30+
                                    </h2>

                                    <p class="fc-stat-label">
                                        Projects Delivered
                                    </p>

                                </div>

                            </div>


                            <div class="col-6 col-sm-3">

                                <div class="fc-stat">

                                    <h2 class="fc-stat-number">
                                        98%
                                    </h2>

                                    <p class="fc-stat-label">
                                        Client Satisfaction
                                    </p>

                                </div>

                            </div>


                            <div class="col-6 col-sm-3">

                                <div class="fc-stat">

                                    <h2 class="fc-stat-number">
                                        Global
                                    </h2>

                                    <p class="fc-stat-label">
                                        Business Reach
                                    </p>

                                </div>

                            </div>


                            <div class="col-6 col-sm-3">

                                <div class="fc-stat">

                                    <h2 class="fc-stat-number">
                                        24/7
                                    </h2>

                                    <p class="fc-stat-label">
                                        Support
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- =================================================
                 HERO VISUAL
            ================================================== --}}
                <div class="col-lg-6 fc-hero-image">

                    <div class="fc-hero-image-wrapper">

                        <span class="fc-hero-float fc-float-1" aria-hidden="true">
                        </span>

                        <span class="fc-hero-float fc-float-2" aria-hidden="true">
                        </span>

                        <span class="fc-hero-float fc-float-3" aria-hidden="true">
                        </span>


                        {{-- <img src="{{ asset('assets/images/fusioncentrix-ecosystem.svg') }}"
                            alt="FusionCentrix digital technology solutions" class="img-fluid fc-hero-img-fixed"
                            width="720" height="560" fetchpriority="high" decoding="async"> --}}
                        <div class="fc-hero-ecosystem">
                            @include('partials.fusioncentrix-ecosystem')
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- ============================================================
     SECTION 2 — CAPABILITIES
============================================================= --}}

    <section id="capabilities" class="fc-capabilities" aria-labelledby="capabilities-title">

        <div class="container">

            <header class="fc-capabilities-header">

                <span class="fc-eyebrow">
                    What We Do
                </span>

                <h2 id="capabilities-title" class="fc-section-title">
                    Everything Digital.
                    <span class="fc-gradient-text">One Partner.</span>
                </h2>

                <p class="fc-section-description">
                    From strategy and design to development, growth, and automation,
                    we bring the expertise and technology your business needs to move forward.
                </p>

            </header>


            <div class="fc-capabilities-grid">


                {{-- DESIGN --}}
                <article class="fc-capability-card fc-card-design">

                    <div class="fc-capability-visual">

                        <span class="fc-capability-number">
                            01
                        </span>

                        <div class="fc-capability-icon">

                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                            </svg>

                        </div>

                        <span class="fc-capability-visual-line"></span>

                    </div>


                    <div class="fc-capability-body">

                        <span class="fc-capability-category">
                            Creative
                        </span>

                        <h3 class="fc-capability-title">
                            Design
                        </h3>

                        <p class="fc-capability-text">
                            Create memorable digital experiences through graphic design,
                            UI/UX, and visual identity.
                        </p>


                        <div class="fc-capability-footer">

                            <div class="fc-capability-tags">
                                <span>UI/UX</span>
                                <span>Graphic Design</span>
                                <span>Branding</span>
                            </div>

                            <span class="fc-capability-arrow">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12h14"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>
                            </span>

                        </div>

                    </div>

                </article>


                {{-- DEVELOPMENT --}}
                <article class="fc-capability-card fc-card-development">

                    <div class="fc-capability-visual">

                        <span class="fc-capability-number">
                            02
                        </span>

                        <div class="fc-capability-icon">

                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <polyline points="16 18 22 12 16 6"></polyline>
                                <polyline points="8 6 2 12 8 18"></polyline>
                                <line x1="14" y1="4" x2="10" y2="20"></line>
                            </svg>

                        </div>

                        <span class="fc-capability-visual-line"></span>

                    </div>


                    <div class="fc-capability-body">

                        <span class="fc-capability-category">
                            Technology
                        </span>

                        <h3 class="fc-capability-title">
                            Development
                        </h3>

                        <p class="fc-capability-text">
                            Build high-performance websites, web applications,
                            mobile apps, and custom digital solutions.
                        </p>


                        <div class="fc-capability-footer">

                            <div class="fc-capability-tags">
                                <span>Web</span>
                                <span>Apps</span>
                                <span>Software</span>
                            </div>

                            <span class="fc-capability-arrow">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12h14"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>
                            </span>

                        </div>

                    </div>

                </article>


                {{-- GROWTH --}}
                <article class="fc-capability-card fc-card-growth">

                    <div class="fc-capability-visual">

                        <span class="fc-capability-number">
                            03
                        </span>

                        <div class="fc-capability-icon">

                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <polyline points="3 17 9 11 13 15 21 7"></polyline>
                                <polyline points="14 7 21 7 21 14"></polyline>
                            </svg>

                        </div>

                        <span class="fc-capability-visual-line"></span>

                    </div>


                    <div class="fc-capability-body">

                        <span class="fc-capability-category">
                            Growth
                        </span>

                        <h3 class="fc-capability-title">
                            Growth
                        </h3>

                        <p class="fc-capability-text">
                            Strengthen your online visibility with SEO, content,
                            digital strategy, and conversion-focused experiences.
                        </p>


                        <div class="fc-capability-footer">

                            <div class="fc-capability-tags">
                                <span>SEO</span>
                                <span>Strategy</span>
                                <span>Marketing</span>
                            </div>

                            <span class="fc-capability-arrow">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12h14"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>
                            </span>

                        </div>

                    </div>

                </article>


                {{-- AUTOMATION --}}
                <article class="fc-capability-card fc-card-automation">

                    <div class="fc-capability-visual">

                        <span class="fc-capability-number">
                            04
                        </span>

                        <div class="fc-capability-icon">

                            <svg viewBox="0 0 24 24" aria-hidden="true">

                                <rect x="4" y="4" width="16" height="16" rx="3">
                                </rect>

                                <circle cx="12" cy="12" r="3">
                                </circle>

                                <line x1="12" y1="1" x2="12" y2="4"></line>
                                <line x1="12" y1="20" x2="12" y2="23"></line>
                                <line x1="1" y1="12" x2="4" y2="12"></line>
                                <line x1="20" y1="12" x2="23" y2="12"></line>

                            </svg>

                        </div>

                        <span class="fc-capability-visual-line"></span>

                    </div>


                    <div class="fc-capability-body">

                        <span class="fc-capability-category">
                            Intelligence
                        </span>

                        <h3 class="fc-capability-title">
                            Automation
                        </h3>

                        <p class="fc-capability-text">
                            Use AI, automation, integrations, and cloud technology
                            to make operations smarter and more efficient.
                        </p>


                        <div class="fc-capability-footer">

                            <div class="fc-capability-tags">
                                <span>AI</span>
                                <span>Automation</span>
                                <span>Cloud</span>
                            </div>

                            <span class="fc-capability-arrow">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12h14"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>
                            </span>

                        </div>

                    </div>

                </article>

            </div>


            <div class="fc-capabilities-action">

                <a href="{{ url('services') }}" class="fc-capabilities-link"
                    aria-label="Explore all FusionCentrix services">

                    <span>
                        Explore All Services
                    </span>

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M5 12h14"></path>
                        <path d="m13 6 6 6-6 6"></path>
                    </svg>

                </a>

            </div>

        </div>

    </section>
    {{-- ============================================================
     FUSIONCENTRIX V2 — WHY FUSIONCENTRIX
     ============================================================ --}}

    <section id="why-fusioncentrix" class="fc-why-section" aria-labelledby="why-fusioncentrix-title">

        <div class="container">

            <div class="row align-items-center g-5">

                {{-- =================================================
                 LEFT CONTENT
                 ================================================= --}}

                <div class="col-lg-6">

                    <div class="fc-why-content">

                        <span class="fc-why-eyebrow">
                            Why FusionCentrix
                        </span>

                        <h2 id="why-fusioncentrix-title" class="fc-why-title">

                            Technology should
                            <span>make business better.</span>

                        </h2>

                        <p class="fc-why-description">
                            We combine strategy, design, technology, and growth
                            to build digital experiences that help businesses
                            move forward.
                        </p>


                        {{-- =================================================
                         BENEFITS
                         ================================================= --}}

                        <div class="fc-why-points">

                            {{-- Point 1 --}}
                            <div class="fc-why-point">

                                <div class="fc-why-point-icon">

                                    <svg viewBox="0 0 24 24" aria-hidden="true">

                                        <path d="M12 3L4 7v5c0 5 3.5 8 8 9 4.5-1 8-4 8-9V7l-8-4Z"></path>

                                        <path d="m8.5 12 2.2 2.2 4.8-5"></path>

                                    </svg>

                                </div>

                                <div>
                                    <h3>Business-first thinking</h3>

                                    <p>
                                        We focus on business goals, not just
                                        technology.
                                    </p>
                                </div>

                            </div>


                            {{-- Point 2 --}}
                            <div class="fc-why-point">

                                <div class="fc-why-point-icon">

                                    <svg viewBox="0 0 24 24" aria-hidden="true">

                                        <path d="M4 19V5"></path>

                                        <path d="M4 19h16"></path>

                                        <path d="m7 15 4-4 3 2 6-7"></path>

                                        <path d="M16 6h4v4"></path>

                                    </svg>

                                </div>

                                <div>
                                    <h3>Built to scale</h3>

                                    <p>
                                        Digital solutions designed to grow
                                        alongside your business.
                                    </p>
                                </div>

                            </div>


                            {{-- Point 3 --}}
                            <div class="fc-why-point">

                                <div class="fc-why-point-icon">

                                    <svg viewBox="0 0 24 24" aria-hidden="true">

                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>

                                        <circle cx="9" cy="7" r="4"></circle>

                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>

                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>

                                    </svg>

                                </div>

                                <div>
                                    <h3>One expert team</h3>

                                    <p>
                                        Strategy, design, development and growth
                                        working together.
                                    </p>
                                </div>

                            </div>


                            {{-- Point 4 --}}
                            <div class="fc-why-point">

                                <div class="fc-why-point-icon">

                                    <svg viewBox="0 0 24 24" aria-hidden="true">

                                        <path d="M20 11a8.1 8.1 0 0 0-15.5-2"></path>

                                        <path d="M4 4v5h5"></path>

                                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2"></path>

                                        <path d="M20 20v-5h-5"></path>

                                    </svg>

                                </div>

                                <div>
                                    <h3>Long-term partnership</h3>

                                    <p>
                                        We build for today while keeping tomorrow
                                        in mind.
                                    </p>
                                </div>

                            </div>

                        </div>


                        {{-- CTA --}}

                        <div class="fc-why-action">

                            <a href="{{ url('about-us') }}" class="fc-why-link">

                                <span>
                                    Discover FusionCentrix
                                </span>

                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12h14"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>

                            </a>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                 RIGHT ECOSYSTEM VISUAL
                 ================================================= --}}

                <div class="col-lg-6">

                    <div class="fc-why-visual" aria-hidden="true">


                        {{-- Decorative glow --}}

                        <div class="fc-why-glow"></div>


                        {{-- Connecting lines --}}

                        <span class="fc-network-line fc-network-line-1"></span>
                        <span class="fc-network-line fc-network-line-2"></span>
                        <span class="fc-network-line fc-network-line-3"></span>
                        <span class="fc-network-line fc-network-line-4"></span>
                        <span class="fc-network-line fc-network-line-5"></span>
                        <span class="fc-network-line fc-network-line-6"></span>


                        {{-- Outer nodes --}}

                        <span class="fc-network-node fc-network-node-1"></span>
                        <span class="fc-network-node fc-network-node-2"></span>
                        <span class="fc-network-node fc-network-node-3"></span>
                        <span class="fc-network-node fc-network-node-4"></span>


                        {{-- Main ecosystem --}}

                        <div class="fc-ecosystem-core">

                            <div class="fc-core-ring fc-core-ring-outer"></div>

                            <div class="fc-core-ring fc-core-ring-inner"></div>

                            <div class="fc-core-center">

                                <svg viewBox="0 0 80 80">

                                    <path d="M40 8v10"></path>
                                    <path d="M40 62v10"></path>
                                    <path d="M8 40h10"></path>
                                    <path d="M62 40h10"></path>

                                    <rect x="22" y="22" width="36" height="36" rx="8">
                                    </rect>

                                    <circle cx="40" cy="40" r="8">
                                    </circle>

                                </svg>

                            </div>

                        </div>


                        {{-- Strategy --}}

                        <div class="fc-network-card fc-network-card-strategy">

                            <span class="fc-network-card-icon">
                                ✦
                            </span>

                            <span>
                                Strategy
                            </span>

                        </div>


                        {{-- Design --}}

                        <div class="fc-network-card fc-network-card-design">

                            <span class="fc-network-card-icon">
                                ◇
                            </span>

                            <span>
                                Design
                            </span>

                        </div>


                        {{-- Technology --}}

                        <div class="fc-network-card fc-network-card-technology">

                            <span class="fc-network-card-icon">
                                &lt;/&gt;
                            </span>

                            <span>
                                Technology
                            </span>

                        </div>


                        {{-- Growth --}}

                        <div class="fc-network-card fc-network-card-growth">

                            <span class="fc-network-card-icon">
                                ↗
                            </span>

                            <span>
                                Growth
                            </span>

                        </div>


                        {{-- Floating particles --}}

                        <span class="fc-why-particle fc-why-particle-1"></span>
                        <span class="fc-why-particle fc-why-particle-2"></span>
                        <span class="fc-why-particle fc-why-particle-3"></span>
                        <span class="fc-why-particle fc-why-particle-4"></span>

                    </div>

                </div>

            </div>

        </div>

    </section>
    {{-- ============================================================
     FUSIONCENTRIX V2 — SELECTED WORK
     ============================================================ --}}

    <section id="selected-work" class="fc-work-section" aria-labelledby="selected-work-title">

        <div class="container">

            {{-- =====================================================
             SECTION HEADER
             ===================================================== --}}

            <div class="fc-work-header">

                <div class="fc-work-heading">

                    <span class="fc-work-eyebrow">
                        Selected Work
                    </span>

                    <h2 id="selected-work-title" class="fc-work-title">

                        Digital products
                        <span>built to perform.</span>

                    </h2>

                </div>


                <div class="fc-work-intro">

                    <p>
                        A selection of websites, applications, and digital
                        experiences we've created to help businesses grow.
                    </p>

                    <a href="{{ url('portfolio') }}" class="fc-work-all-link">

                        <span>
                            View All Projects
                        </span>

                        <svg viewBox="0 0 24 24" aria-hidden="true">

                            <path d="M5 12h14"></path>
                            <path d="m13 6 6 6-6 6"></path>

                        </svg>

                    </a>

                </div>

            </div>


            {{-- =====================================================
             FEATURED PROJECT
             ===================================================== --}}

            <article class="fc-work-featured">

                {{-- Project Visual --}}

                <a href="{{ url('portfolio') }}" class="fc-work-featured-media"
                    aria-label="View featured FusionCentrix project">

                    {{-- Replace with actual portfolio image --}}

                    <img src="{{ asset('assets/images/portfolio/featured-project.webp') }}"
                        alt="Featured web development project created by FusionCentrix" loading="lazy" decoding="async">


                    {{-- Image Overlay --}}

                    <div class="fc-work-media-overlay">

                        <span>
                            View Project
                        </span>

                        <svg viewBox="0 0 24 24" aria-hidden="true">

                            <path d="M5 12h14"></path>
                            <path d="m13 6 6 6-6 6"></path>

                        </svg>

                    </div>

                </a>


                {{-- Project Information --}}

                <div class="fc-work-featured-info">

                    <div>

                        <span class="fc-work-category">
                            Featured Project
                        </span>

                        <h3>
                            Digital Experience
                        </h3>

                        <p>
                            A high-performance digital experience designed to
                            combine modern design, technology, and conversion-focused
                            user journeys.
                        </p>

                    </div>


                    <div class="fc-work-project-meta">

                        <span>
                            Web Design
                        </span>

                        <span>
                            Development
                        </span>

                        <span>
                            SEO
                        </span>

                    </div>


                    <a href="{{ url('portfolio') }}" class="fc-work-project-link">

                        <span>
                            Explore Project
                        </span>

                        <svg viewBox="0 0 24 24" aria-hidden="true">

                            <path d="M5 12h14"></path>
                            <path d="m13 6 6 6-6 6"></path>

                        </svg>

                    </a>

                </div>

            </article>


            {{-- =====================================================
             SECONDARY PROJECTS
             ===================================================== --}}

            <div class="fc-work-grid">


                {{-- PROJECT 02 --}}

                <article class="fc-work-item">

                    <a href="{{ url('portfolio') }}" class="fc-work-item-media"
                        aria-label="View FusionCentrix web design project">

                        <img src="{{ asset('assets/images/portfolio/project-02.webp') }}"
                            alt="Website design project created by FusionCentrix" loading="lazy" decoding="async">

                        <div class="fc-work-item-arrow">

                            <svg viewBox="0 0 24 24" aria-hidden="true">

                                <path d="M5 12h14"></path>
                                <path d="m13 6 6 6-6 6"></path>

                            </svg>

                        </div>

                    </a>


                    <div class="fc-work-item-content">

                        <div>

                            <span>
                                Website
                            </span>

                            <h3>
                                Business Website
                            </h3>

                        </div>

                        <span class="fc-work-item-number">
                            02
                        </span>

                    </div>

                </article>



                {{-- PROJECT 03 --}}

                <article class="fc-work-item">

                    <a href="{{ url('portfolio') }}" class="fc-work-item-media"
                        aria-label="View FusionCentrix application development project">

                        <img src="{{ asset('assets/images/portfolio/project-03.webp') }}"
                            alt="Custom application development project created by FusionCentrix" loading="lazy"
                            decoding="async">

                        <div class="fc-work-item-arrow">

                            <svg viewBox="0 0 24 24" aria-hidden="true">

                                <path d="M5 12h14"></path>
                                <path d="m13 6 6 6-6 6"></path>

                            </svg>

                        </div>

                    </a>


                    <div class="fc-work-item-content">

                        <div>

                            <span>
                                Development
                            </span>

                            <h3>
                                Custom Digital Platform
                            </h3>

                        </div>

                        <span class="fc-work-item-number">
                            03
                        </span>

                    </div>

                </article>



                {{-- PROJECT 04 --}}

                <article class="fc-work-item">

                    <a href="{{ url('portfolio') }}" class="fc-work-item-media"
                        aria-label="View FusionCentrix branding project">

                        <img src="{{ asset('assets/images/portfolio/project-04.webp') }}"
                            alt="Branding and digital design project created by FusionCentrix" loading="lazy"
                            decoding="async">

                        <div class="fc-work-item-arrow">

                            <svg viewBox="0 0 24 24" aria-hidden="true">

                                <path d="M5 12h14"></path>
                                <path d="m13 6 6 6-6 6"></path>

                            </svg>

                        </div>

                    </a>


                    <div class="fc-work-item-content">

                        <div>

                            <span>
                                Branding
                            </span>

                            <h3>
                                Brand & Digital Identity
                            </h3>

                        </div>

                        <span class="fc-work-item-number">
                            04
                        </span>

                    </div>

                </article>

            </div>


            {{-- =====================================================
             BOTTOM CTA
             ===================================================== --}}

            <div class="fc-work-bottom">

                <div>

                    <span class="fc-work-bottom-label">
                        Have a project in mind?
                    </span>

                    <strong>
                        Let's build something great.
                    </strong>

                </div>

                <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary">

                    <span>
                        Start a Project
                    </span>

                    <svg viewBox="0 0 24 24" aria-hidden="true">

                        <path d="M5 12h14"></path>
                        <path d="m13 6 6 6-6 6"></path>

                    </svg>

                </a>

            </div>

        </div>

    </section>
    {{-- ============================================================
     FUSIONCENTRIX V2 — HOW WE WORK
     ============================================================ --}}

    <section id="how-we-work" class="fc-process-section" aria-labelledby="how-we-work-title">

        <div class="container">

            {{-- =====================================================
             SECTION HEADER
             ===================================================== --}}

            <header class="fc-process-header">

                <div>

                    <span class="fc-process-eyebrow">
                        How We Work
                    </span>

                    <h2 id="how-we-work-title" class="fc-process-title">

                        From idea to
                        <span>impact.</span>

                    </h2>

                </div>


                <p class="fc-process-intro">
                    A clear, collaborative process that keeps your project
                    focused, efficient, and built around your business goals.
                </p>

            </header>


            {{-- =====================================================
             PROCESS TIMELINE
             ===================================================== --}}

            <div class="fc-process-timeline">


                {{-- STEP 01 --}}
                <article class="fc-process-step fc-process-step-active">

                    <div class="fc-process-step-top">

                        <span class="fc-process-index">
                            01
                        </span>

                        <span class="fc-process-line"></span>

                    </div>


                    <div class="fc-process-step-icon">

                        <svg viewBox="0 0 24 24" aria-hidden="true">

                            <circle cx="11" cy="11" r="7">
                            </circle>

                            <path d="m20 20-4-4">
                            </path>

                            <path d="M11 8v6">
                            </path>

                            <path d="M8 11h6">
                            </path>

                        </svg>

                    </div>


                    <h3>
                        Discover
                    </h3>

                    <p>
                        We understand your business, audience, challenges,
                        and goals before defining the right direction.
                    </p>

                </article>



                {{-- STEP 02 --}}
                <article class="fc-process-step">

                    <div class="fc-process-step-top">

                        <span class="fc-process-index">
                            02
                        </span>

                        <span class="fc-process-line"></span>

                    </div>


                    <div class="fc-process-step-icon">

                        <svg viewBox="0 0 24 24" aria-hidden="true">

                            <path d="M12 3l2.7 5.5L21 9.4l-4.5 4.4 1 6.2-5.5-2.9-5.5 2.9 1-6.2L3 9.4l6.3-.9L12 3Z">
                            </path>

                        </svg>

                    </div>


                    <h3>
                        Strategize
                    </h3>

                    <p>
                        We turn insights into a focused digital strategy,
                        defining priorities, technology, and success metrics.
                    </p>

                </article>



                {{-- STEP 03 --}}
                <article class="fc-process-step">

                    <div class="fc-process-step-top">

                        <span class="fc-process-index">
                            03
                        </span>

                        <span class="fc-process-line"></span>

                    </div>


                    <div class="fc-process-step-icon">

                        <svg viewBox="0 0 24 24" aria-hidden="true">

                            <path d="M12 20h9">
                            </path>

                            <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z">
                            </path>

                        </svg>

                    </div>


                    <h3>
                        Design
                    </h3>

                    <p>
                        We create intuitive interfaces and visual experiences
                        that connect your brand with your audience.
                    </p>

                </article>



                {{-- STEP 04 --}}
                <article class="fc-process-step">

                    <div class="fc-process-step-top">

                        <span class="fc-process-index">
                            04
                        </span>

                        <span class="fc-process-line"></span>

                    </div>


                    <div class="fc-process-step-icon">

                        <svg viewBox="0 0 24 24" aria-hidden="true">

                            <polyline points="16 18 22 12 16 6">
                            </polyline>

                            <polyline points="8 6 2 12 8 18">
                            </polyline>

                            <line x1="14" y1="4" x2="10" y2="20">
                            </line>

                        </svg>

                    </div>


                    <h3>
                        Build
                    </h3>

                    <p>
                        Our development team turns the approved experience
                        into a fast, reliable, and scalable digital product.
                    </p>

                </article>



                {{-- STEP 05 --}}
                <article class="fc-process-step">

                    <div class="fc-process-step-top">

                        <span class="fc-process-index">
                            05
                        </span>

                        <span class="fc-process-line"></span>

                    </div>


                    <div class="fc-process-step-icon">

                        <svg viewBox="0 0 24 24" aria-hidden="true">

                            <path d="M5 12h14">
                            </path>

                            <path d="m13 6 6 6-6 6">
                            </path>

                        </svg>

                    </div>


                    <h3>
                        Launch
                    </h3>

                    <p>
                        We test, optimize, and prepare everything for a
                        smooth and confident launch.
                    </p>

                </article>



                {{-- STEP 06 --}}
                <article class="fc-process-step">

                    <div class="fc-process-step-top">

                        <span class="fc-process-index">
                            06
                        </span>

                        <span class="fc-process-line fc-process-line-last"></span>

                    </div>


                    <div class="fc-process-step-icon">

                        <svg viewBox="0 0 24 24" aria-hidden="true">

                            <polyline points="3 17 9 11 13 15 21 7">
                            </polyline>

                            <polyline points="14 7 21 7 21 14">
                            </polyline>

                        </svg>

                    </div>


                    <h3>
                        Grow
                    </h3>

                    <p>
                        After launch, we use data, optimization, SEO, and
                        continuous improvements to help you grow.
                    </p>

                </article>

            </div>


            {{-- =====================================================
             PROCESS FOOTER
             ===================================================== --}}

            <div class="fc-process-footer">

                <div class="fc-process-footer-content">

                    <span>
                        A process built around your goals.
                    </span>

                    <strong>
                        Your success is the measure.
                    </strong>

                </div>


                <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary">

                    <span>
                        Start a Conversation
                    </span>

                    <svg viewBox="0 0 24 24" aria-hidden="true">

                        <path d="M5 12h14"></path>

                        <path d="m13 6 6 6-6 6"></path>

                    </svg>

                </a>

            </div>

        </div>

    </section>
    {{-- ============================================================
     FUSIONCENTRIX V2 — RESULTS / TRUST
     ============================================================ --}}

    <section id="results" class="fc-results-section" aria-labelledby="results-title">

        <div class="container">

            {{-- =====================================================
             HEADER
             ===================================================== --}}

            <header class="fc-results-header">

                <span class="fc-results-eyebrow">
                    Results & Trust
                </span>

                <h2 id="results-title" class="fc-results-title">

                    Built for businesses.
                    <span>Measured by results.</span>

                </h2>

                <p class="fc-results-description">
                    We combine technology, design, and strategy to create
                    digital solutions that deliver meaningful value for
                    the businesses we work with.
                </p>

            </header>


            {{-- =====================================================
             METRICS
             ===================================================== --}}

            <div class="fc-results-metrics">


                {{-- 01 --}}
                <div class="fc-result-metric">

                    <div class="fc-result-number">

                        <span class="fc-counter" data-target="30">
                            30
                        </span>

                        <span>+</span>

                    </div>

                    <h3>
                        Projects Delivered
                    </h3>

                    <p>
                        Digital projects delivered across websites,
                        applications, and custom solutions.
                    </p>

                </div>


                {{-- 02 --}}
                <div class="fc-result-metric">

                    <div class="fc-result-number">

                        <span class="fc-counter" data-target="98">
                            98
                        </span>

                        <span>%</span>

                    </div>

                    <h3>
                        Client Satisfaction
                    </h3>

                    <p>
                        Focused on delivering reliable solutions and
                        long-term client value.
                    </p>

                </div>


                {{-- 03 --}}
                <div class="fc-result-metric">

                    <div class="fc-result-number">

                        <span class="fc-counter" data-target="10">
                            10
                        </span>

                        <span>+</span>

                    </div>

                    <h3>
                        Years of Experience
                    </h3>

                    <p>
                        Replace this figure with your verified company
                        or team experience before publishing.
                    </p>

                </div>


                {{-- 04 --}}
                <div class="fc-result-metric">

                    <div class="fc-result-number">

                        <span class="fc-counter" data-target="3">
                            3
                        </span>

                        <span>+</span>

                    </div>

                    <h3>
                        Markets Served
                    </h3>

                    <p>
                        Replace this figure with the actual number of
                        markets or countries you serve.
                    </p>

                </div>

            </div>


            {{-- =====================================================
             TRUST STATEMENT
             ===================================================== --}}

            <div class="fc-results-trust">

                <div class="fc-results-trust-line"></div>

                <div class="fc-results-trust-content">

                    <span class="fc-results-trust-label">
                        Our approach
                    </span>

                    <strong>
                        Technology, design and growth —
                        working together.
                    </strong>

                </div>

                <div class="fc-results-trust-line"></div>

            </div>


            {{-- =====================================================
             TECHNOLOGY / CAPABILITY STRIP
             ===================================================== --}}

            <div class="fc-results-tech" aria-label="Technology capabilities">

                <span>Web Development</span>

                <span>Mobile Applications</span>

                <span>UI/UX Design</span>

                <span>SEO</span>

                <span>Digital Strategy</span>

                <span>Automation</span>

            </div>


            {{-- =====================================================
             TRUST CTA
             ===================================================== --}}

            <div class="fc-results-cta">

                <div class="fc-results-cta-content">

                    <span>
                        Ready to move forward?
                    </span>

                    <h3>
                        Let's turn your next idea into something real.
                    </h3>

                </div>


                <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary">

                    <span>
                        Start Your Project
                    </span>

                    <svg viewBox="0 0 24 24" aria-hidden="true">

                        <path d="M5 12h14"></path>

                        <path d="m13 6 6 6-6 6"></path>

                    </svg>

                </a>

            </div>

        </div>

    </section>
    {{-- ============================================================
     FUSIONCENTRIX V2 — FINAL CTA
     ============================================================ --}}

    <section id="final-cta" class="fc-final-cta" aria-labelledby="final-cta-title">

        {{-- Background decoration --}}
        <div class="fc-final-cta-glow fc-final-cta-glow-left"></div>
        <div class="fc-final-cta-glow fc-final-cta-glow-right"></div>
        <div class="fc-final-cta-grid" aria-hidden="true"></div>


        <div class="container">

            <div class="fc-final-cta-inner">

                {{-- Eyebrow --}}
                <span class="fc-final-cta-eyebrow">
                    Have a project in mind?
                </span>


                {{-- Heading --}}
                <h2 id="final-cta-title" class="fc-final-cta-title">

                    Let's build something
                    <span>that moves your business forward.</span>

                </h2>


                {{-- Description --}}
                <p class="fc-final-cta-description">

                    Whether you need a website, application, SEO,
                    branding, or a complete digital solution,
                    let's talk about what you're building.

                </p>


                {{-- Buttons --}}
                <div class="fc-final-cta-actions">

                    <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary">

                        Start a Conversation

                    </a>

                    <a href="{{ url('portfolio') }}" class="fc-btn fc-btn-dark-outline">

                        View Our Work

                    </a>

                </div>


                {{-- Service strip --}}
                <div class="fc-final-cta-services" aria-label="FusionCentrix capabilities">

                    <span>Web Development</span>

                    <i aria-hidden="true"></i>

                    <span>Applications</span>

                    <i aria-hidden="true"></i>

                    <span>SEO</span>

                    <i aria-hidden="true"></i>

                    <span>UI/UX Design</span>

                    <i aria-hidden="true"></i>

                    <span>Digital Growth</span>

                </div>

            </div>

        </div>

    </section>
    {{-- ============================================================
     FUSIONCENTRIX V2 — MEET OUR EXPERTS
     ============================================================ --}}

    <section id="experts" class="fc-experts fc-section" aria-labelledby="experts-title">

        <div class="container">

            <div class="fc-experts-header">

                <div class="fc-experts-heading">

                    <span class="fc-eyebrow">
                        Meet Our Experts
                    </span>

                    <h2 id="experts-title" class="fc-section-title">

                        The people behind
                        <span class="fc-gradient-text">
                            the solutions.
                        </span>

                    </h2>

                </div>


                <div class="fc-experts-intro">

                    <p>
                        Great digital products are built by people
                        who understand both technology and business.
                        Our team brings together design, development,
                        growth, and digital strategy to turn ideas
                        into meaningful results.
                    </p>

                </div>

            </div>


            <div class="fc-experts-grid">

                {{-- Expert 01 --}}
                <article class="fc-expert-card">

                    <div class="fc-expert-image-wrap">

                        <img src="{{ asset('assets/images/team/expert-1.webp') }}" alt="FusionCentrix team expert"
                            class="fc-expert-image" loading="lazy">

                        <div class="fc-expert-number" aria-hidden="true">
                            01
                        </div>

                    </div>

                    <div class="fc-expert-content">

                        <div>

                            <h3 class="fc-expert-name">
                                Expert Name
                            </h3>

                            <p class="fc-expert-role">
                                Founder &amp; Digital Strategist
                            </p>

                        </div>

                    </div>

                </article>


                {{-- Expert 02 --}}
                <article class="fc-expert-card">

                    <div class="fc-expert-image-wrap">

                        <img src="{{ asset('assets/images/team/expert-2.webp') }}" alt="FusionCentrix team expert"
                            class="fc-expert-image" loading="lazy">

                        <div class="fc-expert-number" aria-hidden="true">
                            02
                        </div>

                    </div>

                    <div class="fc-expert-content">

                        <div>

                            <h3 class="fc-expert-name">
                                Expert Name
                            </h3>

                            <p class="fc-expert-role">
                                Technology &amp; Development
                            </p>

                        </div>

                    </div>

                </article>


                {{-- Expert 03 --}}
                <article class="fc-expert-card">

                    <div class="fc-expert-image-wrap">

                        <img src="{{ asset('assets/images/team/expert-3.webp') }}" alt="FusionCentrix team expert"
                            class="fc-expert-image" loading="lazy">

                        <div class="fc-expert-number" aria-hidden="true">
                            03
                        </div>

                    </div>

                    <div class="fc-expert-content">

                        <div>

                            <h3 class="fc-expert-name">
                                Expert Name
                            </h3>

                            <p class="fc-expert-role">
                                Growth &amp; SEO
                            </p>

                        </div>

                    </div>

                </article>


                {{-- Expert 04 --}}
                <article class="fc-expert-card">

                    <div class="fc-expert-image-wrap">

                        <img src="{{ asset('assets/images/team/expert-4.webp') }}" alt="FusionCentrix team expert"
                            class="fc-expert-image" loading="lazy">

                        <div class="fc-expert-number" aria-hidden="true">
                            04
                        </div>

                    </div>

                    <div class="fc-expert-content">

                        <div>

                            <h3 class="fc-expert-name">
                                Expert Name
                            </h3>

                            <p class="fc-expert-role">
                                Design &amp; Brand
                            </p>

                        </div>

                    </div>

                </article>

            </div>

        </div>

    </section>
@endsection
