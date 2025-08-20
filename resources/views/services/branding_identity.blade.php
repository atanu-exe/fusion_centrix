@extends('layouts.app')

@section('content')
    <!-- Hero Banner -->
    <section class="py-5 text-center sub-hero bg-light">
        <div class="container">
            <h1 class="display-5 fw-bold">Creative Branding & Identity Services</h1>
            <p class="lead">
                Build a strong brand with <b>logo design, brand strategy, social media branding, business stationery, and marketing collateral</b> for businesses in the US, Canada, India, and globally. Our solutions are <b>consistent, professional, and SEO-conscious</b>.
            </p>
        </div>
    </section>

    <!-- Service Overview -->
  <section class="py-5">
    <div class="container">
        <div class="row align-items-center g-4">

            <!-- Text Column (left on desktop) -->
            <div class="col-md-6 order-md-1">
                <h2 class="mb-3">Logo Design</h2>
                <p class="text-muted lead">
                    Create a <b>memorable logo</b> that reflects your brand identity and makes a lasting impression on your audience.
                </p>
                <p class="text-muted">
                    Our designs focus on <b>SEO-friendly, versatile, and modern branding</b> that works across all platforms, enhancing recognition and trust.
                </p>
            </div>

            <!-- Image Column (right on desktop) -->
            <div class="col-md-6 order-md-2">
                <img src="{{ asset('assets/images/logo-design.png') }}" class="img-fluid"
                     alt="Logo Design">
            </div>

        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-4">

            <!-- Image Column (left on desktop) -->
            <div class="col-md-6 order-md-1">
                <img src="{{ asset('assets/images/brand-strategy.png') }}" class="img-fluid"
                     alt="Brand Strategy & Guidelines">
            </div>

            <!-- Text Column (right on desktop) -->
            <div class="col-md-6 order-md-2">
                <h2 class="mb-3">Brand Strategy & Guidelines</h2>
                <p class="text-muted lead">
                    Define your brand's voice, identity, and positioning with comprehensive <b>brand strategy</b> and <b>guidelines</b>.
                </p>
                <p class="text-muted">
                    Ensure consistent <b>visuals, messaging, and SEO-friendly branding</b> across all channels to strengthen recognition and customer trust.
                </p>
            </div>

        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-4">

            <!-- Text Column (left on desktop) -->
            <div class="col-md-6 order-md-1">
                <h2 class="mb-3">Business Cards, Stationery & Marketing Collateral</h2>
                <p class="text-muted lead">
                    Design professional <b>business cards, stationery</b>, and <b>marketing collateral</b> such as brochures, banners, and flyers to strengthen your brand presence.
                </p>
                <p class="text-muted">
                    All materials are <b>SEO-conscious, visually appealing, and consistent</b> with your brand identity to maximize recognition and engagement.
                </p>
            </div>

            <!-- Image Column (right on desktop) -->
            <div class="col-md-6 order-md-2">
                <img src="{{ asset('assets/images/branding-collateral.png') }}" class="img-fluid"
                     alt="Business Cards, Stationery, Marketing Collateral">
            </div>

        </div>
    </div>
</section>



    <!-- Features Section -->
    <section class="bg-light py-5 services">
        <div class="container">
            <h3 class="text-center mb-5">What You Get</h3>
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow rounded h-100">
                        <i class="fas fa-mobile-alt fa-2x mb-3 text-primary"></i>
                        <h5>Logo & Brand Strategy</h5>
                        <p class="text-muted">Memorable, professional brand identity.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow rounded h-100">
                        <i class="fas fa-rocket fa-2x mb-3 text-success"></i>
                        <h5>Marketing Collateral</h5>
                        <p class="text-muted">Business cards, stationery, and social media kits.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow rounded h-100">
                        <i class="fas fa-code fa-2x mb-3 text-warning"></i>
                        <h5>Consistent Visual Identity</h5>
                        <p class="text-muted">SEO-conscious and cohesive across channels.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <!-- Why Choose Us -->
    @include('includes.why-choose-us')


    <!-- Call To Action -->
    <section class="get-quote-section py-4 px-3 text-white text-center rounded-0 position-relative overflow-hidden">
        <div class="container">
            <h4 class="mb-2 fw-semibold">Ready to Build Your Next Website or App?</h4>
            <p class="mb-3 lead">From concept to launch, we design scalable, high-performance digital solutions tailored to
                your market</p>
            <a href="{{ url('contact-us') }}" class="btn btn-light text-dark fw-bold px-4 py-2 rounded-pill shadow-sm">Let’s
                Get Started</a>
        </div>
    </section>
    <!-- Related Services -->
    <section>
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-heading">Related Services</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card service-card text-center p-4 bg-white shadow rounded">
                        <div class="hover-overlay p-4">
                            <p class="text-white mb-3">
                                Custom online shops with intuitive UX, mobile optimization, and fast-loading
                                backend infrastructure.
                            </p>
                            <a href="{{ url('/services/web-app-development') }}" class="btn btn-gradient btn-sm">
                                Click to Read More
                            </a>
                        </div>
                        <i class="fas fa-shopping-cart fa-2x mb-3 text-success"></i>
                        <h3 class="h5">E-Commerce</h3>
                        <p class="text-muted lead">Sell smarter with secure, seamless stores</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card service-card text-center p-4 bg-white shadow rounded">
                        <div class="hover-overlay p-4">
                            <p class="text-white mb-3">
                                Full-funnel digital marketing, SEO campaigns, and brand amplification for
                                measurable growth.
                            </p>
                            <a href="{{ url('/services/web-app-development') }}" class="btn btn-gradient btn-sm">
                                Click to Read More
                            </a>
                        </div>
                        <i class="fas fa-bullhorn fa-2x mb-3 text-warning"></i>
                        <h3 class="h5">Marketing</h3>
                        <p class="text-muted lead">Boost visibility with strategic marketing</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card service-card text-center p-4 bg-white shadow rounded">
                        <div class="hover-overlay p-4">
                            <p class="text-white mb-3">
                                Enterprise-ready tools for workflow optimization, scalable processes, and
                                data-driven decision-making.
                            </p>
                            <a href="{{ url('/services/web-app-development') }}" class="btn btn-gradient btn-sm">
                                Click to Read More
                            </a>
                        </div>
                        <i class="fas fa-cogs fa-2x mb-3 text-info"></i>
                        <h3 class="h5">Custom Software</h3>
                        <p class="text-muted lead">Automate smarter. Operate better</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card service-card text-center p-4 bg-white shadow rounded">
                        <div class="hover-overlay p-4">
                            <p class="text-white mb-3">
                                Modern UI/UX, brand identity, and creative storytelling — from logos to full
                                digital design systems.
                            </p>
                            <a href="{{ url('/services/web-app-development') }}" class="btn btn-gradient btn-sm">
                                Click to Read More
                            </a>
                        </div>
                        <i class="fas fa-paint-brush fa-2x mb-3 text-danger"></i>
                        <h3 class="h5">Graphics &amp; UI</h3>
                        <p class="text-muted lead">Designs that speak your brand</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
