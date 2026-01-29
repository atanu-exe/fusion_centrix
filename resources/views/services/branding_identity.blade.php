@extends('layouts.app')



@section('content')
    <!-- Hero Banner -->

    <section class="fc-header">
        <div class="container">
            <div class="fc-header-content">
                <h1>Creative Branding & Identity Services</h1>
                <p>Build a strong brand with <b>logo design, brand strategy, social media branding, business stationery, and

                        marketing collateral</b> for businesses in the US, Canada, India, and globally. Our solutions are

                    <b>consistent, professional, and SEO-conscious</b>.
                </p>
                <div class="fc-breadcrumb">
                    <a href="/">Home</a>  / <a href="{{ route('services') }}">Services </a> / <span>Branding & Identity</span>
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
                        {{-- <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">Logo Design</span> --}}
                    </div>
                    <h2 class="display-6 fw-bold mb-3">Logo Design & Brand Mark</h2>
                    <p class="text-muted lead mb-3">
                        Create a <strong>memorable, versatile logo</strong> that embodies your brand and resonates with your target audience.
                    </p>
                    <p class="text-muted mb-4">
                        From concept sketches to final deliverables, we craft <strong>modern, scalable logos</strong> that work across web, print, and social media while maintaining brand recognition.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Unique, hand-crafted logo concepts tailored to your brand</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Multiple logo variations (horizontal, vertical, icon marks)</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Unlimited revisions until perfection</span>
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
                                        <i class="fas fa-pen-nib"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Custom Sketches</h6>
                                        <small class="text-muted">Hand-drawn concepts</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-bezier-curve"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Vector Design</h6>
                                        <small class="text-muted">Scalable graphics</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Multi-Format</h6>
                                        <small class="text-muted">Web, print, social</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Brand Files</h6>
                                        <small class="text-muted">AI, PNG, SVG, PDF</small>
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
                        {{-- <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">Brand Strategy</span> --}}
                    </div>
                    <h2 class="display-6 fw-bold mb-3">Brand Strategy & Identity Guidelines</h2>
                    <p class="text-muted lead mb-3">
                        Define your <strong>brand's unique voice, positioning, and values</strong> with a comprehensive brand strategy.
                    </p>
                    <p class="text-muted mb-4">
                        We create detailed <strong>brand guidelines</strong> that ensure visual and messaging consistency across all channels, from social media to packaging.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Competitive analysis and market positioning</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Brand story, mission, vision, and values definition</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Comprehensive brand guidelines (PDF & digital)</span>
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
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Brand Positioning</h6>
                                        <small class="text-muted">Market differentiation</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-message"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Brand Voice</h6>
                                        <small class="text-muted">Tone & messaging</small>
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
                                        <h6 class="mb-1">Visual Identity</h6>
                                        <small class="text-muted">Colors, typography</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Guidelines</h6>
                                        <small class="text-muted">Full documentation</small>
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
                        {{-- <span class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill">Marketing Materials</span> --}}
                    </div>
                    <h2 class="display-6 fw-bold mb-3">Business Cards, Stationery & Marketing Collateral</h2>
                    <p class="text-muted lead mb-3">
                        Design professional <strong>business cards, letterheads, envelopes</strong>, and <strong>marketing collateral</strong> that strengthen your brand presence.
                    </p>
                    <p class="text-muted mb-4">
                        From brochures and flyers to packaging and social media kits, all materials are <strong>cohesively designed, print-ready, and aligned</strong> with your brand identity.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Business cards, letterheads, and stationery suites</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Brochures, flyers, postcards, and banners</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Social media kits and email templates</span>
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
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Business Cards</h6>
                                        <small class="text-muted">Print-ready designs</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Stationery</h6>
                                        <small class="text-muted">Letterheads, envelopes</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-brochure"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Brochures & Flyers</h6>
                                        <small class="text-muted">Marketing materials</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-share-nodes"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Social Media</h6>
                                        <small class="text-muted">Brand kits & templates</small>
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
                {{-- <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3 rounded-pill">Key Deliverables</span> --}}
                <h3 class="fw-bold">What You Get</h3>
                <p class="text-muted mx-auto" style="max-width: 720px;">Comprehensive branding solutions that create a strong, cohesive identity across all customer touchpoints.</p>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fas fa-pen-nib"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Unique Logo Design</h5>
                            <p class="text-muted mb-0">Custom, memorable logo marks in multiple formats ready for print, web, and social media.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Brand Guidelines</h5>
                            <p class="text-muted mb-0">Comprehensive brand book with logo usage, color palette, typography, and tone of voice.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                        <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Marketing Collateral</h5>
                            <p class="text-muted mb-0">Business cards, letterheads, envelopes, and ready-to-print templates for consistency.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fas fa-share-nodes"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Social Media Kit</h5>
                            <p class="text-muted mb-0">Templates, brand assets, and guidelines for consistent online presence.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick FAQ -->
            <div class="accordion mt-4" id="brandingFaq">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            How many logo concepts will I receive?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#brandingFaq">
                        <div class="accordion-body text-muted">We typically present 3-5 unique logo concepts. Each concept includes multiple variations and refinements based on your feedback until you're satisfied.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            What file formats do I get for my logo?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#brandingFaq">
                        <div class="accordion-body text-muted">You receive editable AI files, as well as PNG, SVG, PDF, and JPG formats. All files are provided in both color and black-and-white versions.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Can you redesign my existing brand?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#brandingFaq">
                        <div class="accordion-body text-muted">Absolutely! We can modernize your existing brand, refresh your logo, or create a completely new identity while preserving brand equity if needed.</div>
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
                    <h4 class="display-6 fw-bold mb-3">Ready to Build Your Brand Identity?</h4>
                    <p class="lead mb-4">Let's create a memorable brand that stands out and connects with your audience.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="{{ url('contact-us') }}" class="btn btn-light btn-lg text-primary fw-bold px-5 py-3 rounded-pill shadow-lg">
                            <i class="fas fa-palette me-2"></i>Start Branding
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg fw-bold px-5 py-3 rounded-pill" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/fusioncentrix/30min?hide_event_type_details=1&hide_gdpr_banner=1'});return false;">
                            <i class="fas fa-phone me-2"></i>Schedule a Call
                        </a>
                    </div>
                    <div class="mt-3">
                        <small class="opacity-75"><i class="fas fa-check-circle me-2"></i>Free brand consultation <i class="fas fa-check-circle mx-2"></i>Logo samples included</small>
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
