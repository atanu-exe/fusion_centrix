@extends('layouts.app')

@section('content')
    <!-- Hero Banner -->
    <section class="py-5 text-center sub-hero bg-light">
        <div class="container">
            <h1 class="display-5 fw-bold">Expert E-commerce Development Services</h1>
            <p class="lead">
                Build <b>custom e-commerce platforms</b> including <b>WooCommerce</b> and <b>Shopify</b> for businesses in the US, Canada, India, and worldwide. Our solutions ensure <b>secure transactions, optimized user experience, and SEO-friendly product listings</b>
            </p>
        </div>
    </section>

    <!-- Service Overview -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <!-- Text Column (left on desktop) -->
                <div class="col-md-6 order-md-1">
                    <h2 class="mb-3">Custom E-commerce Platforms</h2>
                    <p class="text-muted lead">
                        We build <strong>custom e-commerce platforms</strong> tailored to your business needs, ensuring
                        scalability, performance, and a seamless shopping experience for your customers.
                    </p>
                    <p class="text-muted">
                        Every platform is designed with <strong>SEO-friendly structure, responsive design, and fast
                            loading</strong>, helping you attract and retain customers efficiently.
                    </p>
                </div>

                <!-- Image Column (right on desktop) -->
                <div class="col-md-6 order-md-2">
                    <img src="{{ asset('assets/images/custom-ecommerce.png') }}" class="img-fluid"
                        alt="Custom E-commerce Platforms">
                </div>

            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <!-- Image Column (left on desktop) -->
                <div class="col-md-6 order-md-1">
                    <img src="{{ asset('assets/images/woocommerce-shopify.png') }}" class="img-fluid"
                        alt="WooCommerce and Shopify Development">
                </div>

                <!-- Text Column (right on desktop) -->
                <div class="col-md-6 order-md-2">
                    <h2 class="mb-3">WooCommerce & Shopify Development</h2>
                    <p class="text-muted lead">
                        Build scalable online stores using <strong>WooCommerce</strong> and <strong>Shopify</strong> with
                        custom designs, integrated apps, and smooth checkout processes.
                    </p>
                    <p class="text-muted">
                        Stores are <strong>SEO-optimized, mobile-friendly, and fast-loading</strong>, ensuring your
                        customers enjoy a seamless shopping experience while boosting your online sales.
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
                    <h2 class="mb-3">Inventory & Order Management Systems</h2>
                    <p class="text-muted lead">
                        Streamline your stock and order processes with <strong>efficient inventory management
                            systems</strong> designed for accuracy and speed.
                    </p>
                    <p class="text-muted">
                        Optimize your operations while keeping customers happy with <strong>real-time updates, automated
                            alerts, and seamless integration</strong>.
                    </p>
                </div>

                <!-- Image Column (right on desktop) -->
                <div class="col-md-6 order-md-2">
                    <img src="{{ asset('assets/images/inventory-management.png') }}" class="img-fluid"
                        alt="Inventory & Order Management Systems">
                </div>

            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <!-- Image Column (left on desktop) -->
                <div class="col-md-6 order-md-1">
                    <img src="{{ asset('assets/images/multi-vendor.png') }}" class="img-fluid"
                        alt="Multi-vendor Marketplace Setup">
                </div>

                <!-- Text Column (right on desktop) -->
                <div class="col-md-6 order-md-2">
                    <h2 class="mb-3">Multi-vendor Marketplace Setup</h2>
                    <p class="text-muted lead">
                        Launch <strong>multi-vendor marketplaces</strong> where multiple sellers can showcase products under
                        one platform.
                    </p>
                    <p class="text-muted">
                        Ensure <strong>easy management, SEO-friendly listings, and secure transactions</strong> while
                        providing customers with a diverse product catalog.
                    </p>
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
                        <h5>Custom Stores</h5>
                        <p class="text-muted">WooCommerce & Shopify solutions tailored to your brand.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow rounded h-100">
                        <i class="fas fa-rocket fa-2x mb-3 text-success"></i>
                        <h5>Inventory & Order Management</h5>
                        <p class="text-muted">Efficient multi-vendor and product handling.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow rounded h-100">
                        <i class="fas fa-code fa-2x mb-3 text-warning"></i>
                        <h5>Optimized Shopping Experience</h5>
                        <p class="text-muted">Fast, secure, and conversion-focused.</p>
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
