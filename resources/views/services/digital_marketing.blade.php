@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/v2/services.css') }}">

    <main>

        {{-- =========================================================
        HERO
    ========================================================== --}}
        <section class="fc-services-hero">

            <div class="fc-hero-grid"></div>

            <div class="container">

                <div class="row align-items-center g-5">

                    <div class="col-lg-6">

                        <div class="fc-services-eyebrow">

                            <span></span>
                            Digital Marketing

                        </div>


                        <h1 class="fc-services-title">

                            Digital marketing
                            <span>strategies</span> built for
                            <strong>growth.</strong>

                        </h1>


                        <p class="fc-services-description">

                            Build a stronger digital presence with
                            <strong>SEO, content marketing, search campaigns,
                                social media, and performance-focused strategies</strong>
                            designed to increase visibility and create meaningful
                            business opportunities.

                        </p>


                        <div class="fc-services-actions">

                            <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary">

                                Start a Conversation

                            </a>


                            <a href="{{ url('portfolio') }}" class="fc-btn fc-btn-dark-outline">

                                Explore Our Work

                            </a>

                        </div>

                    </div>


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
                                <span>GROWTH</span>

                            </div>


                            <div class="fc-orbit-card orbit-design">

                                <i class="fas fa-search"></i>
                                <span>SEO</span>

                            </div>


                            <div class="fc-orbit-card orbit-development">

                                <i class="fas fa-pen-nib"></i>
                                <span>Content</span>

                            </div>


                            <div class="fc-orbit-card orbit-growth">

                                <i class="fas fa-chart-line"></i>
                                <span>Performance</span>

                            </div>


                            <div class="fc-orbit-card orbit-intelligence">

                                <i class="fas fa-bullhorn"></i>
                                <span>Social</span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        MARKETING FOUNDATION
    ========================================================== --}}
        <section class="fc-services-intro">

            <div class="container">

                <div class="text-center">

                    <div class="fc-section-eyebrow">

                        <span></span>
                        Digital Growth
                        <span></span>

                    </div>


                    <h2 class="fc-services-intro-title">

                        Marketing that connects
                        <span>visibility with opportunity.</span>

                    </h2>


                    <p class="fc-services-intro-text">

                        Digital marketing works best when search, content,
                        social media, advertising, analytics, and conversion
                        strategy work together. We create practical digital
                        strategies around your audience, market, and business goals.

                    </p>

                </div>


                <div class="row g-4 fc-capability-row">


                    {{-- SEO --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-search"></i>

                            </div>

                            <span>01</span>

                            <h3>SEO</h3>

                            <p>

                                Improve organic visibility with
                                technically sound and content-focused
                                search strategies.

                            </p>

                        </div>

                    </div>


                    {{-- Content --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-pen-nib"></i>

                            </div>

                            <span>02</span>

                            <h3>Content</h3>

                            <p>

                                Create useful content that supports
                                search visibility, authority, and
                                customer decisions.

                            </p>

                        </div>

                    </div>


                    {{-- Paid Search --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-bullseye"></i>

                            </div>

                            <span>03</span>

                            <h3>Search</h3>

                            <p>

                                Reach high-intent audiences through
                                focused search and paid advertising
                                strategies.

                            </p>

                        </div>

                    </div>


                    {{-- Analytics --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-chart-line"></i>

                            </div>

                            <span>04</span>

                            <h3>Analytics</h3>

                            <p>

                                Measure traffic, engagement, conversions,
                                and campaign performance to improve
                                marketing decisions.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        CORE DIGITAL MARKETING SERVICES
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">

                            <span></span>
                            What We Do

                        </div>


                        <h2 class="fc-services-list-title">

                            Digital marketing services
                            <span>built around your goals.</span>

                        </h2>

                    </div>


                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">

                            Choose the channels and capabilities that
                            matter most to your business. Combine them
                            into one connected growth strategy.

                        </p>

                    </div>

                </div>


                <div class="row g-4">


                    {{-- SEO --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    01
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-search"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Organic Growth
                                </span>


                                <h3>
                                    Search Engine Optimization
                                </h3>


                                <p>

                                    Improve your website's organic visibility
                                    through technical foundations, keyword
                                    strategy, content optimization, internal
                                    linking, and search-focused improvements.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Technical SEO</span>
                                    <span>On-Page SEO</span>
                                    <span>Content</span>
                                    <span>Local SEO</span>

                                </div>

                            </div>


                            <a href="{{ url('seo-company-kolkata') }}" class="fc-service-link">

                                Explore SEO
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- CONTENT --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    02
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-file-alt"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Content Marketing
                                </span>


                                <h3>
                                    Content Strategy & Marketing
                                </h3>


                                <p>

                                    Create useful, relevant content that
                                    supports search visibility, communicates
                                    expertise, answers customer questions,
                                    and moves prospects toward action.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Strategy</span>
                                    <span>Blog Content</span>
                                    <span>Landing Pages</span>
                                    <span>Content SEO</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Discuss Content
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- PPC --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    03
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-bullseye"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Paid Search
                                </span>


                                <h3>
                                    Search & PPC Marketing
                                </h3>


                                <p>

                                    Build focused paid search campaigns
                                    around relevant audiences, search intent,
                                    landing pages, conversion tracking,
                                    and ongoing campaign optimization.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Search Ads</span>
                                    <span>PPC</span>
                                    <span>Campaigns</span>
                                    <span>Conversion</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Discuss PPC
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- SOCIAL --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    04
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-share-alt"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Social Media
                                </span>


                                <h3>
                                    Social Media Marketing
                                </h3>


                                <p>

                                    Build a consistent social presence with
                                    platform-focused content, creative direction,
                                    audience engagement, and campaigns designed
                                    around your business objectives.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Social Strategy</span>
                                    <span>Content</span>
                                    <span>Campaigns</span>
                                    <span>Engagement</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Discuss Social Marketing
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- LOCAL --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    05
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-map-marker-alt"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Local Growth
                                </span>


                                <h3>
                                    Local Digital Marketing
                                </h3>


                                <p>

                                    Strengthen your local digital presence
                                    with location-focused content, business
                                    profile optimization, local search
                                    signals, and relevant customer touchpoints.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Local Search</span>
                                    <span>Kolkata</span>
                                    <span>Visibility</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Discuss Local Growth
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- ANALYTICS --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    06
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-chart-bar"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Measurement
                                </span>


                                <h3>
                                    Analytics & Conversion Tracking
                                </h3>


                                <p>

                                    Understand where visitors come from,
                                    what they do on your website, and which
                                    marketing activities contribute to
                                    meaningful business actions.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Analytics</span>
                                    <span>Events</span>
                                    <span>Conversions</span>
                                    <span>Reporting</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Discuss Analytics
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        HOW MARKETING WORKS
    ========================================================== --}}
        <section class="fc-work-section">

            <div class="container">

                <div class="fc-work-header">

                    <div class="fc-work-eyebrow">

                        <span class="fc-work-eyebrow-line"></span>
                        How We Work

                    </div>


                    <div class="row align-items-end g-4">

                        <div class="col-lg-7">

                            <h2 class="fc-work-title">

                                From visibility to
                                <span>growth.</span>

                            </h2>

                        </div>


                        <div class="col-lg-5">

                            <p class="fc-work-intro">

                                We connect research, strategy, execution,
                                measurement, and continuous improvement
                                instead of treating every marketing channel
                                as a separate activity.

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
                                    Discover
                                </span>


                                <h3>
                                    Understand
                                </h3>


                                <p>

                                    Learn about your market, audience,
                                    competitors, existing visibility,
                                    and business objectives.

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

                                    <i class="fas fa-bullseye"></i>

                                </div>

                            </div>


                            <div class="fc-work-card-content">

                                <span class="fc-work-label">
                                    Strategy
                                </span>


                                <h3>
                                    Prioritize
                                </h3>


                                <p>

                                    Identify the channels, audiences,
                                    content opportunities, and campaigns
                                    that best fit your goals.

                                </p>

                            </div>

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

                                    <i class="fas fa-rocket"></i>

                                </div>

                            </div>


                            <div class="fc-work-card-content">

                                <span class="fc-work-label">
                                    Execute
                                </span>


                                <h3>
                                    Launch
                                </h3>


                                <p>

                                    Put the strategy into action across
                                    search, content, social, campaigns,
                                    and conversion touchpoints.

                                </p>

                            </div>

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
                                    Improve
                                </span>


                                <h3>
                                    Measure
                                </h3>


                                <p>

                                    Review performance, understand
                                    what is working, and continuously
                                    improve the strategy.

                                </p>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        WHAT YOU GET
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">

                            <span></span>
                            What You Get

                        </div>


                        <h2 class="fc-services-list-title">

                            A connected approach to
                            <span>digital growth.</span>

                        </h2>

                    </div>


                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">

                            Marketing activity should connect back to
                            measurable business objectives rather than
                            simply generating more traffic or impressions.

                        </p>

                    </div>

                </div>


                <div class="row g-4">


                    {{-- 01 --}}
                    <div class="col-12 col-md-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    01
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-eye"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Visibility
                                </span>


                                <h3>
                                    Stronger Online Presence
                                </h3>


                                <p>

                                    Improve how your business appears
                                    across search, content, social,
                                    and other relevant digital channels.

                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- 02 --}}
                    <div class="col-12 col-md-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    02
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-users"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Audience
                                </span>


                                <h3>
                                    Better Audience Reach
                                </h3>


                                <p>

                                    Reach people through channels and
                                    messages that align with their
                                    needs, intent, and stage of the
                                    buying journey.

                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- 03 --}}
                    <div class="col-12 col-md-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    03
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-filter"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Conversion
                                </span>


                                <h3>
                                    Better Customer Journeys
                                </h3>


                                <p>

                                    Connect landing pages, content,
                                    campaigns, calls to action, and
                                    analytics into a clearer journey
                                    toward conversion.

                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- 04 --}}
                    <div class="col-12 col-md-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    04
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-chart-pie"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Insights
                                </span>


                                <h3>
                                    Actionable Reporting
                                </h3>


                                <p>

                                    Use meaningful performance data to
                                    understand marketing activity and
                                    identify opportunities for improvement.

                                </p>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        FAQ
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-7">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">

                            <span></span>
                            Frequently Asked Questions

                        </div>


                        <h2 class="fc-services-list-title">

                            Digital marketing
                            <span>questions.</span>

                        </h2>

                    </div>


                    <div class="col-lg-5">

                        <p class="fc-services-list-intro">

                            Some common questions businesses ask before
                            starting a digital marketing engagement.

                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    <div class="col-12">

                        <div class="accordion" id="digitalMarketingFaq">


                            {{-- FAQ 01 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="digitalFaqOne">

                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#digitalCollapseOne" aria-expanded="true"
                                        aria-controls="digitalCollapseOne">

                                        What digital marketing services do you offer?

                                    </button>

                                </h3>


                                <div id="digitalCollapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="digitalFaqOne" data-bs-parent="#digitalMarketingFaq">

                                    <div class="accordion-body">

                                        We can combine SEO, content marketing,
                                        search and PPC campaigns, social media,
                                        local digital marketing, analytics, and
                                        conversion-focused strategy depending on
                                        your business requirements.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 02 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="digitalFaqTwo">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#digitalCollapseTwo" aria-expanded="false"
                                        aria-controls="digitalCollapseTwo">

                                        Is SEO included in digital marketing?

                                    </button>

                                </h3>


                                <div id="digitalCollapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="digitalFaqTwo" data-bs-parent="#digitalMarketingFaq">

                                    <div class="accordion-body">

                                        SEO can be an important part of a broader
                                        digital marketing strategy. For businesses
                                        primarily looking for SEO, we also provide
                                        a dedicated SEO service focused specifically
                                        on organic search visibility.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 03 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="digitalFaqThree">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#digitalCollapseThree" aria-expanded="false"
                                        aria-controls="digitalCollapseThree">

                                        How do you measure digital marketing performance?

                                    </button>

                                </h3>


                                <div id="digitalCollapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="digitalFaqThree" data-bs-parent="#digitalMarketingFaq">

                                    <div class="accordion-body">

                                        Measurement depends on the campaign and
                                        business objectives. We can track relevant
                                        traffic, engagement, enquiries, conversions,
                                        campaign performance, and other agreed
                                        business actions.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 04 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="digitalFaqFour">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#digitalCollapseFour" aria-expanded="false"
                                        aria-controls="digitalCollapseFour">

                                        Can digital marketing help a local business?

                                    </button>

                                </h3>


                                <div id="digitalCollapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="digitalFaqFour" data-bs-parent="#digitalMarketingFaq">

                                    <div class="accordion-body">

                                        Yes. Local businesses can combine local
                                        search visibility, useful content, social
                                        media, paid campaigns, and conversion-focused
                                        landing pages to reach relevant audiences.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 05 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="digitalFaqFive">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#digitalCollapseFive" aria-expanded="false"
                                        aria-controls="digitalCollapseFive">

                                        Do you provide ongoing marketing support?

                                    </button>

                                </h3>


                                <div id="digitalCollapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="digitalFaqFive" data-bs-parent="#digitalMarketingFaq">

                                    <div class="accordion-body">

                                        Yes. Marketing can be structured around
                                        ongoing strategy, content, optimization,
                                        campaign management, reporting, and
                                        continuous improvement.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 06 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="digitalFaqSix">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#digitalCollapseSix" aria-expanded="false"
                                        aria-controls="digitalCollapseSix">

                                        Do you offer customized marketing strategies?

                                    </button>

                                </h3>


                                <div id="digitalCollapseSix" class="accordion-collapse collapse"
                                    aria-labelledby="digitalFaqSix" data-bs-parent="#digitalMarketingFaq">

                                    <div class="accordion-body">

                                        Yes. The right mix of channels depends
                                        on your market, audience, existing digital
                                        presence, objectives, and available
                                        resources.

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        WHY FUSIONCENTRIX
    ========================================================== --}}
        @include('includes.why-choose-us')


        {{-- =========================================================
        CTA
    ========================================================== --}}
        <section class="fc-services-cta">

            <div class="fc-cta-glow"></div>

            <div class="container">

                <div class="fc-services-cta-inner">

                    <div class="fc-section-eyebrow fc-section-eyebrow-light">

                        <span></span>
                        Ready to Grow?
                        <span></span>

                    </div>


                    <h2 class="fc-services-cta-title">

                        Let's turn your digital presence into
                        <span>real opportunity.</span>

                    </h2>


                    <p class="fc-services-cta-text">

                        Tell us about your business, your audience,
                        and where you want to go. We'll help identify
                        the digital marketing opportunities that make
                        sense for you.

                    </p>


                    <div class="fc-services-cta-actions">

                        <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary fc-btn-large">

                            <i class="fas fa-comments me-2"></i>
                            Start a Conversation

                        </a>


                        <a href="{{ url('portfolio') }}" class="fc-btn fc-btn-dark-outline fc-btn-large">

                            View Our Work

                        </a>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        RELATED SERVICES
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="text-center">

                    <div class="fc-section-eyebrow">

                        <span></span>
                        Explore More
                        <span></span>

                    </div>


                    <h2 class="fc-services-intro-title">

                        More ways to
                        <span>move your business forward.</span>

                    </h2>


                    <p class="fc-services-intro-text">

                        Combine marketing with development, e-commerce,
                        software, design, and branding to build a stronger
                        digital ecosystem around your business.

                    </p>

                </div>


                <div class="mt-5">

                    @include('includes.services')

                </div>

            </div>

        </section>

    </main>
@endsection
