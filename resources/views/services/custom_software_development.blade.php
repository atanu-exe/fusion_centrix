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
                            Custom Software Development

                        </div>


                        <h1 class="fc-services-title">

                            Software <span>built around</span>
                            the way your
                            <strong>business works.</strong>

                        </h1>


                        <p class="fc-services-description">

                            Build custom software solutions designed around your
                            workflows, teams, customers, and business requirements.
                            From internal business systems to customer-facing
                            platforms, we create <strong>scalable, secure, and
                                maintainable software</strong> that grows with you.

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
                                <span>SOFTWARE</span>

                            </div>


                            <div class="fc-orbit-card orbit-design">

                                <i class="fas fa-cogs"></i>
                                <span>Systems</span>

                            </div>


                            <div class="fc-orbit-card orbit-development">

                                <i class="fas fa-code"></i>
                                <span>Development</span>

                            </div>


                            <div class="fc-orbit-card orbit-growth">

                                <i class="fas fa-chart-line"></i>
                                <span>Insights</span>

                            </div>


                            <div class="fc-orbit-card orbit-intelligence">

                                <i class="fas fa-robot"></i>
                                <span>Automation</span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        SOFTWARE FOUNDATION
    ========================================================== --}}
        <section class="fc-services-intro">

            <div class="container">

                <div class="text-center">

                    <div class="fc-section-eyebrow">

                        <span></span>
                        Custom Software Solutions
                        <span></span>

                    </div>


                    <h2 class="fc-services-intro-title">

                        Technology designed around
                        <span>your processes.</span>

                    </h2>


                    <p class="fc-services-intro-text">

                        Off-the-shelf software does not always fit the way a
                        business operates. We build custom applications that
                        connect your workflows, data, users, and systems into
                        software that works around your actual requirements.

                    </p>

                </div>


                <div class="row g-4 fc-capability-row">


                    {{-- 01 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-project-diagram"></i>

                            </div>

                            <span>01</span>

                            <h3>Business Systems</h3>

                            <p>

                                Replace disconnected processes with
                                software designed around your team's
                                day-to-day operations.

                            </p>

                        </div>

                    </div>


                    {{-- 02 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-layer-group"></i>

                            </div>

                            <span>02</span>

                            <h3>Scalable Architecture</h3>

                            <p>

                                Build modular applications that can
                                evolve as your users, features, and
                                business requirements grow.

                            </p>

                        </div>

                    </div>


                    {{-- 03 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-plug"></i>

                            </div>

                            <span>03</span>

                            <h3>Integrations</h3>

                            <p>

                                Connect APIs, third-party platforms,
                                payment systems, business tools,
                                and internal applications.

                            </p>

                        </div>

                    </div>


                    {{-- 04 --}}
                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">

                                <i class="fas fa-shield-alt"></i>

                            </div>

                            <span>04</span>

                            <h3>Secure Software</h3>

                            <p>

                                Build applications with appropriate
                                authentication, permissions, validation,
                                and data protection.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        CORE SOFTWARE SERVICES
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">

                            <span></span>
                            What We Build

                        </div>


                        <h2 class="fc-services-list-title">

                            Software solutions for
                            <span>real business needs.</span>

                        </h2>

                    </div>


                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">

                            From internal platforms and dashboards to
                            customer-facing applications and integrations,
                            we build software around your specific use case.

                        </p>

                    </div>

                </div>


                <div class="row g-4">


                    {{-- Business Applications --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    01
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-cogs"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Business Systems
                                </span>


                                <h3>
                                    Custom Business Applications
                                </h3>


                                <p>

                                    Build software around your internal
                                    workflows, approvals, operations,
                                    teams, and business processes instead
                                    of forcing your processes into generic tools.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Business Apps</span>
                                    <span>Workflows</span>
                                    <span>Operations</span>
                                    <span>Automation</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Discuss Your System
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- SaaS --}}
                    <div class="col-12 col-lg-6">

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
                                    SaaS Platforms
                                </span>


                                <h3>
                                    SaaS Application Development
                                </h3>


                                <p>

                                    Create cloud-based software products
                                    with user accounts, subscription
                                    workflows, dashboards, permissions,
                                    integrations, and product-specific
                                    functionality.

                                </p>


                                <div class="fc-service-tags">

                                    <span>SaaS</span>
                                    <span>Dashboards</span>
                                    <span>Subscriptions</span>
                                    <span>APIs</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Build Your SaaS
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- Dashboards --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    03
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-chart-bar"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Data & Insights
                                </span>


                                <h3>
                                    Dashboards & Admin Systems
                                </h3>


                                <p>

                                    Turn operational data into useful
                                    dashboards and administrative systems
                                    that help teams manage users, records,
                                    workflows, and business activity.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Admin Panels</span>
                                    <span>Dashboards</span>
                                    <span>Reports</span>
                                    <span>Analytics</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Discuss Your Dashboard
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- API --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    04
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-plug"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Integrations
                                </span>


                                <h3>
                                    API & Third-party Integrations
                                </h3>


                                <p>

                                    Connect your application with
                                    payment gateways, CRMs, accounting
                                    systems, external APIs, communication
                                    tools, and other business platforms.

                                </p>


                                <div class="fc-service-tags">

                                    <span>REST APIs</span>
                                    <span>Integrations</span>
                                    <span>Payments</span>
                                    <span>Automation</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Discuss Integrations
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- Automation --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    05
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-robot"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Automation
                                </span>


                                <h3>
                                    Workflow Automation
                                </h3>


                                <p>

                                    Reduce repetitive manual work by
                                    connecting business rules, approvals,
                                    notifications, data processing, and
                                    system-to-system workflows.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Automation</span>
                                    <span>Workflows</span>
                                    <span>Notifications</span>
                                    <span>Processes</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Automate Your Workflow
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>


                    {{-- Legacy --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    06
                                </span>


                                <div class="fc-service-icon">

                                    <i class="fas fa-sync-alt"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Modernization
                                </span>


                                <h3>
                                    Software Modernization
                                </h3>


                                <p>

                                    Improve existing applications by
                                    modernizing architecture, improving
                                    maintainability, introducing better
                                    workflows, and connecting modern systems.

                                </p>


                                <div class="fc-service-tags">

                                    <span>Modernization</span>
                                    <span>Refactoring</span>
                                    <span>APIs</span>
                                    <span>Maintenance</span>

                                </div>

                            </div>


                            <a href="{{ url('contact-us') }}" class="fc-service-link">

                                Modernize Your Software
                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </article>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        TECHNOLOGY
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">

                            <span></span>
                            Technology

                        </div>


                        <h2 class="fc-services-list-title">

                            The right technology for
                            <span>the right problem.</span>

                        </h2>

                    </div>


                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">

                            Technology choices should follow the requirements
                            of the product. We select practical technologies
                            based on functionality, integrations, scalability,
                            and long-term maintainability.

                        </p>

                    </div>

                </div>


                <div class="row g-4">


                    {{-- Laravel --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    01
                                </span>

                                <div class="fc-service-icon">

                                    <i class="fab fa-laravel"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Backend
                                </span>

                                <h3>
                                    Laravel Development
                                </h3>

                                <p>

                                    Build structured web applications,
                                    APIs, admin systems, and business
                                    platforms using Laravel.

                                </p>

                                <div class="fc-service-tags">

                                    <span>Laravel</span>
                                    <span>PHP</span>
                                    <span>APIs</span>

                                </div>

                            </div>

                        </article>

                    </div>


                    {{-- React --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    02
                                </span>

                                <div class="fc-service-icon">

                                    <i class="fab fa-react"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Frontend
                                </span>

                                <h3>
                                    React Development
                                </h3>

                                <p>

                                    Create responsive interfaces and
                                    interactive applications for modern
                                    web products and business platforms.

                                </p>

                                <div class="fc-service-tags">

                                    <span>React</span>
                                    <span>JavaScript</span>
                                    <span>UI</span>

                                </div>

                            </div>

                        </article>

                    </div>


                    {{-- Database --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">
                                    03
                                </span>

                                <div class="fc-service-icon">

                                    <i class="fas fa-database"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Data
                                </span>

                                <h3>
                                    Database & Data Systems
                                </h3>

                                <p>

                                    Design structured data models and
                                    application workflows that keep
                                    business information organized and
                                    accessible.

                                </p>

                                <div class="fc-service-tags">

                                    <span>MySQL</span>
                                    <span>Data Models</span>
                                    <span>Reporting</span>

                                </div>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        HOW WE WORK
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

                                From business problem to
                                <span>working software.</span>

                            </h2>

                        </div>


                        <div class="col-lg-5">

                            <p class="fc-work-intro">

                                We focus on understanding the problem first,
                                then design and build software that is practical
                                for the people who will actually use it.

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

                                    Understand your existing process,
                                    users, requirements, challenges,
                                    and desired outcomes.

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
                                    Plan
                                </span>


                                <h3>
                                    Architect
                                </h3>


                                <p>

                                    Define the application's structure,
                                    workflows, data model, integrations,
                                    and technical direction.

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

                                    <i class="fas fa-code"></i>

                                </div>

                            </div>


                            <div class="fc-work-card-content">

                                <span class="fc-work-label">
                                    Build
                                </span>


                                <h3>
                                    Develop
                                </h3>


                                <p>

                                    Develop the application in manageable
                                    stages with testing, integration,
                                    and continuous feedback.

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

                                    <i class="fas fa-rocket"></i>

                                </div>

                            </div>


                            <div class="fc-work-card-content">

                                <span class="fc-work-label">
                                    Launch
                                </span>


                                <h3>
                                    Improve
                                </h3>


                                <p>

                                    Launch the software, gather feedback,
                                    monitor usage, and continue improving
                                    as your business evolves.

                                </p>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        BENEFITS
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">

                            <span></span>
                            Why Custom Software

                        </div>


                        <h2 class="fc-services-list-title">

                            Software that fits your
                            <span>business, not the other way around.</span>

                        </h2>

                    </div>


                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">

                            Custom software gives you control over the
                            workflows, features, integrations, and experiences
                            that matter most to your organization.

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

                                    <i class="fas fa-sliders-h"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Flexibility
                                </span>


                                <h3>
                                    Built Around Your Workflow
                                </h3>


                                <p>

                                    Design features and workflows around
                                    how your business actually operates,
                                    rather than adapting your processes
                                    to generic software.

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

                                    <i class="fas fa-link"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Connectivity
                                </span>


                                <h3>
                                    Connected Business Systems
                                </h3>


                                <p>

                                    Bring data and processes together by
                                    connecting internal tools and external
                                    services through APIs and integrations.

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

                                    <i class="fas fa-bolt"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Efficiency
                                </span>


                                <h3>
                                    Less Manual Work
                                </h3>


                                <p>

                                    Automate repetitive processes,
                                    notifications, approvals, and
                                    data handling so teams can spend
                                    more time on valuable work.

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

                                    <i class="fas fa-layer-group"></i>

                                </div>

                            </div>


                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Growth
                                </span>


                                <h3>
                                    Ready to Evolve
                                </h3>


                                <p>

                                    Start with the features you need today
                                    while keeping the architecture flexible
                                    enough to support future requirements.

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
                            <span>custom software.</span>

                        </h2>

                    </div>


                    <div class="col-lg-5">

                        <p class="fc-services-list-intro">

                            A few common questions businesses ask before
                            starting a custom software development project.

                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    <div class="col-12">

                        <div class="accordion" id="customSoftwareFaq">


                            {{-- FAQ 01 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="softwareFaqOne">

                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#softwareCollapseOne" aria-expanded="true"
                                        aria-controls="softwareCollapseOne">

                                        When should a business consider custom software?

                                    </button>

                                </h3>


                                <div id="softwareCollapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="softwareFaqOne" data-bs-parent="#customSoftwareFaq">

                                    <div class="accordion-body">

                                        Custom software can make sense when
                                        existing tools do not fit your workflows,
                                        require too many workarounds, or cannot
                                        provide the integrations and functionality
                                        your business needs.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 02 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="softwareFaqTwo">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#softwareCollapseTwo" aria-expanded="false"
                                        aria-controls="softwareCollapseTwo">

                                        Can you integrate existing business systems?

                                    </button>

                                </h3>


                                <div id="softwareCollapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="softwareFaqTwo" data-bs-parent="#customSoftwareFaq">

                                    <div class="accordion-body">

                                        Yes. Depending on the available
                                        integration methods, we can connect
                                        APIs, payment systems, CRMs, business
                                        tools, databases, and other services.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 03 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="softwareFaqThree">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#softwareCollapseThree" aria-expanded="false"
                                        aria-controls="softwareCollapseThree">

                                        Can you build admin dashboards and portals?

                                    </button>

                                </h3>


                                <div id="softwareCollapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="softwareFaqThree" data-bs-parent="#customSoftwareFaq">

                                    <div class="accordion-body">

                                        Yes. We can build role-based admin
                                        dashboards, internal portals, reporting
                                        systems, customer portals, and other
                                        application interfaces.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 04 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="softwareFaqFour">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#softwareCollapseFour" aria-expanded="false"
                                        aria-controls="softwareCollapseFour">

                                        Can you modernize an existing application?

                                    </button>

                                </h3>


                                <div id="softwareCollapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="softwareFaqFour" data-bs-parent="#customSoftwareFaq">

                                    <div class="accordion-body">

                                        Yes. Existing software can be reviewed
                                        and gradually improved through
                                        refactoring, architectural changes,
                                        new integrations, interface improvements,
                                        and feature development.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 05 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="softwareFaqFive">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#softwareCollapseFive" aria-expanded="false"
                                        aria-controls="softwareCollapseFive">

                                        What technologies do you use?

                                    </button>

                                </h3>


                                <div id="softwareCollapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="softwareFaqFive" data-bs-parent="#customSoftwareFaq">

                                    <div class="accordion-body">

                                        Technology depends on the project.
                                        Our development work can include
                                        technologies such as Laravel, PHP,
                                        React, JavaScript, APIs, and database
                                        technologies based on the application's
                                        requirements.

                                    </div>

                                </div>

                            </div>


                            {{-- FAQ 06 --}}
                            <div class="accordion-item">

                                <h3 class="accordion-header" id="softwareFaqSix">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#softwareCollapseSix" aria-expanded="false"
                                        aria-controls="softwareCollapseSix">

                                        Do you provide ongoing support?

                                    </button>

                                </h3>


                                <div id="softwareCollapseSix" class="accordion-collapse collapse"
                                    aria-labelledby="softwareFaqSix" data-bs-parent="#customSoftwareFaq">

                                    <div class="accordion-body">

                                        Ongoing support can include maintenance,
                                        updates, improvements, troubleshooting,
                                        performance work, and additional feature
                                        development as the software evolves.

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
                        Have a Software Project in Mind?
                        <span></span>

                    </div>


                    <h2 class="fc-services-cta-title">

                        Let's build software that
                        <span>works for your business.</span>

                    </h2>


                    <p class="fc-services-cta-text">

                        Tell us about your workflow, the problem you're
                        trying to solve, and where you want to take your
                        business. We'll help turn the requirement into
                        a practical software solution.

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
                        <span>digital business.</span>

                    </h2>


                    <p class="fc-services-intro-text">

                        Combine custom software with web development,
                        e-commerce, digital marketing, UI/UX, and branding
                        to create a complete digital presence.

                    </p>

                </div>


                <div class="mt-5">

                    @include('includes.services')

                </div>

            </div>

        </section>

    </main>
@endsection
