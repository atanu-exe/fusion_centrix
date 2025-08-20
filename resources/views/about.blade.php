@extends('layouts.app')

@section('content')
    <!-- Hero Banner -->
    <section class="py-5 text-center  sub-hero">
        <div class="container">
            <h1 class="display-5 fw-bold ">About Fusioncentrix Solutions</h1>
            <p class="lead">One-stop IT solutions crafted for scale, speed, and success.</p>
        </div>
    </section>

    <!-- Company Introduction -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('assets/images/about-team.png') }}" class="img-fluid" alt="About Illustration">
                </div>
                <div class="col-md-6">
                    <h2 class="section-heading">Who We Are</h2>
                    <p class="lead">Fusioncentrix Solutions is an India-based IT company focused on delivering scalable
                        web, app, and
                        digital marketing solutions — primarily to US-based clients. We specialize in creating value-driven
                        technology products that help businesses thrive in the digital age.</p>
                    <p>Founded by passionate tech enthusiasts, Fusioncentrix Solutions is built on innovation,
                        collaboration, and performance. We specialize in developing robust websites, scalable mobile
                        applications, and data-driven marketing strategies — all under one roof. Whether it’s SEO, branding,
                        or social media campaigns, we help global businesses grow with smart, reliable, and high-quality
                        digital solutions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-5 services">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 mb-4">
                    <div class="p-4 shadow rounded h-100 bg-white">
                        <h3 class="fw-bold mb-3">Our Mission</h3>
                        <img src="{{ asset('assets/images/mission.png') }}" alt="" style=" height: 200px;">
                        <p class="text-muted">To empower global businesses with scalable, secure, and intelligent digital
                            solutions — from custom software and web platforms to automation and IT consulting — that solve
                            real-world challenges and deliver measurable impact.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="p-4 shadow rounded h-100 bg-white">
                        <h3 class="fw-bold mb-3">Our Vision</h3>
                        <img src="{{ asset('assets/images/vision.png') }}" alt="" style=" height: 200px;">
                        <p class="text-muted">To be a trusted global technology partner, known for innovation, transparency,
                            and consistent delivery of high-performance IT services that help brands grow and succeed in the
                            digital era.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="section-heading mb-5">Our Core Values</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow h-100">
                        <img src="{{ asset('assets/images/innovation.png') }}" alt="Innovation" class="mb-3"
                            style="height: 100px;">
                        <h5 class="fw-bold">Innovation</h5>

                        <p class="text-muted">We turn bold ideas into cutting-edge solutions with future-ready technologies.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow h-100">
                        <img src="{{ asset('assets/images/collabration.png') }}" alt="Innovation" class="mb-3"
                            style="height: 100px;">
                        <h5 class="fw-bold">Collaboration</h5>

                        <p class="text-muted">We co-create with clients, blending vision and expertise for real impact.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow h-100">
                        <img src="{{ asset('assets/images/integrity.png') }}" alt="Innovation" class="mb-3"
                            style="height: 100px;">
                        <h5 class="fw-bold">Integrity</h5>


                        <p class="text-muted">We operate with transparency, ethics, and unwavering commitment to quality.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call To Action -->
    <section class="get-quote-section py-4 px-3 text-white text-center rounded-0 position-relative overflow-hidden">
        <div class="container">
            <h4 class="mb-2 fw-semibold">Ready to Take Your Digital Presence to the Next Level?</h4>
            <p class="mb-3 lead">Partner with Fusioncentrix Solutions — your one-stop IT powerhouse for high-performance
                websites, mobile apps, and digital marketing.
                Let’s build something exceptional.</p>
            <a href="{{ url('contact-us') }}" class="btn btn-light text-dark fw-bold px-4 py-2 rounded-pill shadow-sm">Get a
                Free
                Quote</a>
        </div>
    </section>
    <section class="py-5">
    <div class="container">
        <h2 class="mb-4 text-center">Frequently Asked Questions</h2>
        <div class="accordion" id="aboutFaqAccordion">

            <!-- FAQ 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                        What services does Fusion Centrix Solutions provide?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#aboutFaqAccordion">
                    <div class="accordion-body">
                        We offer <b>web & app development, e-commerce solutions, digital marketing, UI/UX design, custom software,</b> and <b>branding & identity services</b> for businesses in the US, Canada, India, and globally.
                    </div>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                        Who are your clients?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#aboutFaqAccordion">
                    <div class="accordion-body">
                        We work with <b>startups, SMEs, and large enterprises</b> across technology, e-commerce, healthcare, education, and marketing industries.
                    </div>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                        How long does a typical project take?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#aboutFaqAccordion">
                    <div class="accordion-body">
                        Most <b>web, app, and software projects</b> are completed within 4–12 weeks, depending on complexity and requirements.
                    </div>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                        Do you work with international clients?
                    </button>
                </h2>
                <div id="faq4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#aboutFaqAccordion">
                    <div class="accordion-body">
                        Yes, we serve clients globally, including the US, Canada, India, and other international markets, providing <b>tailored IT and digital solutions</b>.
                    </div>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                        How do you ensure quality and reliability?
                    </button>
                </h2>
                <div id="faq5" class="accordion-collapse collapse" aria-labelledby="faqHeading5" data-bs-parent="#aboutFaqAccordion">
                    <div class="accordion-body">
                        We follow <b>best coding practices, thorough testing, and regular maintenance</b> to ensure high-quality, reliable, and secure solutions for all clients.
                    </div>
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading6">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#faq6" aria-expanded="false" aria-controls="faq6">
                        How can I contact Fusion Centrix Solutions?
                    </button>
                </h2>
                <div id="faq6" class="accordion-collapse collapse" aria-labelledby="faqHeading6" data-bs-parent="#aboutFaqAccordion">
                    <div class="accordion-body">
                        You can reach us via our <b>contact form, email, or phone</b>. We respond promptly to all inquiries and project requests.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
