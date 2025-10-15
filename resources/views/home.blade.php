@extends('layouts.app')
@section('content')
    <script src="{{ asset('assets/js/particles.min.js') }}"></script>
    <section id="hero-section" class="hero-section position-relative text-white bg-gradient-dark d-flex align-items-center"
        role="banner" aria-label="Fusioncentrix Solutions Hero">
        <!-- Particles.js container -->
        <div id="particle-hero" class="position-absolute w-100 h-100 z-0" style="top: 0; left: 0;"></div>
        <img src="{{ asset('assets/images/hero-robot.webp') }}"
            alt="Illustration of digital services including development, SEO, and marketing" class="img-fluid" fetchpriority="high">
        <!-- Content over particles -->
        <div class="container position-relative z-1">
            <div class="row align-items-center">
                <!-- Text Content -->
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold">
                        Your Global IT Partner for Web, App Development, SEO & Brand Growth
                    </h1>
                    <p class="lead mt-3">
                        Delivering top-tier websites, apps, SEO, and brand promotion strategies — trusted by US, Canadian,
                        and global businesses, powered by our expert India-based team.
                    </p>
                    <a href="{{url('contact-us')}}" class="btn  btn-lg mt-4 button-consult" aria-label="Contact Fusioncentrix">Get Free
                        Consultation</a>
                </div>
                <!-- Image -->
                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                </div>
            </div>
        </div>
    </section>
    <section id="about-us" class="py-5 " role="region" aria-labelledby="about-heading">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column (Heading + Text) -->
                <div class="col-lg-6 order-2 order-lg-1">
                    <!-- Heading always above text -->
                    <h2 id="about-heading" class="section-heading mb-4">
                        About Fusioncentrix
                    </h2>
                    <p class="lead text-muted">
                        At <strong>Fusioncentrix Solutions</strong>, we are your one-stop destination for high-quality IT
                        services — proudly based in India and powering large-scale digital projects across the
                        <strong>US, Canada, and global markets</strong>.
                    </p>
                    <p class="text-muted">
                        From <strong>custom web/app development</strong> to <strong>SEO, digital branding, and
                            marketing</strong>, our expert team blends creativity with technology to deliver impactful
                        solutions. Whether it's sleek websites, high-converting campaigns, or brand-defining visuals —
                        we help businesses grow and inspire from every bit.
                    </p>
                    <div class="w-100 collab-btn">
                        <a href="{{url('contact-us')}}" class="btn btn-gradient mt-3">
                            Let’s Collaborate
                        </a>
                    </div>
                </div>
                <!-- Right Column (Image) -->
                <div class="col-lg-6 text-center order-1 order-lg-2 mb-3 mb-lg-0">
                    <img src="{{ asset('assets/images/about.webp') }}" alt="Fusioncentrix team working on digital solutions"
                        class="img-fluid mx-auto" loading="lazy" style="max-height: 400px;"  loading="lazy">
                </div>
            </div>
        </div>
    </section>
    <!-- Services -->
    <section class="services py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-heading">Our Services</h2>
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
    <section class="testimonials py-5 section-bg" id="testimonials">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-heading">What Our Clients Say</h2>
                <p class="lead text-muted">We’re proud to partner with global brands and startups alike — delivering
                    technology that drives business growth.</p>
            </div>
            <div class="card-wrap swiper swiper-testimonials">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="card swiper-slide" role="group" aria-label="1 / 5" data-swiper-slide-index="0">
                        <div class="testimonial-card p-4 rounded shadow-sm bg-light position-relative h-100">
                            <div class="mb-3">
                                <i class="bi bi-chat-quote-fill fs-1 text-success"></i>
                            </div>
                            <p class="text-muted small mb-4">“Working with Fusioncentrix was seamless from day one. They
                                delivered a clean, fast-loading web app that matched our goals exactly. Communication was
                                clear
                                and timelines were met.”</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/client.webp') }}" alt="Client"
                                    class="rounded-circle me-3"  loading="lazy">
                                <div>
                                    <strong class="text-dark">David Miller</strong><span> – Austin, USA</span><br>
                                    <small class="text-muted">Product Manager, <em>NovaSync Systems</em></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="card swiper-slide" style="" role="group" aria-label="2 / 5"
                        data-swiper-slide-index="1">
                        <div class="testimonial-card p-4 rounded shadow-sm bg-light position-relative h-100">
                            <div class="mb-3">
                                <i class="bi bi-chat-quote-fill fs-1 text-primary"></i>
                            </div>
                            <p class="text-muted small mb-4">“We hired Fusioncentrix for branding and UI design. They
                                really
                                understood our industry and gave us a sleek, modern identity that stood out. Highly
                                recommend
                                their design team.”</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/client.webp') }}" alt="Client"
                                    class="rounded-circle me-3"  loading="lazy">
                                <div>
                                    <strong class="text-dark">Jessica Li</strong><span> – Vancouver, Canada</span><br>
                                    <small class="text-muted">Founder, <em>Brightflow Software</em></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="card swiper-slide" style="" role="group" aria-label="3 / 5"
                        data-swiper-slide-index="2">
                        <div class="testimonial-card p-4 rounded shadow-sm bg-light position-relative h-100">
                            <div class="mb-3">
                                <i class="bi bi-chat-quote-fill fs-1 text-warning"></i>
                            </div>
                            <p class="text-muted small mb-4">“Our Google rankings improved noticeably within the first few
                                weeks. The SEO strategy from Fusioncentrix is clearly built on experience and real results,
                                not
                                just promises.”</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/client.webp') }}" alt="Client"
                                    class="rounded-circle me-3"  loading="lazy">
                                <div>
                                    <strong class="text-dark">Natalie Cruz</strong><span> – Miami, USA</span><br>
                                    <small class="text-muted">Marketing Lead, <em>Verda Naturals</em></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="card swiper-slide" style="" role="group" aria-label="4 / 5"
                        data-swiper-slide-index="3">
                        <div class="testimonial-card p-4 rounded shadow-sm bg-light position-relative h-100">
                            <div class="mb-3">
                                <i class="bi bi-chat-quote-fill fs-1 text-danger"></i>
                            </div>
                            <p class="text-muted small mb-4">“Being based in India, it was great to work with a
                                professional
                                local team that delivered international-quality results. Their support post-launch was quick
                                and
                                dependable.”</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/client.webp') }}" alt="Client"
                                    class="rounded-circle me-3"  loading="lazy">
                                <div>
                                    <strong class="text-dark">Abhishek Sharma</strong><span> – Mumbai, India</span><br>
                                    <small class="text-muted">Director, <em>LogiXpert Technologies</em></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="card swiper-slide" style="" role="group" aria-label="5 / 5"
                        data-swiper-slide-index="4">
                        <div class="testimonial-card p-4 rounded shadow-sm bg-light position-relative h-100">
                            <div class="mb-3">
                                <i class="bi bi-chat-quote-fill fs-1 text-info"></i>
                            </div>
                            <p class="text-muted small mb-4">“Fusioncentrix helped us clarify our digital marketing
                                strategy.
                                The campaign analytics, creative ads, and timely reporting made all the difference in
                                hitting
                                our quarterly goals.”</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/client.webp') }}" alt="Client"
                                    class="rounded-circle me-3"  loading="lazy">
                                <div>
                                    <strong class="text-dark">Alexandra R.</strong> <span> – Dubai, UAE</span><br>
                                    <small class="text-muted">CMO, <em>Luxora Global</em></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    @include('includes.why-choose-us')
    <section class="get-quote-section pb-4 px-3 text-white text-center rounded-0 position-relative overflow-hidden">
        <div class="container">
            <h4 class="mb-2 mt-3 fw-semibold">Ready to Elevate Your Brand?</h4>
            <p class="mb-3 lead">Let’s create something powerful together. Get your free quote today — fast, tailored, and
                results-driven.</p>
            <a href="{{ url('contact-us') }}" class="btn btn-light text-dark fw-bold px-4 py-2 rounded-pill shadow-sm">Get
                a Free
                Quote</a>
        </div>
    </section>
 <section class="featured-project pb-5">
    <div class="container">
        <h2 class="section-heading mb-5">Featured Project</h2>
        <div class="row align-items-center">
            <!-- Left Text -->
            <div class="col-md-6 mb-4 mb-md-0 order-2 order-md-1">
                <p class="text-muted">
                    We developed this high-performance mobile app solution by fusing modern UI/UX, a scalable custom
                    backend, and advanced security. Designed to deliver seamless user experiences, this project
                    showcases our ability to create apps that are fast, reliable, and built for growth.
                </p>
                <ul class="list-unstyled mt-3">
                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i>Mobile-first, fully
                        responsive design
                    </li>
                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Tailored admin dashboard
                        for real-time control
                    </li>
                    <li><i class="fas fa-check-circle text-primary me-2"></i> Optimized for speed and scalability</li>
                </ul>
                <!-- CTA Button -->
                <a href="{{ url('/portfolio') }}" class="btn btn-gradient mt-4 me-2">
                    See More Projects
                </a>
                <a href="{{ url('/contact-us') }}" class="btn btn-gradient mt-4">
                    Start Your Project
                </a>
            </div>
            <!-- Right Image -->
            <div class="col-md-6 order-1 order-md-2">
                <div class="home-portfolio-box swiper swiper-portfolio">
                    <div class="header swiper-wrapper">
                        <div class="project-image overflow-hidden swiper-slide">
                            <img src="{{ asset('assets/images/portfolio/image1.jpg') }}" alt="Featured Project"
                                class="img-fluid w-100"  loading="lazy">
                        </div>
                        <div class="project-image rounded overflow-hidden swiper-slide">
                            <img src="{{ asset('assets/images/portfolio/image2.jpg') }}" alt="Featured Project"
                                class="img-fluid w-100"  loading="lazy">
                        </div>
                        <div class="project-image rounded overflow-hidden swiper-slide">
                            <img src="{{ asset('assets/images/portfolio/image3.jpg') }}" alt="Featured Project"
                                class="img-fluid w-100"  loading="lazy">
                        </div>
                        <div class="project-image rounded overflow-hidden swiper-slide">
                            <img src="{{ asset('assets/images/portfolio/image4.jpg') }}" alt="Featured Project"
                                class="img-fluid w-100"  loading="lazy">
                        </div>
                        <div class="project-image overflow-hidden swiper-slide">
                            <img src="{{ asset('assets/images/portfolio/image5.jpg') }}" alt="Featured Project"
                                class="img-fluid w-100"  loading="lazy">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
    <section class="technologies py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-heading">Technologies We Work With</h2>
                <p class="text-muted">From powerful backend frameworks to sleek frontend libraries, we leverage the latest
                    and most reliable technologies to build fast, secure, and scalable digital solutions. Whether it’s a
                    custom web app, a mobile-first platform, or cloud-based architecture — our tech stack is tailored to
                    meet your business goals with precision.</p>
            </div>
            <div class="row text-center gy-4">
                <!-- Tech Item -->
                <div class="col-4 col-md-3">
                    <div class="tech-icon">
                        <i class="fab fa-html5 fa-2x text-danger"></i>
                        <p class="mt-2  text-center">HTML5</p>
                    </div>
                </div>
                <div class="col-4 col-md-3">
                    <div class="tech-icon">
                        <i class="fab fa-css3-alt fa-2x text-primary"></i>
                        <p class="mt-2  text-center">CSS3</p>
                    </div>
                </div>
                <div class="col-4 col-md-3">
                    <div class="tech-icon">
                        <i class="fab fa-js-square fa-2x text-warning"></i>
                        <p class="mt-2  text-center">JavaScript</p>
                    </div>
                </div>
                <div class="col-4 col-md-3">
                    <div class="tech-icon">
                        <i class="fab fa-laravel fa-2x text-danger"></i>
                        <p class="mt-2  text-center">Laravel</p>
                    </div>
                </div>
                <div class="col-4 col-md-3">
                    <div class="tech-icon">
                        <i class="fab fa-php fa-2x text-indigo"></i>
                        <p class="mt-2  text-center">PHP</p>
                    </div>
                </div>
                <div class="col-4 col-md-3">
                    <div class="tech-icon">
                        <i class="fab fa-react fa-2x text-info"></i>
                        <p class="mt-2  text-center">React</p>
                    </div>
                </div>
                <div class="col-4 col-md-3">
                    <div class="tech-icon">
                        <i class="fab fa-node-js fa-2x text-success"></i>
                        <p class="mt-2  text-center">Node.js</p>
                    </div>
                </div>
                <div class="col-4 col-md-3">
                    <div class="tech-icon">
                        <i class="fas fa-database fa-2x text-secondary"></i>
                        <p class="mt-2  text-center">MySQL</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Particle background
        particlesJS("particle-hero", {
            particles: {
                number: {
                    value: 100, // more particles for density
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: ["#00bcd4", "#0051ff", "#ffffff"]
                }, // multiple tech-style colors
                shape: {
                    type: ["circle", "triangle", "edge"], // diverse shapes
                    stroke: {
                        width: 0,
                        color: "#000000"
                    }
                },
                opacity: {
                    value: 0.9,
                    random: false,
                    anim: {
                        enable: false
                    }
                },
                size: {
                    value: 6,
                    random: true,
                    anim: {
                        enable: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 130,
                    color: "#00bcd4",
                    opacity: 0.6,
                    width: 2 // thicker lines
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: "none",
                    random: false,
                    straight: false,
                    out_mode: "out",
                    bounce: false
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: {
                        enable: true,
                        mode: "grab"
                    },
                    onclick: {
                        enable: true,
                        mode: "push"
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 200,
                        line_linked: {
                            opacity: 0.8
                        }
                    },
                    push: {
                        particles_nb: 5
                    }
                }
            },
            retina_detect: true
        });
    </script>
    <script>
        //js for testimonials
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.swiper-testimonials').forEach(function(swiperEl, index) {
                new Swiper(swiperEl, {
                    loop: true,
                    slidesPerView: 3, // ✅ Show 3 slides at once
                    spaceBetween: 20,
                    pagination: {
                        el: swiperEl.querySelector('.swiper-pagination'),
                        clickable: true,
                    },
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1
                        }, // mobile
                        768: {
                            slidesPerView: 2
                        }, // tablet
                        1024: {
                            slidesPerView: 3
                        } // desktop
                    }
                });
            });
            document.querySelectorAll('.swiper-portfolio').forEach(function(swiperEl, index) {
                new Swiper(swiperEl, {
                    loop: true,
                    spaceBetween: 20,
                    slidesPerView: 1, // default mobile view
                    pagination: {
                        el: swiperEl.querySelector('.swiper-pagination'),
                        clickable: true,
                    },
                    // navigation: {
                    //     nextEl: swiperEl.querySelector('.swiper-button-next'),
                    //     prevEl: swiperEl.querySelector('.swiper-button-prev'),
                    // },
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    //     breakpoints: {
                    //         768: {
                    //             slidesPerView: 2
                    //         }, // Tablet
                    //         1024: {
                    //             slidesPerView: 3
                    //         } // Desktop
                    //     }
                    // });
                });
            });
        });
    </script>
@endsection
