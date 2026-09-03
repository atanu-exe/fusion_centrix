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
                            UI/UX Design

                        </div>


                        <h1 class="fc-services-title">

                            Digital experiences
                            <span>designed</span> for
                            <strong>people.</strong>

                        </h1>


                        <p class="fc-services-description">

                            Create intuitive digital products with
                            <strong>user-focused UX strategy, thoughtful
                                interface design, responsive experiences, and
                                scalable design systems</strong> that make complex
                            products easier to understand and use.

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
                                <span>DESIGN</span>

                            </div>


                            <div class="fc-orbit-card orbit-design">

                                <i class="fas fa-users"></i>
                                <span>Research</span>

                            </div>


                            <div class="fc-orbit-card orbit-development">

                                <i class="fas fa-pencil-ruler"></i>
                                <span>Interface</span>

                            </div>


                            <div class="fc-orbit-card orbit-growth">

                                <i class="fas fa-mobile-alt"></i>
                                <span>Responsive</span>

                            </div>


                            <div class="fc-orbit-card orbit-intelligence">

                                <i class="fas fa-sitemap"></i>
                                <span>Systems</span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        DESIGN FOUNDATION
    ========================================================== --}}
        <section class="fc-services-intro">

            <div class="container">

                <div class="text-center">

                    <div class="fc-section-eyebrow">

                        <span></span>
                        User Experience
                        <span></span>

                    </div>


                    <h2 class="fc-services-intro-title">

                        Design that connects
                        <span>users and business goals.</span>

                    </h2>


                    <p class="fc-services-intro-text">

                        Good UI/UX is more than making an interface look
                        polished. We focus on understanding users, simplifying
                        journeys, organizing information, and creating
                        interfaces that are clear, accessible, and useful.

                    </p>

                </div>


                <div class="row g-4 fc-capability-row">


                    {{-- 01 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-users"></i>

                            </div>

                            <span>01</span>

                            <h3>User Research</h3>

                            <p>

                                Understand users, their goals,
                                expectations, pain points, and
                                interactions with your product.

                            </p>

                        </div>

                    </div>


                    {{-- 02 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-route"></i>

                            </div>

                            <span>02</span>

                            <h3>UX Strategy</h3>

                            <p>

                                Map user journeys and information
                                architecture to create clearer
                                product experiences.

                            </p>

                        </div>

                    </div>


                    {{-- 03 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-pencil-ruler"></i>

                            </div>

                            <span>03</span>

                            <h3>UI Design</h3>

                            <p>

                                Create polished interfaces with
                                consistent layouts, typography,
                                components, and visual hierarchy.

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

                            <h3>Responsive Design</h3>

                            <p>

                                Design experiences that remain
                                intuitive and usable across
                                desktops, tablets, and mobile devices.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        CORE UI/UX SERVICES
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

                            UI/UX design services
                            <span>for modern digital products.</span>

                        </h2>

                    </div>


                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">

                            From early product concepts to polished
                            interfaces and reusable systems, we design
                            experiences around the people using them.

                        </p>

                    </div>

                </div>


                <div class="row g-4">


                    {{-- UX Research --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    01
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-users"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    User Experience
                                </span>


                                <h3>
                                    UX Research & Discovery
                                </h3>


                                <p>

                                    Understand your users, product goals,
                                    existing workflows, and usability
                                    challenges before defining the
                                    experience.

                                </p>


                                <div class="fc-service-tags">

                                    <span>User Research</span>
                                    <span>Personas</span>
                                    <span>Interviews</span>
                                    <span>Usability</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Discuss UX Research
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- UX Strategy --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    02
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-route"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    UX Strategy
                                </span>


                                <h3>
                                    User Flows & Information Architecture
                                </h3>


                                <p>

                                    Organize information and map user journeys
                                    so people can understand your product and
                                    complete important tasks with less friction.

                                </p>


                                <div class="fc-service-tags">

                                    <span>User Flows</span>
                                    <span>IA</span>
                                    <span>Wireframes</span>
                                    <span>Journeys</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Plan Your Experience
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- UI Design --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    03
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-pencil-ruler"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Interface Design
                                </span>


                                <h3>
                                    UI Design
                                </h3>


                                <p>

                                    Design clear and visually consistent
                                    interfaces with thoughtful hierarchy,
                                    typography, spacing, components,
                                    and interaction patterns.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Web UI</span>
                                    <span>App UI</span>
                                    <span>Visual Design</span>
                                    <span>Prototypes</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Start Your UI Design
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- Web Design --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    04
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-desktop"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Digital Experiences
                                </span>


                                <h3>
                                    Website & Web App Design
                                </h3>


                                <p>

                                    Design modern websites and web applications
                                    that balance brand presentation, usability,
                                    performance considerations, and clear
                                    conversion paths.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Websites</span>
                                    <span>Web Apps</span>
                                    <span>Landing Pages</span>
                                    <span>UX</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Design Your Website
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- Mobile --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    05
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-mobile-alt"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Mobile Experience
                                </span>


                                <h3>
                                    Mobile App UI/UX Design
                                </h3>


                                <p>

                                    Create mobile experiences with intuitive
                                    navigation, touch-friendly interactions,
                                    readable layouts, and flows designed
                                    around real user tasks.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Mobile UI</span>
                                    <span>iOS</span>
                                    <span>Android</span>
                                    <span>Prototype</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Design Your App
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- Design System --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

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
                                    Design Systems
                                </span>


                                <h3>
                                    Design Systems & Components
                                </h3>


                                <p>

                                    Create reusable design components,
                                    patterns, and guidelines that keep
                                    products consistent while making
                                    future design and development easier.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Components</span>
                                    <span>Design Tokens</span>
                                    <span>Guidelines</span>
                                    <span>Systems</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Build Your Design System
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        DESIGN FOR DIFFERENT PRODUCTS
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">

                            <span></span>
                            Product Design

                        </div>


                        <h2 class="fc-services-list-title">

                            Design experiences for
                            <span>every digital touchpoint.</span>

                        </h2>

                    </div>


                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">

                            Different products require different
                            experiences. We adapt the design process
                            around the platform, audience, and complexity
                            of your product.

                        </p>

                    </div>

                </div>


                <div class="row g-4">


                    {{-- Website --}}
                    <div class="col-12 col-md-6 col-xl-4">

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
                                    Websites
                                </span>


                                <h3>
                                    Business Websites
                                </h3>


                                <p>

                                    Clear, responsive websites that
                                    communicate your brand and guide
                                    visitors toward meaningful actions.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Corporate</span>
                                    <span>Marketing</span>
                                    <span>Responsive</span>

                                </div>

                            </div>

                        </article>

                    </div>


                    {{-- SaaS --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    02
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-cloud"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    SaaS
                                </span>


                                <h3>
                                    SaaS Product Design
                                </h3>


                                <p>

                                    Simplify complex software products
                                    with structured navigation, dashboards,
                                    workflows, and reusable interfaces.

                                </p>


                                <div class="fc-service-tags">

                                    <span>SaaS</span>
                                    <span>Dashboards</span>
                                    <span>Workflows</span>

                                </div>

                            </div>

                        </article>

                    </div>


                    {{-- E-commerce --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    03
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
                                    E-commerce UX
                                </h3>


                                <p>

                                    Design product discovery, product
                                    pages, cart, checkout, and customer
                                    journeys around a smooth shopping
                                    experience.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Shopping</span>
                                    <span>Checkout</span>
                                    <span>Conversion</span>

                                </div>

                            </div>

                        </article>

                    </div>


                    {{-- Mobile --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    04
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-mobile-alt"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Mobile
                                </span>


                                <h3>
                                    Mobile Applications
                                </h3>


                                <p>

                                    Design mobile journeys that make
                                    important actions simple, accessible,
                                    and comfortable for touch interaction.

                                </p>


                                <div class="fc-service-tags">

                                    <span>iOS</span>
                                    <span>Android</span>
                                    <span>Mobile UX</span>

                                </div>

                            </div>

                        </article>

                    </div>


                    {{-- Admin --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    05
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-tachometer-alt"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Business Tools
                                </span>


                                <h3>
                                    Admin & Dashboard UX
                                </h3>


                                <p>

                                    Make data-heavy interfaces easier to
                                    navigate with structured dashboards,
                                    filters, tables, workflows, and
                                    role-based experiences.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Dashboards</span>
                                    <span>Admin</span>
                                    <span>Data</span>

                                </div>

                            </div>

                        </article>

                    </div>


                    {{-- Portals --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    06
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-user-circle"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Portals
                                </span>


                                <h3>
                                    Customer & User Portals
                                </h3>


                                <p>

                                    Design self-service portals that help
                                    customers and users manage accounts,
                                    information, requests, and workflows.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Portals</span>
                                    <span>Accounts</span>
                                    <span>Self-Service</span>

                                </div>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        DESIGN PROCESS
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

                                From research to
                                <span>refined experience.</span>

                            </h2>

                        </div>


                        <div class="col-lg-5">

                            <p class="fc-work-intro">

                                We move from understanding the problem
                                to mapping the experience, designing the
                                interface, and validating the result
                                before development.

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

                                    Understand users, business goals,
                                    existing products, workflows,
                                    and the problems we need to solve.

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

                                    <i class="fas fa-sitemap"></i>

                                </div>

                            </div>


                            <div class="fc-work-card-content">

                                <span class="fc-work-label">
                                    Structure
                                </span>


                                <h3>
                                    Map
                                </h3>


                                <p>

                                    Create information architecture,
                                    user flows, wireframes, and journeys
                                    that establish the product structure.

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

                                    <i class="fas fa-pencil-ruler"></i>

                                </div>

                            </div>


                            <div class="fc-work-card-content">

                                <span class="fc-work-label">
                                    Design
                                </span>


                                <h3>
                                    Refine
                                </h3>


                                <p>

                                    Turn the structure into polished
                                    interfaces, components, interactions,
                                    and responsive experiences.

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

                                    <i class="fas fa-check-circle"></i>

                                </div>

                            </div>


                            <div class="fc-work-card-content">

                                <span class="fc-work-label">
                                    Validate
                                </span>


                                <h3>
                                    Improve
                                </h3>


                                <p>

                                    Review the experience, identify
                                    usability issues, and refine the
                                    design before implementation.

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

                            A design system built for
                            <span>clarity and consistency.</span>

                        </h2>

                    </div>


                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">

                            Good design should not stop at individual screens.
                            We create reusable thinking and components that
                            help your product stay consistent as it grows.

                        </p>

                    </div>

                </div>


                <div class="row g-4">


                    {{-- 01 --}}
                    <div class="col-12 col-md-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    01
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-layer-group"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Consistency
                                </span>


                                <h3>
                                    Reusable Components
                                </h3>


                                <p>

                                    Build reusable interface components
                                    and patterns that create consistency
                                    across pages, screens, and products.

                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- 02 --}}
                    <div class="col-12 col-md-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    02
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-universal-access"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Accessibility
                                </span>


                                <h3>
                                    More Inclusive Experiences
                                </h3>


                                <p>

                                    Consider readability, interaction,
                                    navigation, contrast, and other
                                    accessibility factors throughout
                                    the design process.

                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- 03 --}}
                    <div class="col-12 col-md-6">

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
                                    Responsive
                                </span>


                                <h3>
                                    Cross-device Experiences
                                </h3>


                                <p>

                                    Design layouts and interactions that
                                    adapt across different screen sizes
                                    and device contexts.

                                </p>

                            </div>

                        </article>

                    </div>


                    {{-- 04 --}}
                    <div class="col-12 col-md-6">

                        <article class="fc-service-card fc-service-card-dark">

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
                                    Development Ready
                                </span>


                                <h3>
                                    Developer-friendly Designs
                                </h3>


                                <p>

                                    Provide structured designs, components,
                                    states, and interaction details that
                                    make implementation clearer for
                                    development teams.

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

                            Questions about
                            <span>UI/UX design.</span>

                        </h2>

                    </div>


                    <div class="col-lg-5">

                        <p class="fc-services-list-intro">

                            A few common questions about our approach
                            to designing websites, applications, and
                            digital products.

                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    <div class="col-12">

                        <div class="accordion" id="uiUxFaq">


                            {{-- FAQ 01 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="uiUxFaqOne">

                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#uiUxCollapseOne" aria-expanded="true"
                                        aria-controls="uiUxCollapseOne">

                                        What is included in UI/UX design?

                                    </button>

                                </h3>


                                <div id="uiUxCollapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="uiUxFaqOne" data-bs-parent="#uiUxFaq">

                                    <div class="accordion-body">

                                        Depending on the project, UI/UX work
                                        can include research, user flows,
                                        information architecture, wireframes,
                                        interface design, prototypes,
                                        responsive layouts, and design systems.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 02 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="uiUxFaqTwo">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#uiUxCollapseTwo" aria-expanded="false"
                                        aria-controls="uiUxCollapseTwo">

                                        Do you design websites and web applications?

                                    </button>

                                </h3>


                                <div id="uiUxCollapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="uiUxFaqTwo" data-bs-parent="#uiUxFaq">

                                    <div class="accordion-body">

                                        Yes. We design business websites,
                                        web applications, SaaS products,
                                        dashboards, portals, and other
                                        browser-based digital experiences.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 03 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="uiUxFaqThree">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#uiUxCollapseThree" aria-expanded="false"
                                        aria-controls="uiUxCollapseThree">

                                        Can you design mobile applications?

                                    </button>

                                </h3>


                                <div id="uiUxCollapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="uiUxFaqThree" data-bs-parent="#uiUxFaq">

                                    <div class="accordion-body">

                                        Yes. Mobile UI/UX can include user
                                        flows, navigation, screen design,
                                        touch interactions, responsive
                                        considerations, and prototypes
                                        for application development.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 04 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="uiUxFaqFour">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#uiUxCollapseFour" aria-expanded="false"
                                        aria-controls="uiUxCollapseFour">

                                        Do you work with an existing design?

                                    </button>

                                </h3>


                                <div id="uiUxCollapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="uiUxFaqFour" data-bs-parent="#uiUxFaq">

                                    <div class="accordion-body">

                                        Yes. We can work with an existing
                                        interface or product and focus on
                                        improving usability, visual consistency,
                                        responsive behavior, or specific
                                        user journeys.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 05 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="uiUxFaqFive">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#uiUxCollapseFive" aria-expanded="false"
                                        aria-controls="uiUxCollapseFive">

                                        Do you create design systems?

                                    </button>

                                </h3>


                                <div id="uiUxCollapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="uiUxFaqFive" data-bs-parent="#uiUxFaq">

                                    <div class="accordion-body">

                                        Yes. We can define reusable components,
                                        patterns, typography, spacing, states,
                                        and guidelines to help maintain
                                        consistency across a digital product.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 06 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="uiUxFaqSix">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#uiUxCollapseSix" aria-expanded="false"
                                        aria-controls="uiUxCollapseSix">

                                        Can you work with our development team?

                                    </button>

                                </h3>


                                <div id="uiUxCollapseSix" class="accordion-collapse collapse"
                                    aria-labelledby="uiUxFaqSix" data-bs-parent="#uiUxFaq">

                                    <div class="accordion-body">

                                        Yes. Designs can be structured with
                                        reusable components, responsive states,
                                        interaction details, and clear handoff
                                        information for development teams.

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        WHY CHOOSE US
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
                        Have a Design Project in Mind?
                        <span></span>

                    </div>


                    <h2 class="fc-services-cta-title">

                        Let's create an experience
                        <span>people enjoy using.</span>

                    </h2>


                    <p class="fc-services-cta-text">

                        Tell us about your website, application, or
                        digital product. We'll help turn your requirements
                        into a clear and thoughtful user experience.

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

                        More ways to build your
                        <span>digital presence.</span>

                    </h2>


                    <p class="fc-services-intro-text">

                        Combine UI/UX design with development, e-commerce,
                        software, digital marketing, and branding to create
                        a complete digital experience.

                    </p>

                </div>


                <div class="mt-5">

                    @include('includes.services')

                </div>

            </div>

        </section>

    </main>
@endsection
