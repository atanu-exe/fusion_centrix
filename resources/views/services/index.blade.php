 @extends('layouts.app')



 @section('content')
     <link rel="stylesheet" href="{{ asset('assets/css/v2/services.css') }}">

{{-- ============================================================
     FUSIONCENTRIX V2
     SERVICES PAGE
     ============================================================ --}}

<main>

    {{-- ========================================================
         01 — SERVICES HERO
         ======================================================== --}}

    <section class="fc-services-hero">

        <div class="fc-hero-grid"></div>

        <div class="container">

            <div class="row align-items-center g-5">

                {{-- Hero Content --}}
                <div class="col-lg-6">

                    <div class="fc-services-eyebrow">
                        <span></span>
                        Our Services
                    </div>

                    <h1 class="fc-services-title">

                        Digital
                        <span>solutions</span>

                        built for
                        <strong>growth.</strong>

                    </h1>

                    <p class="fc-services-description">

                        From strategy and design to development,
                        digital marketing, and automation, we bring
                        the expertise and technology your business
                        needs to move forward.

                    </p>

                    <div class="fc-services-actions">

                        <a href="{{ url('contact-us') }}"
                           class="fc-btn fc-btn-primary">

                            Start a Conversation

                        </a>

                        <a href="{{ url('portfolio') }}"
                           class="fc-btn fc-btn-dark-outline">

                            Explore Our Work

                        </a>

                    </div>

                </div>


                {{-- Hero Visual --}}
                <div class="col-lg-6">

                    <div class="fc-services-orbit"
                         aria-hidden="true">

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
                            <span>DIGITAL</span>

                        </div>


                        <div class="fc-orbit-card orbit-design">

                            <i class="fas fa-pen-nib"></i>
                            <span>Design</span>

                        </div>


                        <div class="fc-orbit-card orbit-development">

                            <i class="fas fa-code"></i>
                            <span>Development</span>

                        </div>


                        <div class="fc-orbit-card orbit-growth">

                            <i class="fas fa-chart-line"></i>
                            <span>Growth</span>

                        </div>


                        <div class="fc-orbit-card orbit-intelligence">

                            <i class="fas fa-microchip"></i>
                            <span>Intelligence</span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================
         02 — SERVICE PHILOSOPHY
         ======================================================== --}}

    <section class="fc-services-intro">

        <div class="container">

            <div class="text-center">

                <div class="fc-section-eyebrow">

                    <span></span>
                    Everything Works Together
                    <span></span>

                </div>

                <h2 class="fc-services-intro-title">

                    Everything digital.
                    <span>One partner.</span>

                </h2>

                <p class="fc-services-intro-text">

                    Your website, brand, technology, visibility,
                    and growth should not operate in isolation.
                    We connect the pieces into one digital ecosystem.

                </p>

            </div>


            <div class="row g-4 fc-capability-row">

                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="fc-capability">

                        <div class="fc-capability-icon">
                            <i class="fas fa-pen-nib"></i>
                        </div>

                        <span>01</span>

                        <h3>Design</h3>

                        <p>
                            Create experiences people remember.
                        </p>

                    </div>

                </div>


                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="fc-capability">

                        <div class="fc-capability-icon">
                            <i class="fas fa-code"></i>
                        </div>

                        <span>02</span>

                        <h3>Technology</h3>

                        <p>
                            Build digital products that perform.
                        </p>

                    </div>

                </div>


                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="fc-capability">

                        <div class="fc-capability-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>

                        <span>03</span>

                        <h3>Growth</h3>

                        <p>
                            Turn visibility into opportunity.
                        </p>

                    </div>

                </div>


                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="fc-capability">

                        <div class="fc-capability-icon">
                            <i class="fas fa-microchip"></i>
                        </div>

                        <span>04</span>

                        <h3>Intelligence</h3>

                        <p>
                            Make operations smarter.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================
         03 — SERVICES
         ======================================================== --}}

    <section class="fc-services-list">

        <div class="container">

            <div class="row align-items-end g-4 fc-services-list-header">

                <div class="col-lg-8">

                    <div class="fc-section-eyebrow fc-section-eyebrow-left">

                        <span></span>
                        What We Do

                    </div>

                    <h2 class="fc-services-list-title">

                        Solutions designed around
                        <span>your business.</span>

                    </h2>

                </div>

                <div class="col-lg-4">

                    <p class="fc-services-list-intro">

                        Choose the capabilities you need today.
                        Combine them when your project needs more.

                    </p>

                </div>

            </div>


            <div class="row g-4">


                {{-- WEB DEVELOPMENT --}}
                <div class="col-12 col-lg-6">

                    <article class="fc-service-card fc-service-card-dark">

                        <div class="fc-service-card-top">

                            <span class="fc-service-number">
                                01
                            </span>

                            <div class="fc-service-icon">
                                <i class="fas fa-code"></i>
                            </div>

                        </div>

                        <div class="fc-service-card-content">

                            <span class="fc-service-category">
                                Technology
                            </span>

                            <h3>
                                Web &amp; App Development
                            </h3>

                            <p>
                                High-performance websites, web applications,
                                mobile apps, and custom digital platforms built
                                around your business.
                            </p>

                            <div class="fc-service-tags">

                                <span>Websites</span>
                                <span>Web Apps</span>
                                <span>Mobile</span>

                            </div>

                        </div>

                        <a href="{{ route('services.web_app_development') }}"
                           class="fc-service-link">

                            Explore Development

                        </a>

                    </article>

                </div>


                {{-- ECOMMERCE --}}
                <div class="col-12 col-lg-6">

                    <article class="fc-service-card">

                        <div class="fc-service-card-top">

                            <span class="fc-service-number">
                                02
                            </span>

                            <div class="fc-service-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>

                        </div>

                        <div class="fc-service-card-content">

                            <span class="fc-service-category">
                                Commerce
                            </span>

                            <h3>
                                E-Commerce Solutions
                            </h3>

                            <p>
                                Conversion-focused online stores designed
                                to deliver better customer experiences and
                                support sustainable growth.
                            </p>

                            <div class="fc-service-tags">

                                <span>Stores</span>
                                <span>Payments</span>
                                <span>Integration</span>

                            </div>

                        </div>

                        <a href="{{ route('services.e_commerce') }}"
                           class="fc-service-link">

                            Explore E-Commerce

                        </a>

                    </article>

                </div>


                {{-- DIGITAL MARKETING --}}
                <div class="col-12 col-lg-6">

                    <article class="fc-service-card">

                        <div class="fc-service-card-top">

                            <span class="fc-service-number">
                                03
                            </span>

                            <div class="fc-service-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>

                        </div>

                        <div class="fc-service-card-content">

                            <span class="fc-service-category">
                                Growth
                            </span>

                            <h3>
                                Digital Marketing
                            </h3>

                            <p>
                                SEO, content, search, and digital strategies
                                designed to increase visibility and generate
                                meaningful business opportunities.
                            </p>

                            <div class="fc-service-tags">

                                <span>SEO</span>
                                <span>Content</span>
                                <span>Strategy</span>

                            </div>

                        </div>

                        <a href="{{ route('services.digital_marketing') }}"
                           class="fc-service-link">

                            Explore Marketing

                        </a>

                    </article>

                </div>


                {{-- CUSTOM SOFTWARE --}}
                <div class="col-12 col-lg-6">

                    <article class="fc-service-card">

                        <div class="fc-service-card-top">

                            <span class="fc-service-number">
                                04
                            </span>

                            <div class="fc-service-icon">
                                <i class="fas fa-layer-group"></i>
                            </div>

                        </div>

                        <div class="fc-service-card-content">

                            <span class="fc-service-category">
                                Technology
                            </span>

                            <h3>
                                Custom Software
                            </h3>

                            <p>
                                Purpose-built software solutions designed
                                around your workflows, teams, data, and
                                operational requirements.
                            </p>

                            <div class="fc-service-tags">

                                <span>Platforms</span>
                                <span>Systems</span>
                                <span>Integrations</span>

                            </div>

                        </div>

                        <a href="{{ route('services.custom_software') }}"
                           class="fc-service-link">

                            Explore Software

                        </a>

                    </article>

                </div>


                {{-- UI UX --}}
                <div class="col-12 col-lg-6">

                    <article class="fc-service-card">

                        <div class="fc-service-card-top">

                            <span class="fc-service-number">
                                05
                            </span>

                            <div class="fc-service-icon">
                                <i class="fas fa-pen-nib"></i>
                            </div>

                        </div>

                        <div class="fc-service-card-content">

                            <span class="fc-service-category">
                                Design
                            </span>

                            <h3>
                                UI/UX Design
                            </h3>

                            <p>
                                Clear, intuitive, and conversion-focused
                                interfaces that make digital products
                                easier and more enjoyable to use.
                            </p>

                            <div class="fc-service-tags">

                                <span>UX</span>
                                <span>UI</span>
                                <span>Prototyping</span>

                            </div>

                        </div>

                        <a href="{{ route('services.ui_ux_design') }}"
                           class="fc-service-link">

                            Explore Design

                        </a>

                    </article>

                </div>


                {{-- BRANDING --}}
                <div class="col-12 col-lg-6">

                    <article class="fc-service-card">

                        <div class="fc-service-card-top">

                            <span class="fc-service-number">
                                06
                            </span>

                            <div class="fc-service-icon">
                                <i class="fas fa-shapes"></i>
                            </div>

                        </div>

                        <div class="fc-service-card-content">

                            <span class="fc-service-category">
                                Brand
                            </span>

                            <h3>
                                Branding &amp; Identity
                            </h3>

                            <p>
                                Strong visual identities that communicate
                                who you are, what you stand for, and why
                                customers should remember you.
                            </p>

                            <div class="fc-service-tags">

                                <span>Identity</span>
                                <span>Branding</span>
                                <span>Visuals</span>

                            </div>

                        </div>

                        <a href="{{ route('services.branding_identity') }}"
                           class="fc-service-link">

                            Explore Branding

                        </a>

                    </article>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================
         04 — PROCESS
         ======================================================== --}}

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

                            From idea to
                            <span>impact.</span>

                        </h2>

                    </div>

                    <div class="col-lg-5">

                        <p class="fc-work-intro">

                            A straightforward process designed to keep
                            projects focused, collaborative, and moving
                            in the right direction.

                        </p>

                    </div>

                </div>

            </div>


            <div class="row g-4 fc-work-process">


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
                                We learn about your business, audience,
                                goals, challenges, and opportunities.
                            </p>

                        </div>

                        <span class="fc-work-card-accent"></span>

                    </article>

                </div>


                <div class="col-12 col-sm-6 col-xl-3">

                    <article class="fc-work-card">

                        <div class="fc-work-card-top">

                            <span class="fc-work-number">
                                02
                            </span>

                            <div class="fc-work-icon">
                                <i class="fas fa-compass"></i>
                            </div>

                        </div>

                        <div class="fc-work-card-content">

                            <span class="fc-work-label">
                                Plan
                            </span>

                            <h3>
                                Define the Direction
                            </h3>

                            <p>
                                We define the right strategy, technology,
                                scope, and priorities for your project.
                            </p>

                        </div>

                        <span class="fc-work-card-accent"></span>

                    </article>

                </div>


                <div class="col-12 col-sm-6 col-xl-3">

                    <article class="fc-work-card">

                        <div class="fc-work-card-top">

                            <span class="fc-work-number">
                                03
                            </span>

                            <div class="fc-work-icon">
                                <i class="fas fa-layer-group"></i>
                            </div>

                        </div>

                        <div class="fc-work-card-content">

                            <span class="fc-work-label">
                                Build
                            </span>

                            <h3>
                                Create &amp; Refine
                            </h3>

                            <p>
                                We design, develop, test, and refine
                                while keeping you involved throughout.
                            </p>

                        </div>

                        <span class="fc-work-card-accent"></span>

                    </article>

                </div>


                <div class="col-12 col-sm-6 col-xl-3">

                    <article class="fc-work-card">

                        <div class="fc-work-card-top">

                            <span class="fc-work-number">
                                04
                            </span>

                            <div class="fc-work-icon">
                                <i class="fas fa-rocket"></i>
                            </div>

                        </div>

                        <div class="fc-work-card-content">

                            <span class="fc-work-label">
                                Grow
                            </span>

                            <h3>
                                Launch &amp; Improve
                            </h3>

                            <p>
                                We launch, measure, optimize, and continue
                                improving as your business grows.
                            </p>

                        </div>

                        <span class="fc-work-card-accent"></span>

                    </article>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================
         05 — CTA
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

                    Let's build something
                    <span>that moves forward.</span>

                </h2>


                <p class="fc-services-cta-text">

                    Tell us what you're building, where you want
                    to go, and what you need to get there.

                </p>


                <div class="fc-services-cta-actions">

                    <a href="{{ url('contact-us') }}"
                       class="fc-btn fc-btn-primary fc-btn-large">

                        Start a Conversation

                    </a>

                    <a href="{{ url('portfolio') }}"
                       class="fc-btn fc-btn-dark-outline fc-btn-large">

                        View Our Work

                    </a>

                </div>

            </div>

        </div>

    </section>

</main>
 @endsection
