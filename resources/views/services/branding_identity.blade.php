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
                            <span></span>Branding &amp; Identity
                        </div>

                        <h1 class="fc-services-title">
                            Brands built to be <span>recognized.</span>
                            <strong>Remembered.</strong>
                        </h1>

                        <p class="fc-services-description">
                            We create distinctive brand identities that help businesses
                            communicate clearly, build trust, and stay consistent across
                            every digital and physical touchpoint.
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
                                <span>BRAND</span>
                            </div>

                            <div class="fc-orbit-card orbit-design">
                                <i class="fas fa-palette"></i>
                                <span>Identity</span>
                            </div>

                            <div class="fc-orbit-card orbit-development">
                                <i class="fas fa-pen-nib"></i>
                                <span>Creative</span>
                            </div>

                            <div class="fc-orbit-card orbit-growth">
                                <i class="fas fa-bullhorn"></i>
                                <span>Voice</span>
                            </div>

                            <div class="fc-orbit-card orbit-intelligence">
                                <i class="fas fa-layer-group"></i>
                                <span>Systems</span>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </section>


        {{-- =========================================================
        CAPABILITIES
    ========================================================== --}}
        <section class="fc-services-intro">

            <div class="container">

                <div class="text-center">

                    <div class="fc-section-eyebrow">
                        <span></span>
                        More Than a Logo
                        <span></span>
                    </div>

                    <h2 class="fc-services-intro-title">
                        A brand system designed to make your business
                        <span>stand apart.</span>
                    </h2>

                    <p class="fc-services-intro-text">
                        Strong branding connects strategy, messaging, visuals, and
                        experience into one recognizable system. We build identities
                        that are distinctive, practical, and ready to grow with your business.
                    </p>

                </div>


                <div class="row g-4 fc-capability-row">

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="fc-capability">

                            <div class="fc-capability-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>

                            <span>01</span>

                            <h3>Strategy</h3>

                            <p>
                                Define your positioning, audience, personality,
                                and the ideas that make your brand meaningful.
                            </p>

                        </div>
                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="fc-capability">

                            <div class="fc-capability-icon">
                                <i class="fas fa-pen-nib"></i>
                            </div>

                            <span>02</span>

                            <h3>Identity</h3>

                            <p>
                                Create a distinctive visual identity that gives
                                your business a clear and recognizable presence.
                            </p>

                        </div>
                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="fc-capability">

                            <div class="fc-capability-icon">
                                <i class="fas fa-comment-dots"></i>
                            </div>

                            <span>03</span>

                            <h3>Voice</h3>

                            <p>
                                Establish a consistent tone and messaging style
                                across websites, campaigns, content, and communications.
                            </p>

                        </div>
                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="fc-capability">

                            <div class="fc-capability-icon">
                                <i class="fas fa-layer-group"></i>
                            </div>

                            <span>04</span>

                            <h3>Consistency</h3>

                            <p>
                                Build practical brand guidelines and reusable
                                systems that keep every touchpoint aligned.
                            </p>

                        </div>
                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        CORE SERVICES
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">
                            <span></span>
                            What We Create
                        </div>

                        <h2 class="fc-services-list-title">
                            Brand experiences built around
                            <span>your business.</span>
                        </h2>

                    </div>

                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">
                            From the first strategic idea to the final visual system,
                            every part of your identity is designed to work together.
                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    {{-- 01 --}}
                    <div class="col-12 col-lg-6">
                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">01</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-compass"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Brand Strategy
                                </span>

                                <h3>Brand Strategy &amp; Positioning</h3>

                                <p>
                                    Build a clear strategic foundation for your brand.
                                    We define positioning, audience, personality,
                                    differentiation, and the core ideas that guide
                                    your communication.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Positioning</span>
                                    <span>Audience</span>
                                    <span>Brand Strategy</span>
                                </div>

                            </div>

                            <a href="{{ url('contact-us') }}" class="fc-service-link">
                                Build Your Strategy
                            </a>

                        </article>
                    </div>


                    {{-- 02 --}}
                    <div class="col-12 col-lg-6">
                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">02</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-palette"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Visual Identity
                                </span>

                                <h3>Logo &amp; Visual Identity Design</h3>

                                <p>
                                    Create a memorable visual language for your business
                                    with thoughtful logo design, color systems, typography,
                                    graphic elements, and supporting visual assets.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Logo Design</span>
                                    <span>Typography</span>
                                    <span>Color Systems</span>
                                </div>

                            </div>

                            <a href="{{ url('contact-us') }}" class="fc-service-link">
                                Create Your Identity
                            </a>

                        </article>
                    </div>


                    {{-- 03 --}}
                    <div class="col-12 col-lg-6">
                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">03</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-comments"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Brand Communication
                                </span>

                                <h3>Brand Voice &amp; Messaging</h3>

                                <p>
                                    Give your brand a clear and consistent voice.
                                    We develop messaging frameworks that help your
                                    business communicate with confidence across channels.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Brand Voice</span>
                                    <span>Messaging</span>
                                    <span>Content Direction</span>
                                </div>

                            </div>

                            <a href="{{ url('contact-us') }}" class="fc-service-link">
                                Define Your Voice
                            </a>

                        </article>
                    </div>


                    {{-- 04 --}}
                    <div class="col-12 col-lg-6">
                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">04</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-book-open"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Brand Guidelines
                                </span>

                                <h3>Brand Guidelines &amp; Systems</h3>

                                <p>
                                    Turn your identity into a practical system your
                                    team can use. We document visual rules, typography,
                                    colors, layouts, messaging, and usage standards.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Guidelines</span>
                                    <span>Templates</span>
                                    <span>Brand Systems</span>
                                </div>

                            </div>

                            <a href="{{ url('contact-us') }}" class="fc-service-link">
                                Build Your Brand System
                            </a>

                        </article>
                    </div>


                    {{-- 05 --}}
                    <div class="col-12 col-lg-6">
                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">05</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-desktop"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Digital Branding
                                </span>

                                <h3>Digital Brand Experience</h3>

                                <p>
                                    Translate your identity into digital experiences
                                    across websites, landing pages, social platforms,
                                    campaigns, and customer-facing products.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Web</span>
                                    <span>Social</span>
                                    <span>Campaigns</span>
                                </div>

                            </div>

                            <a href="{{ url('services.web_app_development') }}" class="fc-service-link">
                                Build Your Digital Experience
                            </a>

                        </article>
                    </div>


                    {{-- 06 --}}
                    <div class="col-12 col-lg-6">
                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">06</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-sync-alt"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Brand Refresh
                                </span>

                                <h3>Rebranding &amp; Brand Refresh</h3>

                                <p>
                                    Evolve an existing brand without losing the
                                    recognition you've already built. We refine
                                    outdated identities and create a stronger,
                                    more relevant brand presence.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Refresh</span>
                                    <span>Rebranding</span>
                                    <span>Evolution</span>
                                </div>

                            </div>

                            <a href="{{ url('contact-us') }}" class="fc-service-link">
                                Refresh Your Brand
                            </a>

                        </article>
                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        BRAND APPLICATIONS
    ========================================================== --}}
        <section class="fc-work-section">

            <div class="container">

                <div class="fc-work-header">

                    <div class="fc-work-eyebrow">
                        <span class="fc-work-eyebrow-line"></span>
                        Where Your Brand Lives
                    </div>

                    <div class="row align-items-end g-4">

                        <div class="col-lg-7">

                            <h2 class="fc-work-title">
                                One identity.
                                <span>Every touchpoint.</span>
                            </h2>

                        </div>

                        <div class="col-lg-5">

                            <p class="fc-work-intro">
                                A strong identity should work everywhere your audience
                                encounters your business, from your website and social
                                presence to presentations, campaigns, and print.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="row g-4 fc-work-process">

                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="fc-work-card fc-work-card-featured">

                            <div class="fc-work-card-top">

                                <span class="fc-work-number">01</span>

                                <div class="fc-work-icon">
                                    <i class="fas fa-globe"></i>
                                </div>

                            </div>

                            <div class="fc-work-card-content">

                                <span class="fc-work-label">Digital</span>

                                <h3>Websites</h3>

                                <p>
                                    A consistent visual and messaging system
                                    across your digital presence.
                                </p>

                            </div>

                            <span class="fc-work-card-accent"></span>

                        </article>
                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="fc-work-card">

                            <div class="fc-work-card-top">

                                <span class="fc-work-number">02</span>

                                <div class="fc-work-icon">
                                    <i class="fas fa-share-alt"></i>
                                </div>

                            </div>

                            <div class="fc-work-card-content">

                                <span class="fc-work-label">Social</span>

                                <h3>Social Media</h3>

                                <p>
                                    Recognizable templates and visual direction
                                    for consistent social communication.
                                </p>

                            </div>

                            <span class="fc-work-card-accent"></span>

                        </article>
                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="fc-work-card">

                            <div class="fc-work-card-top">

                                <span class="fc-work-number">03</span>

                                <div class="fc-work-icon">
                                    <i class="fas fa-bullhorn"></i>
                                </div>

                            </div>

                            <div class="fc-work-card-content">

                                <span class="fc-work-label">Marketing</span>

                                <h3>Campaigns</h3>

                                <p>
                                    Brand-led creative assets designed to support
                                    campaigns and business growth.
                                </p>

                            </div>

                            <span class="fc-work-card-accent"></span>

                        </article>
                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="fc-work-card">

                            <div class="fc-work-card-top">

                                <span class="fc-work-number">04</span>

                                <div class="fc-work-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>

                            </div>

                            <div class="fc-work-card-content">

                                <span class="fc-work-label">Business</span>

                                <h3>Brand Materials</h3>

                                <p>
                                    Presentations, documents, stationery, and
                                    other branded business assets.
                                </p>

                            </div>

                            <span class="fc-work-card-accent"></span>

                        </article>
                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        BENEFITS
    ========================================================== --}}
        <section class="fc-services-intro">

            <div class="container">

                <div class="text-center">

                    <div class="fc-section-eyebrow">
                        <span></span>
                        Why Strong Branding Matters
                        <span></span>
                    </div>

                    <h2 class="fc-services-intro-title">
                        Make every interaction feel
                        <span>like your brand.</span>
                    </h2>

                    <p class="fc-services-intro-text">
                        A thoughtful brand gives your business a consistent foundation
                        for communicating, marketing, and creating memorable customer
                        experiences.
                    </p>

                </div>


                <div class="row g-4 fc-capability-row">

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="fc-capability">

                            <div class="fc-capability-icon">
                                <i class="fas fa-fingerprint"></i>
                            </div>

                            <span>01</span>

                            <h3>Distinctive Identity</h3>

                            <p>
                                Create a visual presence that separates your
                                business from competitors.
                            </p>

                        </div>
                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="fc-capability">

                            <div class="fc-capability-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>

                            <span>02</span>

                            <h3>Stronger Trust</h3>

                            <p>
                                Consistent branding helps create a more professional
                                and credible customer experience.
                            </p>

                        </div>
                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="fc-capability">

                            <div class="fc-capability-icon">
                                <i class="fas fa-expand-arrows-alt"></i>
                            </div>

                            <span>03</span>

                            <h3>Ready to Scale</h3>

                            <p>
                                Build a flexible system that can grow across
                                new channels, products, and markets.
                            </p>

                        </div>
                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="fc-capability">

                            <div class="fc-capability-icon">
                                <i class="fas fa-users"></i>
                            </div>

                            <span>04</span>

                            <h3>Team Alignment</h3>

                            <p>
                                Give everyone clear guidelines for presenting
                                your brand consistently.
                            </p>

                        </div>
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

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">
                            <span></span>
                            Frequently Asked Questions
                        </div>

                        <h2 class="fc-services-list-title">
                            Questions about
                            <span>branding &amp; identity.</span>
                        </h2>

                    </div>

                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">
                            A few common questions businesses ask before starting
                            a branding or rebranding project.
                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Brand Strategy
                                </span>

                                <h3>
                                    Do I need a complete rebrand or just a brand refresh?
                                </h3>

                                <p>
                                    It depends on how much your current identity still
                                    reflects your business. A refresh can improve an
                                    established brand, while a rebrand may be better
                                    when the positioning, audience, or business direction
                                    has changed significantly.
                                </p>

                            </div>

                        </article>

                    </div>


                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Visual Identity
                                </span>

                                <h3>
                                    What is included in a visual identity?
                                </h3>

                                <p>
                                    Depending on the project, this can include logo design,
                                    typography, colors, graphic elements, imagery direction,
                                    layouts, and practical brand assets.
                                </p>

                            </div>

                        </article>

                    </div>


                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Brand Guidelines
                                </span>

                                <h3>
                                    Do you provide brand guidelines?
                                </h3>

                                <p>
                                    Yes. We can create practical guidelines that document
                                    how your visual identity and communication should be
                                    used across different channels.
                                </p>

                            </div>

                        </article>

                    </div>


                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Digital Branding
                                </span>

                                <h3>
                                    Can you apply the new identity to our website?
                                </h3>

                                <p>
                                    Yes. Branding can be carried through into website
                                    design and development so the digital experience
                                    reflects the new identity consistently.
                                </p>

                            </div>

                        </article>

                    </div>


                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Existing Brands
                                </span>

                                <h3>
                                    Can you work with an existing logo or identity?
                                </h3>

                                <p>
                                    Yes. We can work with an existing identity when a
                                    complete redesign is unnecessary and focus instead
                                    on improving consistency, messaging, or digital application.
                                </p>

                            </div>

                        </article>

                    </div>


                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Project Scope
                                </span>

                                <h3>
                                    How long does a branding project take?
                                </h3>

                                <p>
                                    The timeline depends on the scope, number of brand
                                    elements, research requirements, and review cycles.
                                    We define the deliverables and milestones before work begins.
                                </p>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        CTA
    ========================================================== --}}
        <section class="fc-services-cta">

            <div class="fc-cta-glow"></div>

            <div class="container">

                <div class="fc-services-cta-inner">

                    <div class="fc-section-eyebrow fc-section-eyebrow-light">
                        <span></span>
                        Build a Brand People Remember
                        <span></span>
                    </div>

                    <h2 class="fc-services-cta-title">
                        Ready to give your business
                        <span>a stronger identity?</span>
                    </h2>

                    <p class="fc-services-cta-text">
                        Tell us where your brand is today, where you want it to go,
                        and what you need to create a stronger presence.
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


        {{-- =========================================================
        RELATED SERVICES
    ========================================================== --}}
        @include('includes.services')

    </main>
@endsection
