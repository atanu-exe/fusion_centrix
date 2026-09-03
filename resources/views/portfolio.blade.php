@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/v2/portfolio.css') }}">

    {{-- ============================================================
     FUSIONCENTRIX V2 — PORTFOLIO PAGE
     ============================================================ --}}

    <main id="main-content" class="fc-portfolio-page">


        {{-- ========================================================
         01. PORTFOLIO HERO
         ======================================================== --}}

        <section class="fc-portfolio-hero" aria-labelledby="portfolio-hero-title">

            <div class="fc-portfolio-hero-glow"></div>

            <div class="container">

                <div class="fc-portfolio-hero-content">

                    <span class="fc-eyebrow">
                        Our Work
                    </span>

                    <h1 id="portfolio-hero-title" class="fc-portfolio-hero-title">

                        Work that
                        <span>speaks for itself.</span>

                    </h1>

                    <p class="fc-portfolio-hero-description">

                        Explore websites, applications, digital products,
                        and brand experiences we've built to help businesses
                        solve problems and move forward.

                    </p>

                </div>

            </div>

        </section>



        {{-- ========================================================
         02. FEATURED WORK
         ======================================================== --}}

        <section class="fc-portfolio-featured fc-section" aria-labelledby="featured-work-title">

            <div class="container">

                <div class="fc-portfolio-section-header">

                    <div>

                        <span class="fc-eyebrow">
                            Featured Work
                        </span>

                        <h2 id="featured-work-title" class="fc-section-title">

                            Selected projects.
                            <span class="fc-gradient-text">
                                Real solutions.
                            </span>

                        </h2>

                    </div>

                    <p>

                        A selection of projects where strategy,
                        design, technology, and execution came together.

                    </p>

                </div>


                <div class="fc-portfolio-featured-grid">


                    {{-- Featured Project 01 --}}
                    <article class="fc-portfolio-featured-card">

                        <a href="#" class="fc-portfolio-project-image" aria-label="View project">

                            <img src="{{ asset('assets/images/portfolio/project-1.webp') }}"
                                alt="Project name website and digital experience" loading="lazy">

                            <span class="fc-portfolio-view">
                                View Project
                            </span>

                        </a>


                        <div class="fc-portfolio-project-info">

                            <div>

                                <span class="fc-portfolio-category">
                                    Web Development
                                </span>

                                <h3>
                                    Project Name
                                </h3>

                                <p>
                                    A high-performance digital experience
                                    designed around the client's business goals.
                                </p>

                            </div>

                            <span class="fc-portfolio-project-year">
                                2026
                            </span>

                        </div>

                    </article>


                    {{-- Featured Project 02 --}}
                    <article class="fc-portfolio-featured-card">

                        <a href="#" class="fc-portfolio-project-image" aria-label="View project">

                            <img src="{{ asset('assets/images/portfolio/project-2.webp') }}"
                                alt="Project name application interface" loading="lazy">

                            <span class="fc-portfolio-view">
                                View Project
                            </span>

                        </a>


                        <div class="fc-portfolio-project-info">

                            <div>

                                <span class="fc-portfolio-category">
                                    Application
                                </span>

                                <h3>
                                    Project Name
                                </h3>

                                <p>
                                    A purpose-built application focused
                                    on usability, performance, and scale.
                                </p>

                            </div>

                            <span class="fc-portfolio-project-year">
                                2026
                            </span>

                        </div>

                    </article>

                </div>

            </div>

        </section>



        {{-- ========================================================
         03. ALL PROJECTS
         ======================================================== --}}

        <section class="fc-portfolio-all fc-section-soft fc-section" aria-labelledby="all-projects-title">

            <div class="container">

                <div class="fc-portfolio-all-header">

                    <div>

                        <span class="fc-eyebrow">
                            More Work
                        </span>

                        <h2 id="all-projects-title" class="fc-section-title">

                            Explore our
                            <span class="fc-gradient-text">
                                projects.
                            </span>

                        </h2>

                    </div>


                    {{-- Filters --}}
                    <div class="fc-portfolio-filters" role="group" aria-label="Filter portfolio projects">

                        <button type="button" class="fc-portfolio-filter is-active" data-filter="all">

                            All

                        </button>

                        <button type="button" class="fc-portfolio-filter" data-filter="web">

                            Websites

                        </button>

                        <button type="button" class="fc-portfolio-filter" data-filter="ecommerce">

                            E-Commerce

                        </button>

                        <button type="button" class="fc-portfolio-filter" data-filter="app">

                            Applications

                        </button>

                        <button type="button" class="fc-portfolio-filter" data-filter="software">

                            Software

                        </button>

                        <button type="button" class="fc-portfolio-filter" data-filter="branding">

                            Branding

                        </button>

                    </div>

                </div>


                {{-- Projects --}}
                <div class="fc-portfolio-grid">


                    {{-- Project --}}
                    <article class="fc-portfolio-card" data-category="web">

                        <a href="#" class="fc-portfolio-card-image">

                            <img src="{{ asset('assets/images/portfolio/project-3.webp') }}" alt="Project website"
                                loading="lazy">

                        </a>

                        <div class="fc-portfolio-card-content">

                            <span>
                                Website
                            </span>

                            <h3>
                                Project Name
                            </h3>

                            <p>
                                Digital experience
                            </p>

                        </div>

                    </article>


                    {{-- Project --}}
                    <article class="fc-portfolio-card" data-category="ecommerce">

                        <a href="#" class="fc-portfolio-card-image">

                            <img src="{{ asset('assets/images/portfolio/project-4.webp') }}" alt="E-commerce project"
                                loading="lazy">

                        </a>

                        <div class="fc-portfolio-card-content">

                            <span>
                                E-Commerce
                            </span>

                            <h3>
                                Project Name
                            </h3>

                            <p>
                                Online commerce experience
                            </p>

                        </div>

                    </article>


                    {{-- Project --}}
                    <article class="fc-portfolio-card" data-category="app">

                        <a href="#" class="fc-portfolio-card-image">

                            <img src="{{ asset('assets/images/portfolio/project-5.webp') }}" alt="Application project"
                                loading="lazy">

                        </a>

                        <div class="fc-portfolio-card-content">

                            <span>
                                Application
                            </span>

                            <h3>
                                Project Name
                            </h3>

                            <p>
                                Custom digital application
                            </p>

                        </div>

                    </article>


                    {{-- Project --}}
                    <article class="fc-portfolio-card" data-category="software">

                        <a href="#" class="fc-portfolio-card-image">

                            <img src="{{ asset('assets/images/portfolio/project-6.webp') }}" alt="Custom software project"
                                loading="lazy">

                        </a>

                        <div class="fc-portfolio-card-content">

                            <span>
                                Custom Software
                            </span>

                            <h3>
                                Project Name
                            </h3>

                            <p>
                                Business software solution
                            </p>

                        </div>

                    </article>


                    {{-- Project --}}
                    <article class="fc-portfolio-card" data-category="branding">

                        <a href="#" class="fc-portfolio-card-image">

                            <img src="{{ asset('assets/images/portfolio/project-7.webp') }}" alt="Brand identity project"
                                loading="lazy">

                        </a>

                        <div class="fc-portfolio-card-content">

                            <span>
                                Branding
                            </span>

                            <h3>
                                Project Name
                            </h3>

                            <p>
                                Brand identity system
                            </p>

                        </div>

                    </article>


                    {{-- Project --}}
                    <article class="fc-portfolio-card" data-category="web">

                        <a href="#" class="fc-portfolio-card-image">

                            <img src="{{ asset('assets/images/portfolio/project-8.webp') }}" alt="Website project"
                                loading="lazy">

                        </a>

                        <div class="fc-portfolio-card-content">

                            <span>
                                Website
                            </span>

                            <h3>
                                Project Name
                            </h3>

                            <p>
                                Business website
                            </p>

                        </div>

                    </article>

                </div>

            </div>

        </section>



        {{-- ========================================================
         04. CAPABILITIES
         ======================================================== --}}

        <section class="fc-portfolio-capabilities fc-section" aria-labelledby="portfolio-capabilities-title">

            <div class="container">

                <div class="fc-portfolio-capabilities-inner">

                    <div>

                        <span class="fc-eyebrow">
                            What We Bring
                        </span>

                        <h2 id="portfolio-capabilities-title" class="fc-section-title">

                            More than
                            <span class="fc-gradient-text">
                                just development.
                            </span>

                        </h2>

                    </div>


                    <div class="fc-portfolio-capability-list">

                        <div>
                            <strong>Strategy</strong>
                            <span>01</span>
                        </div>

                        <div>
                            <strong>UX &amp; Design</strong>
                            <span>02</span>
                        </div>

                        <div>
                            <strong>Development</strong>
                            <span>03</span>
                        </div>

                        <div>
                            <strong>SEO &amp; Growth</strong>
                            <span>04</span>
                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================
         05. CTA
         ======================================================== --}}

        <section class="fc-portfolio-cta" aria-labelledby="portfolio-cta-title">

            <div class="fc-portfolio-cta-glow"></div>

            <div class="container">

                <div class="fc-portfolio-cta-inner">

                    <span class="fc-portfolio-cta-eyebrow">
                        Have a project in mind?
                    </span>

                    <h2 id="portfolio-cta-title" class="fc-portfolio-cta-title">

                        Let's create your
                        <span>
                            next success story.
                        </span>

                    </h2>

                    <p>

                        Tell us what you're building and
                        let's explore what's possible.

                    </p>

                    <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary">

                        Start a Conversation

                    </a>

                </div>

            </div>

        </section>


    </main>
@endsection
