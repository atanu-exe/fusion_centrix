@extends('layouts.app')



@section('content')

    <!-- Hero Banner -->

    <section class="py-5 text-center sub-hero bg-light">

        <div class="container">

            <h1 class="display-5 fw-bold">Professional UI/UX Design Services</h1>

            <p class="lead">

               Create <b>intuitive web and mobile interfaces</b> with <b>UX research, wireframing, prototyping, and design systems</b> for businesses in the US, Canada, India, and globally. We focus on <b>user engagement, accessibility, and SEO-friendly design</b>.

            </p>

        </div>

    </section>



    <!-- Service Overview -->

    <section class="py-5">

        <div class="container">

            <div class="row align-items-center g-4">



                <!-- Text Column (left on desktop) -->

                <div class="col-md-6 order-2 order-md-1">

                    <h2 class="mb-3">Web & Mobile UI Design</h2>

                    <p class="text-muted lead">

                        Craft visually stunning <b>web and mobile interfaces</b> that enhance user experience and strengthen

                        your brand identity.

                    </p>

                    <p class="text-muted">

                        Every design is <b>responsive, intuitive, and SEO-friendly</b>, ensuring optimal performance across

                        all devices.

                    </p>

                </div>



                <!-- Image Column (right on desktop) -->

                <div class="col-md-6 order-1 order-md-2">

                    <img src="{{ asset('assets/images/ui-design.webp') }}" class="img-fluid" alt="Web & Mobile UI Design"  loading="lazy">

                </div>



            </div>

        </div>

    </section>

    <section class="py-5">

        <div class="container">

            <div class="row align-items-center g-4">



                <!-- Image Column (left on desktop) -->

                <div class="col-md-6 order-2 order-md-1">

                    <img src="{{ asset('assets/images/ux-research.webp') }}" class="img-fluid"

                        alt="UX Research & Wireframing, User Journey Mapping"  loading="lazy">

                </div>



                <!-- Text Column (right on desktop) -->

                <div class="col-md-6 order-1 order-md-2">

                    <h2 class="mb-3">UX Research, Wireframing & User Journey Mapping</h2>

                    <p class="text-muted lead">

                        Conduct <b>UX research</b>, create <b>wireframes</b>, and map <b>user journeys</b> to deliver an

                        intuitive and engaging digital experience.

                    </p>

                    <p class="text-muted">

                        Our process ensures <b>SEO-friendly design structure, smooth navigation, and improved user

                            engagement</b> for higher conversion rates.

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

                    <h2 class="mb-3">Prototyping (Figma, Adobe XD)</h2>

                    <p class="text-muted lead">

                        Build interactive <b>prototypes</b> using <b>Figma</b> and <b>Adobe XD</b> to visualize design flow

                        and test usability before development.

                    </p>

                    <p class="text-muted">

                        Our prototypes help optimize <b>SEO-friendly layouts, responsive interactions, and user

                            experience</b>, reducing design iterations and accelerating delivery.

                    </p>

                </div>



                <!-- Image Column (right on desktop) -->

                <div class="col-md-6 order-2 order-md-2">

                    <img src="{{ asset('assets/images/prototyping.webp') }}" class="img-fluid"

                        alt="Prototyping with Figma and Adobe XD"  loading="lazy">

                </div>



            </div>

        </div>

    </section>

    <section class="py-5">

        <div class="container">

            <div class="row align-items-center g-4">



                <!-- Image Column (left on desktop) -->

                <div class="col-md-6 order-2 order-md-1">

                    <img src="{{ asset('assets/images/design-system.webp') }}" class="img-fluid"

                        alt="Design System Creation"  loading="lazy">

                </div>



                <!-- Text Column (right on desktop) -->

                <div class="col-md-6 order-1 order-md-2">

                    <h2 class="mb-3">Design System Creation</h2>

                    <p class="text-muted lead">

                        Develop a comprehensive <b>design system</b> that standardizes UI components, typography, and color

                        schemes for consistency across all platforms.

                    </p>

                    <p class="text-muted">

                        A well-crafted design system ensures <b>SEO-friendly, scalable, and cohesive user interfaces</b> for

                        faster development and brand consistency.

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

                        <h5>Intuitive Web & Mobile UI</h5>

                        <p class="text-muted">Engaging interfaces that enhance UX.</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="p-4 bg-white shadow rounded h-100">

                        <i class="fas fa-rocket fa-2x mb-3 text-success"></i>

                        <h5>High Performance</h5>

                        <p class="text-muted">Wireframes, prototypes, and journey mapping.</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="p-4 bg-white shadow rounded h-100">

                        <i class="fas fa-code fa-2x mb-3 text-warning"></i>

                        <h5>Consistent Design Systems</h5>

                        <p class="text-muted">Scalable, brand-aligned interfaces.</p>

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

