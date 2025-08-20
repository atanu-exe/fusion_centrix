@extends('layouts.app')

@section('content')
    <!-- Hero Banner -->
    <section class="py-5 text-center sub-hero bg-light">
        <div class="container">
            <h1 class="display-5 fw-bold">Comprehensive Digital Marketing Services</h1>
            <p class="lead">
                Boost your online presence with <b>SEO, social media marketing, PPC advertising, email automation, and content marketing</b> for businesses in the US, Canada, India, and globally. We help you generate <b>leads, increase conversions, and maximize ROI</b>.
            </p>
        </div>
    </section>

    <!-- Service Overview -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <!-- Text Column (left on desktop) -->
                <div class="col-md-6 order-md-1">
                    <h2 class="mb-3">SEO & Analytics Services</h2>
                    <p class="text-muted lead">
                        Our <strong>SEO services</strong> improve your website’s visibility on search engines. We handle
                        technical SEO, on-page optimization, and off-page strategies to drive organic traffic and improve
                        rankings.
                    </p>
                    <p class="text-muted">
                        With integrated <strong>Google Analytics</strong> tracking, we measure performance, monitor user
                        behavior,
                        and continuously refine strategies to maximize your online presence and ROI.
                    </p>
                </div>

                <!-- Image Column (right on desktop) -->
                <div class="col-md-6 order-md-2">
                    <img src="{{ asset('assets/images/seo-analytics.png') }}" class="img-fluid"
                        alt="SEO and Analytics Services">
                </div>

            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <div class="col-md-6 order-md-2">
                    <h2 class="mb-3">Social Media & Influencer Marketing</h2>
                    <p class="text-muted lead">
                        We grow your brand on social platforms like Instagram, Facebook, and LinkedIn, creating engaging
                        campaigns
                        that capture attention and build loyalty.
                    </p>
                    <p class="text-muted">
                        Our <strong>influencer marketing strategies</strong> connect you with key voices in your industry to
                        amplify reach and credibility, ensuring your brand resonates with the right audience.
                    </p>
                </div>

                <div class="col-md-6 order-md-1">
                    <img src="{{ asset('assets/images/social-influencer.png') }}" class="img-fluid"
                        alt="Social Media and Influencer Marketing Services">
                </div>

            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <div class="col-md-6 order-md-1">
                    <h2 class="mb-3">Paid Advertising & Conversion Optimization</h2>
                    <p class="text-muted lead">
                        Run effective <strong>Google Ads</strong> and <strong>Bing Ads</strong> campaigns targeting your
                        ideal audience to maximize ROI.
                    </p>
                    <p class="text-muted">
                        Our <strong>conversion optimization strategies</strong> and well-designed marketing funnels help
                        capture leads and turn visitors into loyal customers efficiently.
                    </p>
                </div>

                <div class="col-md-6 order-md-2">
                    <img src="{{ asset('assets/images/paid-conversions.png') }}" class="img-fluid"
                        alt="Paid Advertising and Conversion Optimization Services">
                </div>

            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <div class="col-md-6 order-md-2">
                    <h2 class="mb-3">Content Marketing & Automation</h2>
                    <p class="text-muted lead">
                        Engage your audience with high-quality <strong>blogs, copywriting, and video content</strong>
                        tailored to your brand voice and goals.
                    </p>
                    <p class="text-muted">
                        Automate communication with <strong>email campaigns</strong> that nurture leads, retain customers,
                        and drive consistent growth for your business.
                    </p>
                </div>

                <div class="col-md-6 order-md-1">
                    <img src="{{ asset('assets/images/content-automation.png') }}" class="img-fluid"
                        alt="Content Marketing and Automation Services">
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
                        <h5>SEO & Analytics</h5>
                        <p class="text-muted">Boost rankings with on-page, off-page, and tracking.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow rounded h-100">
                        <i class="fas fa-rocket fa-2x mb-3 text-success"></i>
                        <h5>Social Media & PPC</h5>
                        <p class="text-muted">Effective campaigns on top platforms and ads.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow rounded h-100">
                        <i class="fas fa-code fa-2x mb-3 text-warning"></i>
                        <h5>Content & Lead Generation</h5>
                        <p class="text-muted">Email, blogs, influencer, and marketing funnels.</p>
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
