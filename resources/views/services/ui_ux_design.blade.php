@extends('layouts.app')



@section('content')

    <!-- Hero Banner -->

 <section class="fc-header">
        <div class="container">
            <div class="fc-header-content">
                <h1>Professional UI/UX Design Services</h1>
                <p>Create <b>intuitive web and mobile interfaces</b> with <b>UX research, wireframing, prototyping, and design systems</b> for businesses in the US, Canada, India, and globally. We focus on <b>user engagement, accessibility, and SEO-friendly design</b>.
                </p>
                <div class="fc-breadcrumb">
                    <a href="/">Home</a> / <a href="{{ route('services') }}">Services </a> / <span>UI/UX Design</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Overview -->

    <section class="py-5 py-lg-6">
        <div class="container">
            <div class="row align-items-start g-5">
                <!-- Text Column -->
                <div class="col-lg-6 order-1 order-lg-1">
                    <div class="mb-3">
                        {{-- <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">Web & Mobile Design</span> --}}
                    </div>
                    <h2 class="display-6 fw-bold mb-3">Web & Mobile UI Design</h2>
                    <p class="text-muted lead mb-3">
                        Craft <strong>visually stunning web and mobile interfaces</strong> that enhance user experience and strengthen brand identity.
                    </p>
                    <p class="text-muted mb-4">
                        Every design is <strong>responsive, intuitive, and SEO-friendly</strong>, ensuring optimal performance across all devices and screen sizes.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Mobile-first, accessibility-focused design approach</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Brand-aligned visual language and consistency</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Performance-optimized for faster load times</span>
                        </li>
                    </ul>
                </div>
                <!-- Icon Grid Column -->
                <div class="col-lg-6 order-2 order-lg-2">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-desktop"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Web Design</h6>
                                        <small class="text-muted">Responsive, modern UX</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Mobile Design</h6>
                                        <small class="text-muted">Touch-friendly interfaces</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-palette"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Visual Design</h6>
                                        <small class="text-muted">Brand-aligned aesthetics</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-universal-access"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Accessibility</h6>
                                        <small class="text-muted">WCAG compliant</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 py-lg-6 bg-light">
        <div class="container">
            <div class="row align-items-start g-5">
                <!-- Text Column -->
                <div class="col-lg-6 order-1 order-lg-1">
                    <div class="mb-3">
                        {{-- <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">UX Research & Strategy</span> --}}
                    </div>
                    <h2 class="display-6 fw-bold mb-3">UX Research, Wireframing & User Journey Mapping</h2>
                    <p class="text-muted lead mb-3">
                        Conduct <strong>in-depth UX research</strong>, create detailed <strong>wireframes</strong>, and map <strong>user journeys</strong> to deliver intuitive experiences.
                    </p>
                    <p class="text-muted mb-4">
                        Our research-backed process ensures <strong>SEO-friendly design structure, smooth navigation, and improved conversion rates</strong>.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>User interviews, surveys, and analytics-driven insights</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Persona development and journey mapping workshops</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Low-fidelity and high-fidelity wireframes</span>
                        </li>
                    </ul>
                </div>
                <!-- Icon Grid Column -->
                <div class="col-lg-6 order-2 order-lg-2">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">User Research</h6>
                                        <small class="text-muted">Interviews, surveys, tests</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-project-diagram"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Journey Mapping</h6>
                                        <small class="text-muted">User flows, touchpoints</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-pencil-ruler"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Wireframing</h6>
                                        <small class="text-muted">Lo-fi & hi-fi layouts</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Personas</h6>
                                        <small class="text-muted">Target audience analysis</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 py-lg-6">
        <div class="container">
            <div class="row align-items-start g-5">
                <!-- Text Column -->
                <div class="col-lg-6 order-1 order-lg-1">
                    <div class="mb-3">
                        {{-- <span class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill">Interactive Prototyping</span> --}}
                    </div>
                    <h2 class="display-6 fw-bold mb-3">Prototyping with Figma & Adobe XD</h2>
                    <p class="text-muted lead mb-3">
                        Build <strong>interactive prototypes</strong> using <strong>Figma</strong> and <strong>Adobe XD</strong> to visualize design flows and test usability.
                    </p>
                    <p class="text-muted mb-4">
                        Our prototypes optimize <strong>responsive interactions, navigation patterns, and conversion funnels</strong>, reducing iterations and accelerating development.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>High-fidelity interactive prototypes with realistic animations</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Usability testing and feedback integration</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Developer-ready handoff and documentation</span>
                        </li>
                    </ul>
                </div>
                <!-- Icon Grid Column -->
                <div class="col-lg-6 order-2 order-lg-2">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fab fa-figma"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Figma Design</h6>
                                        <small class="text-muted">Collaborative design tool</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-tools"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Adobe XD</h6>
                                        <small class="text-muted">Professional prototyping</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-mouse"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Interactive Flows</h6>
                                        <small class="text-muted">Micro-interactions</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-vial"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Usability Testing</h6>
                                        <small class="text-muted">Validation & feedback</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 py-lg-6 bg-light">
        <div class="container">
            <div class="row align-items-start g-5">
                <!-- Text Column -->
                <div class="col-lg-6 order-1 order-lg-1">
                    <div class="mb-3">
                        {{-- <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill">Component Library</span> --}}
                    </div>
                    <h2 class="display-6 fw-bold mb-3">Design System & Component Library</h2>
                    <p class="text-muted lead mb-3">
                        Develop comprehensive <strong>design systems</strong> that standardize UI components, typography, color schemes, and patterns.
                    </p>
                    <p class="text-muted mb-4">
                        A scalable design system ensures <strong>consistency, faster development, brand alignment, and maintainability</strong> across all platforms.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Reusable component libraries and pattern documentation</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Comprehensive brand guidelines and design tokens</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Developer handoff and component specification</span>
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
                                        <i class="fas fa-cube"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Components</h6>
                                        <small class="text-muted">Reusable, modular parts</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-font"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Typography</h6>
                                        <small class="text-muted">Font scale & hierarchy</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-palette"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Color Palette</h6>
                                        <small class="text-muted">Brand-aligned colors</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Documentation</h6>
                                        <small class="text-muted">Usage guidelines</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>









    <!-- What You Get -->
    <section class="py-5 py-lg-6 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                {{-- <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3 rounded-pill">Key Benefits</span> --}}
                <h3 class="fw-bold">What You Get</h3>
                <p class="text-muted mx-auto" style="max-width: 720px;">Comprehensive UI/UX design services that combine research, strategy, and modern design tools to create delightful user experiences.</p>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Intuitive Web & Mobile UI</h5>
                            <p class="text-muted mb-0">Engaging, responsive interfaces that enhance user experience across all devices.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Research-Driven Design</h5>
                            <p class="text-muted mb-0">UX research, user personas, and journey maps inform every design decision.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                        <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fas fa-cube"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Design Systems & Components</h5>
                            <p class="text-muted mb-0">Scalable, reusable component libraries for consistency and faster development.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Developer-Ready Handoff</h5>
                            <p class="text-muted mb-0">Complete documentation, specs, and Figma/XD files for seamless development.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick FAQ -->
            <div class="accordion mt-4" id="uiuxFaq">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            How long does a typical UI/UX design project take?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#uiuxFaq">
                        <div class="accordion-body text-muted">Timelines vary based on scope. A typical project takes 4-8 weeks for discovery, design, prototyping, and testing. We'll provide a detailed timeline during the initial consultation.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Do you provide design systems for existing products?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#uiuxFaq">
                        <div class="accordion-body text-muted">Yes! We audit existing designs, create component libraries, and establish design governance systems for mature products and teams.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Can you test our designs with real users?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#uiuxFaq">
                        <div class="accordion-body text-muted">Absolutely. We conduct moderated and unmoderated usability testing, A/B testing, and gather user feedback to validate and iterate on designs.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <!-- Why Choose Us -->

    @include('includes.why-choose-us')





    <!-- Call To Action -->
    <section class="position-relative py-5 py-lg-6 text-white overflow-hidden" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h4 class="display-6 fw-bold mb-3">Ready to Transform Your Digital Experience?</h4>
                    <p class="lead mb-4">Let's create intuitive, beautiful interfaces that delight your users and drive results.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="{{ url('contact-us') }}" class="btn btn-light btn-lg text-primary fw-bold px-5 py-3 rounded-pill shadow-lg">
                            <i class="fas fa-pencil-ruler me-2"></i>Start Your Design
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg fw-bold px-5 py-3 rounded-pill">
                            <i class="fas fa-phone me-2"></i>Schedule a Call
                        </a>
                    </div>
                    <div class="mt-3">
                        <small class="opacity-75"><i class="fas fa-check-circle me-2"></i>Free design consultation <i class="fas fa-check-circle mx-2"></i>Portfolio examples included</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services -->

          <section class="services py-5 bg-light">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="section-heading">Other Services</h2>

                <p class="section-description text-muted">

                    We empower businesses through expertly crafted <strong>web & app development</strong>,

                    <strong>SEO</strong>, <strong>branding</strong>, and <strong>marketing strategies</strong>. From

                    startups to large-scale enterprises in the US, Canada, and beyond, Fusioncentrix Solutions delivers

                    scalable and performance-driven digital services tailored to your vision.

                </p>

            </div>

            @include('includes.services')

        </div>

    </section>

@endsection

