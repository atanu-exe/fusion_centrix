@extends('layouts.app')



@section('content')
    <!-- Hero Banner -->


    <!-- Hero Banner -->
    <section class="fc-header">
        <div class="container">
            <div class="fc-header-content">
                <h1>Professional Web & App Development Services</h1>
                <p>Build <b>scalable, high-performance web applications and mobile apps</b> with <b>custom development, CMS integration, API-first architecture, and maintenance services</b> for businesses in the US, Canada, India, and globally. We deliver <b>SEO-optimized, secure, and conversion-focused digital products</b>.
                </p>
                <div class="fc-breadcrumb">
                    <a href="/">Home</a> / <a href="{{ route('services') }}">Services </a> / <span>Web & App Development</span>
                </div>
            </div>
        </div>
    </section>


    <!-- Technology Stack -->
    <section id="webapp-overview" class="py-5 py-lg-6">
        <div class="container">
            <div class="text-center mb-4">
                {{-- <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3">Technology Stack</span> --}}
                <h2 class="fw-bold mb-3">Engineered for the Future</h2>
                <p class="text-muted mx-auto" style="max-width: 720px;">
                    We leverage the latest frameworks and best practices to ensure your digital product is fast, secure, and capable of scaling with your business demands.
                </p>
            </div>

            <div class="row g-3 g-md-4">
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4 text-center">
                            <div class="bg-primary-subtle rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-bolt fa-2x text-primary"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Performance-First</h5>
                            <p class="text-muted mb-0 small">
                                Build with Core Web Vitals in mind, ensuring sub-second load times and smooth interactions.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4 text-center">
                            <div class="bg-success-subtle rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-shield-alt fa-2x text-success"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Security Baked-in</h5>
                            <p class="text-muted mb-0 small">
                                Industry-standard security measures to protect your users and your brand from day one.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4 text-center">
                            <div class="bg-warning-subtle rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-expand-arrows-alt fa-2x text-warning"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Built to Scale</h5>
                            <p class="text-muted mb-0 small">
                                Modular architecture that grows with you, without accumulating technical debt.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4 text-center">
                            <div class="bg-info-subtle rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-mobile-alt fa-2x text-info"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Mobile-First</h5>
                            <p class="text-muted mb-0 small">
                                Responsive design that works perfectly on all devices, from phones to desktops.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4 text-center">
                            <div class="bg-danger-subtle rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-search fa-2x text-danger"></i>
                            </div>
                            <h5 class="fw-bold mb-2">SEO Optimized</h5>
                            <p class="text-muted mb-0 small">
                                Semantic HTML, structured data, and best practices for maximum search visibility.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4 text-center">
                            <div class="bg-secondary-subtle rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-cogs fa-2x text-secondary"></i>
                            </div>
                            <h5 class="fw-bold mb-2">API-First</h5>
                            <p class="text-muted mb-0 small">
                                Flexible architectures that power web, mobile, and third-party integrations.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="cms-services" class="py-5 py-lg-6 bg-light">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Icon Grid Column -->
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fab fa-wordpress"></i>
                                    </div>
                                    <div class="mobile-card-inr">
                                        <h6 class="mb-1">WordPress CMS</h6>
                                        <small class="text-muted">Custom themes & plugins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                    <div class="mobile-card-inr">
                                        <h6 class="mb-1">Headless CMS</h6>
                                        <small class="text-muted">API-first architecture</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <div class="mobile-card-inr">
                                        <h6 class="mb-1">Access Control</h6>
                                        <small class="text-muted">Role-based permissions</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="mobile-card-inr">
                                        <h6 class="mb-1">SEO Tools</h6>
                                        <small class="text-muted">Schema & meta tags</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Text Column -->
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="mb-3">
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">CMS & Dynamic Content</span>
                    </div>
                    <h2 class="display-6 fw-bold mb-3">Empower Your Content Team</h2>
                    <p class="text-muted fc-lead">
                        Whether it’s WordPress, Drupal, or a custom headless solution, we build content management systems
                        that give you full control without breaking the design.
                    </p>
                    <div class="d-flex flex-column gap-3 mt-4">
                        <div class="d-flex align-items-start gap-3">
                            <div class="mt-1 text-primary"><i class="fas fa-layer-group fa-lg"></i></div>
                            <div>
                                <h5 class="mb-1">Structured Content</h5>
                                <p class="text-muted mb-0">Define content models that make sense for your business logic.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <div class="mt-1 text-primary"><i class="fas fa-lock fa-lg"></i></div>
                            <div>
                                <h5 class="mb-1">Role-Based Access</h5>
                                <p class="text-muted mb-0">Granular permissions to keep your publishing workflow secure.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <div class="mt-1 text-primary"><i class="fas fa-search fa-lg"></i></div>
                            <div>
                                <h5 class="mb-1">SEO Optimized</h5>
                                <p class="text-muted mb-0">Built-in schema, meta tags, and sitemap generation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section id="maintenance" class="py-5 py-lg-6">
        <div class="container">
            <div class="row align-items-start g-5">
                <!-- Text Column -->
                <div class="col-lg-6 order-1 order-lg-1">
                    <div class="mb-3">
                        <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill">Long-term Partnership</span>
                    </div>
                    <h2 class="display-6 fw-bold mb-3">Maintenance & Optimization</h2>
                    <p class="text-muted lead mb-3">
                        Digital products live and breathe. We provide <strong>ongoing support, security updates, and performance optimization</strong> to keep your web apps secure and fast.
                    </p>
                    <p class="text-muted mb-4">
                        Our maintenance plans include <strong>99.9% uptime monitoring, regular security patches, performance tuning, and content updates</strong> to keep you ahead of the competition.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Proactive monitoring and instant issue resolution</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Monthly security audits and vulnerability patches</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Performance optimization and Core Web Vitals tracking</span>
                        </li>
                    </ul>
                </div>
                <!-- Icon Grid Column -->
                <div class="col-lg-6 order-2 order-lg-2">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-server"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">99.9% Uptime</h6>
                                        <small class="text-muted">Reliable hosting & monitoring</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Security Patches</h6>
                                        <small class="text-muted">Regular updates</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-tachometer-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Performance Tuning</h6>
                                        <small class="text-muted">Speed optimization</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-life-ring"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Priority Support</h6>
                                        <small class="text-muted">24/7 assistance</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="responsive-design" class="py-5 bg-dark text-white position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: radial-gradient(circle at top right, #1e293b, #0f172a);"></div>
        <div class="container position-relative z-2">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="{{ asset('assets/images/web-1.webp') }}" class="img-fluid rounded-4 shadow opacity-90"
                        alt="Responsive Design">
                </div>
                <div class="col-lg-6">
                    <span class="badge bg-primary bg-opacity-20 text-primary-emphasis mb-3 px-3 py-2 rounded-pill">Mobile
                        First</span>
                    <h2 class="mb-3">Responsive & Accessible</h2>
                    <p class="lead text-white-50">
                        We design for the smallest screen first, ensuring your experience translates perfectly to tablets and
                        desktops. Accessibility (WCAG) is integrated, not added on.
                    </p>
                    <div class="row g-3 mt-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-2 text-light">
                                <i class="fas fa-check-circle text-primary"></i> <span>Fluid Layouts</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-2 text-light">
                                <i class="fas fa-check-circle text-primary"></i> <span>Touch Friendly</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-2 text-light">
                                <i class="fas fa-check-circle text-primary"></i> <span>Retina Ready</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-2 text-light">
                                <i class="fas fa-check-circle text-primary"></i> <span>Cross-Browser</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Process Section -->
    <section id="process" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4 mb-md-5">
                {{-- <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-2">Our Process</span> --}}
                <h2 class="h1 fw-bold mb-3">SEO, Performance, and UX in One Plan</h2>
                <p class="lead text-muted col-lg-8 mx-auto">
                    Every engagement ships with the same playbook: keyword-informed IA, semantic markup, Core Web Vitals targets, and conversion-focused UX flows.
                </p>
            </div>

            <div class="row g-3 g-md-4 mb-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                                <span class="text-white fw-bold">01</span>
                            </div>
                            <h5 class="fw-bold mb-2">Discovery & IA</h5>
                            <p class="text-muted small mb-0">Content audits, keyword intent, and IA that clarifies crawl paths.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                                <span class="text-white fw-bold">02</span>
                            </div>
                            <h5 class="fw-bold mb-2">Design & UX</h5>
                            <p class="text-muted small mb-0">Responsive layouts, accessible patterns, and clear CTAs for conversion.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                                <span class="text-white fw-bold">03</span>
                            </div>
                            <h5 class="fw-bold mb-2">Build & Optimize</h5>
                            <p class="text-muted small mb-0">Semantic HTML, structured data, asset budgets, and CWV tuning.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                                <span class="text-white fw-bold">04</span>
                            </div>
                            <h5 class="fw-bold mb-2">Launch & Measure</h5>
                            <p class="text-muted small mb-0">QA, analytics events, and continuous improvements from real data.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">What's Included:</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-2">
                                <i class="fas fa-check-circle text-success mt-1"></i>
                                <span class="text-muted small">Keyword mapping to pages and headings</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-2">
                                <i class="fas fa-check-circle text-success mt-1"></i>
                                <span class="text-muted small">Schema-ready components (FAQ, HowTo, Local)</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-2">
                                <i class="fas fa-check-circle text-success mt-1"></i>
                                <span class="text-muted small">Image/CDN strategy with lazy-loading</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-2">
                                <i class="fas fa-check-circle text-success mt-1"></i>
                                <span class="text-muted small">Analytics + events for funnel visibility</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- FAQ Section -->
    <section id="faq" class="py-5 position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-light opacity-50"></div>
        <div class="container position-relative">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <div class="d-inline-flex align-items-center gap-2 bg-primary bg-opacity-10 px-4 py-2 rounded-pill mb-3">
                        <i class="fas fa-question-circle text-primary"></i>
                        <span class="text-primary fw-semibold">Frequently Asked Questions</span>
                    </div>
                    <h2 class="display-5 fw-bold mb-3">Got Questions? We've Got Answers</h2>
                    <p class="lead text-muted">
                        Everything you need to know about our web and app development services.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                                    <i class="fas fa-rocket text-white"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-2">How do you make sites rank faster after launch?</h5>
                                    <p class="text-muted mb-0">We ship semantic HTML, schema, fast LCP/CLS scores, and a content plan aligned to keywords. Sitemaps and analytics are configured before go-live.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                                    <i class="fas fa-mobile-alt text-white"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-2">Can you support both web and mobile app backends?</h5>
                                    <p class="text-muted mb-0">Yes—API-first architectures with auth, caching, and observability to serve web, iOS, and Android clients from one backend.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                                    <i class="fas fa-tools text-white"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-2">What's included in maintenance?</h5>
                                    <p class="text-muted mb-0">Security patches, uptime monitoring, performance tuning, content updates, and analytics reviews to keep rankings and conversions healthy.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="bg-info rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                                    <i class="fas fa-code text-white"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-2">What technologies do you specialize in?</h5>
                                    <p class="text-muted mb-0">We work with Laravel, React, Vue.js, Node.js, WordPress, and modern JAMstack solutions. Our team stays current with the latest frameworks and best practices.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                                    <i class="fas fa-clock text-white"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-2">How long does a typical project take?</h5>
                                    <p class="text-muted mb-0">Timeline varies by scope, but most web projects take 8-12 weeks from discovery to launch. We provide detailed milestones and keep you updated throughout.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                                    <i class="fas fa-dollar-sign text-white"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-2">Do you offer flexible pricing options?</h5>
                                    <p class="text-muted mb-0">Yes! We offer fixed-price packages, hourly rates, and monthly retainers depending on your needs. Contact us for a custom quote tailored to your project.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <p class="text-muted mb-3">Still have questions?</p>
                <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary btn-lg rounded-pill px-5 shadow hover-lift">
                    <i class="fas fa-comments me-2"></i>Talk to Our Team
                </a>
            </div>
        </div>
    </section>










    <!-- Call To Action -->
<section class="get-quote-section fc-primary-bg" id="get-quote">
        <div class="container">
            <div class="quote-card">
                <div class="row align-items-center gy-3">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h3 class="display-5 fw-bold mb-3">Ready to Elevate Your Brand?</h3>
                        <p class="lead mb-4 opacity-90">Let’s create something powerful together. Fast, tailored, and results-driven.</p>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex justify-content-center justify-content-lg-end gap-3 flex-wrap">
                            <a href="http://127.0.0.1:8000/contact-us" class="btn btn-light btn-lg text-primary fw-bold px-5 py-3 rounded-pill shadow-lg">Get a Free Quote</a>
                            <a href="http://127.0.0.1:8000/portfolio" class="btn btn-outline-light btn-lg fw-bold px-5 py-3 rounded-pill">View Portfolio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services -->
    <section id="related-services" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4 mb-md-5">
                {{-- <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill mb-2">More Services</span> --}}
                <h2 class="h1 fw-bold mb-3">Explore Our Other Services</h2>
                <p class="lead text-muted col-lg-10 mx-auto">
                    We empower businesses through expertly crafted web & app development, SEO, branding, and marketing strategies. From startups to large-scale enterprises in the US, Canada, and beyond, Fusioncentrix Solutions delivers scalable and performance-driven digital services tailored to your vision.
                </p>
            </div>

            @include('includes.services')

        </div>

    </section>
@endsection
