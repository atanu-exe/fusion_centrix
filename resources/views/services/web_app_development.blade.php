@extends('layouts.app')

@section('content')
    <!-- Hero Banner -->
    <section class="py-5 text-center sub-hero bg-light">
        <div class="container">
            <h1 class="display-5 fw-bold">Professional Web & App Development Services</h1>
            <p class="lead">
                Delivering <b>custom web and mobile app development</b> for businesses in the US, Canada, India, and globally. We build <b>scalable, SEO-friendly, and high-performance websites and apps</b> tailored to your audience and business goals.
            </p>
        </div>
    </section>

    <!-- Service Overview -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/web-1.png') }}" class="img-fluid" alt="Web & App Development">
                </div>
                <div class="col-md-6">
                    <h2 class="mb-3">Web & App Development</h2>
                    <p class="text-muted lead">Build fast, scalable, and secure websites and mobile apps that deliver
                        exceptional
                        user experiences. We specialize in custom development tailored for global businesses targeting the
                        U.S., Canada, and beyond.</p>
                    <p class="text-muted">From concept to deployment, we ensure your product stands out with clean code,
                        intuitive UI, and seamless functionality.</p>
                    <a href="{{ url('contact-us') }}" class="btn btn-gradient mt-3">Get a Free Consultation</a>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <!-- Text Column (left on desktop) -->
                <div class="col-md-6 order-md-1">
                    <h2 class="mb-3">Expert CMS Development Services</h2>
                    <p class="text-muted lead">
                        Our <strong>CMS development</strong> services empower businesses to manage content
                        efficiently and effectively. We specialize in creating custom, scalable, and user-friendly
                        content management systems that allow you to update your website without any technical hurdles.
                    </p>
                    <p class="text-muted">
                        From WordPress, Drupal, and Joomla to fully custom CMS platforms, we ensure your website is
                        optimized for performance, <strong>SEO-friendly</strong>, and secure. Our solutions
                        enhance <strong>website management</strong>, streamline workflows, and improve overall user
                        experience,
                        helping your business thrive online.
                    </p>
                </div>

                <!-- Image Column (right on desktop) -->
                <div class="col-md-6 order-md-2">
                    <img src="{{ asset('assets/images/cms-development.png') }}" class="img-fluid"
                        alt="CMS Development Services for Businesses">
                </div>

            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <!-- Text Column (left on desktop) -->
                <div class="col-md-6 order-md-2">
                    <h2 class="mb-3">Professional Website Maintenance &amp; Optimization Services</h2>
                    <p class="text-muted lead">
                        Ensure your website is always fast, secure, and performing at its best with our
                        expert <strong>website maintenance</strong> and <strong>website optimization</strong> services.
                        We provide regular updates, bug fixes, and performance enhancements to deliver a seamless
                        <strong>user experience</strong> across all devices.
                    </p>
                    <p class="text-muted">
                        Our services include <strong>website performance tuning</strong>, <strong>security updates</strong>,
                        <strong>SEO improvements</strong>, and content optimization, helping your website rank higher
                        in search engines while keeping visitors engaged. Trust us to maintain your digital presence
                        with precision and reliability.
                    </p>
                </div>

                <!-- Image Column (right on desktop) -->
                <div class="col-md-6 order-md-1">
                    <img src="{{ asset('assets/images/website-maintenance.png') }}" class="img-fluid"
                        alt="Professional Website Maintenance and Optimization Services">
                </div>

            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <!-- Text Column (left on desktop) -->
                <div class="col-md-6 order-md-1">
                    <h2 class="mb-3">Responsive Web Design Services</h2>
                    <p class="text-muted lead">
                        Our <strong>responsive web design</strong> services ensure your website looks and functions
                        perfectly
                        on all devices — desktops, tablets, and smartphones. We focus on creating user-friendly interfaces
                        that adapt seamlessly to any screen size, delivering a consistent and engaging <strong>user
                            experience</strong>.
                    </p>
                    <p class="text-muted">
                        By combining modern design principles with <strong>SEO-friendly</strong> layouts and fast-loading
                        pages,
                        we help your business reach a wider audience and keep visitors engaged. Every design is crafted to
                        reflect your brand identity while maximizing usability and accessibility.
                    </p>
                </div>

                <!-- Image Column (right on desktop) -->
                <div class="col-md-6 order-md-2">
                    <img src="{{ asset('assets/images/responsive-web-design.png') }}" class="img-fluid"
                        alt="Responsive Web Design Services">
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
                        <h5>SEO & Responsive Design</h5>
                        <p class="text-muted">Fully SEO-friendly and optimized for all devices.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow rounded h-100">
                        <i class="fas fa-rocket fa-2x mb-3 text-success"></i>
                        <h5>High Performance</h5>
                        <p class="text-muted">Fast-loading, reliable, and smooth user experience.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow rounded h-100">
                        <i class="fas fa-code fa-2x mb-3 text-warning"></i>
                        <h5>Custom & Scalable Development</h5>
                        <p class="text-muted">Tailored solutions for growth.</p>
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
