@extends('layouts.app')



@section('content')

    <!-- Hero Banner -->

    <section class="py-5 text-center sub-hero bg-light">

        <div class="container">

            <h1 class="display-5 fw-bold">Tailored Custom Software Development Services</h1>

            <p class="lead">

                Delivering <b>CRM, ERP, SaaS applications, LMS, and custom software solutions</b> for businesses in the US, Canada, India, and worldwide. Our software ensures <b>scalability, efficiency, and SEO-friendly integrations</b> to streamline operations.

            </p>

        </div>

    </section>



    <!-- Service Overview -->

<section class="py-5">

    <div class="container">

        <div class="row align-items-center g-4">



            <!-- Text Column (left on desktop) -->

            <div class="col-md-6 order-1 order-md-1">

                <h2 class="mb-3">Enterprise & Business Applications</h2>

                <p class="text-muted lead">

                    Develop robust <b>CRM</b>, <b>ERP</b>, <b>HR & Payroll</b>, and <b>Inventory & Billing systems</b> 

                    to streamline operations, improve efficiency, and manage your business processes seamlessly.

                </p>

                <p class="text-muted">

                    Our solutions are designed for <b>scalability</b>, <b>security</b>, and <b>SEO-friendly interfaces</b>, 

                    enabling better decision-making and enhanced productivity.

                </p>

            </div>



            <!-- Image Column (right on desktop) -->

            <div class="col-md-6 order-2 order-md-2">

                <img src="{{ asset('assets/images/enterprise-apps.webp') }}" class="img-fluid"

                     alt="CRM, ERP, HR & Payroll, Inventory & Billing Systems"  loading="lazy">

            </div>



        </div>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="row align-items-center g-4">



            <!-- Image Column (left on desktop) -->

            <div class="col-md-6 order-2 order-md-1">

                <img src="{{ asset('assets/images/saas-apps.webp') }}" class="img-fluid"

                     alt="SaaS, Booking & LMS Applications"  loading="lazy">

            </div>



            <!-- Text Column (right on desktop) -->

            <div class="col-md-6 order-1 order-md-2">

                <h2 class="mb-3">SaaS & Custom Applications</h2>

                <p class="text-muted lead">

                    Create scalable <b>SaaS applications</b>, <b>Learning Management Systems (LMS)</b>, 

                    and <b>Booking & Reservation Systems</b> tailored to your users’ needs.

                </p>

                <p class="text-muted">

                    Each system is built for <b>user-friendly experience</b>, <b>mobile responsiveness</b>, and <b>SEO optimization</b>, 

                    ensuring high engagement and adoption.

                </p>

            </div>



        </div>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="row align-items-center g-4">



            <!-- Text Column (left on desktop) -->

            <div class="col-md-6 order-1 order-md-1">

                <h2 class="mb-3">Data & Legacy Solutions</h2>

                <p class="text-muted lead">

                    Modernize <b>legacy software</b> and integrate <b>custom APIs</b>, <b>middleware</b>, 

                    and <b>data dashboards & analytics tools</b> for smarter business insights.

                </p>

                <p class="text-muted">

                    Empower your team with <b>actionable analytics</b>, <b>seamless integrations</b>, 

                    and <b>efficient workflows</b>, all designed with performance and SEO in mind.

                </p>

            </div>



            <!-- Image Column (right on desktop) -->

            <div class="col-md-6 order-2 order-md-2">

                <img src="{{ asset('assets/images/data-analytics.webp') }}" class="img-fluid"

                     alt="Data Dashboards, Analytics, Legacy Software, Custom APIs"  loading="lazy">

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

                        <h5>Business Automation</h5>

                        <p class="text-muted">CRM, ERP, SaaS, and custom software solutions.</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="p-4 bg-white shadow rounded h-100">

                        <i class="fas fa-rocket fa-2x mb-3 text-success"></i>

                        <h5>Data & Insights</h5>

                        <p class="text-muted">Dashboards and analytics for smarter decisions.</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="p-4 bg-white shadow rounded h-100">

                        <i class="fas fa-code fa-2x mb-3 text-warning"></i>

                        <h5>Secure & Scalable</h5>

                        <p class="text-muted">Reliable software optimized for growth.</p>

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

