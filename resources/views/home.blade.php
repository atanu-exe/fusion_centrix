@extends('layouts.app')
@section('content')
    <script src="{{ asset('assets/js/particles.min.js') }}"></script>
    <section id="hero-section" class="fc-hero-section position-relative text-white d-flex align-items-center justify-content-center overflow-hidden"
        role="banner" aria-label="Fusioncentrix Solutions Hero">
        <!-- Animated Background -->
        {{-- <div id="particle-hero" class="position-absolute w-100 h-100 z-0" style="top: 0; left: 0;"></div> --}}
        
        <!-- Gradient Overlay -->
        <div id="particle-hero" class="fc-hero-overlay position-absolute w-100 h-100 z-1"></div>

        <!-- Hero Content -->
        <div class="container position-relative z-2">
            <div class="row align-items-center">
                <!-- Text Content -->
                <div class="col-lg-6 fc-hero-content mb-4 mb-lg-0">
                    <div class="fc-hero-badge mb-4">
                        <span>🚀 Digital Excellence</span>
                    </div>
                    <h1 class="fc-hero-title mb-3">
                        Your Global IT Partner for Web, App Development, SEO & Brand Growth
                    </h1>
                    <p class="fc-hero-subtitle mb-4">
                        Delivering top-tier websites, apps, SEO, and brand promotion strategies — trusted by US, Canadian, and global businesses, powered by our expert India-based team.
                    </p>
                    <div class="fc-hero-cta d-flex gap-3 flex-wrap">
                        <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary" aria-label="Get Free Consultation">
                            <span>Get Free Consultation</span>
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="{{ url('portfolio') }}" class="fc-btn fc-btn-secondary" aria-label="View Our Work">
                            <span>View Our Work</span>
                            <i class="fas fa-external-link-alt ms-2"></i>
                        </a>
                    </div>

                    <!-- Stats Section -->
                    {{-- <div class="fc-hero-stats mt-5 pt-4 border-top border-secondary border-opacity-25">
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="fc-stat">
                                    <h3 class="fc-stat-number">500+</h3>
                                    <p class="fc-stat-label">Projects Delivered</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="fc-stat">
                                    <h3 class="fc-stat-number">98%</h3>
                                    <p class="fc-stat-label">Client Satisfaction</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <!-- Hero Image -->
                <div class="col-lg-6 text-center fc-hero-image">
                    <div class="fc-hero-image-wrapper">
                        <!-- Bubble Effects -->
                        {{-- <div class="fc-bubble fc-bubble-1"></div>
                        <div class="fc-bubble fc-bubble-2"></div>
                        <div class="fc-bubble fc-bubble-3"></div>
                        <div class="fc-bubble fc-bubble-4"></div>
                        <div class="fc-bubble fc-bubble-5"></div> --}}
                        
                        <img src="{{ asset('assets/images/hero-robot.webp') }}"
                            alt="Illustration of digital services including development, SEO, and marketing" class="img-fluid fc-hero-img-fixed" fetchpriority="high">
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Elements -->
        <div class="fc-hero-float fc-float-1"></div>
        <div class="fc-hero-float fc-float-2"></div>
        <div class="fc-hero-float fc-float-3"></div>

        <!-- Scroll Indicator -->
        <div class="fc-scroll-indicator">
            <span></span>
        </div>
    </section>
    
    <section id="about-us" class="py-5 " role="region" aria-labelledby="about-heading">
        <div class="container">
            <div class="row align-items-center gy-4">
                <!-- Image Column - Comes First on Mobile -->
                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                    <div class="about-image-wrapper">
                        <img src="{{ asset('assets/images/about.webp') }}" 
                             alt="Fusioncentrix team working on digital solutions"
                             class="img-fluid about-image" 
                             loading="lazy">
                    </div>
                </div>
                
                <!-- Text Column -->
                <div class="col-lg-7 col-md-6">
                    <!-- Heading -->
                    <h2 id="about-heading" class="section-heading mb-4">
                        About Fusioncentrix
                    </h2>
                    
                    <!-- Description -->
                    <p class="lead text-muted mb-3">
                        At <strong>Fusioncentrix Solutions</strong>, we are your one-stop destination for high-quality IT
                        services — proudly based in India and powering large-scale digital projects across the
                        <strong>US, Canada, and global markets</strong>.
                    </p>
                    
                    <p class="text-muted mb-4">
                        From <strong>custom web/app development</strong> to <strong>SEO, digital branding, and
                            marketing</strong>, our expert team blends creativity with technology to deliver impactful
                        solutions. Whether it's sleek websites, high-converting campaigns, or brand-defining visuals —
                        we help businesses grow and inspire from every bit.
                    </p>
                    
                    <!-- CTA Button -->
                    <div class="collab-btn">
                        <a href="{{url('contact-us')}}" class="btn btn-gradient">
                            Let's Collaborate
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services -->
    <section id="services" class="services py-5 bg-light" role="region" aria-labelledby="services-heading">
        <div class="container">
            <div class="text-center mb-5 services-header">
                <h2 id="services-heading" class="section-heading">Our Services</h2>
                <p class="section-description text-muted">
                    We empower businesses through expertly crafted <strong>web & app development</strong>,
                    <strong>SEO</strong>, <strong>branding</strong>, and <strong>marketing strategies</strong>. From
                    startups to large-scale enterprises in the US, Canada, and beyond, Fusioncentrix Solutions delivers
                    scalable and performance-driven digital services tailored to your vision.
                </p>
            </div>
            <div class="services-grid">
                @include('includes.services')
            </div>
        </div>
    </section>
    <section class="testimonials py-5" id="testimonials">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-heading">What Our Clients Say</h2>
                <p class="section-description text-muted">We partner with global brands and startups to deliver technology that drives business growth.</p>
            </div>
            <div class="card-wrap swiper swiper-testimonials">
                <div class="swiper-wrapper">
                    <div class="card swiper-slide" role="group" aria-label="1 / 5">
                        <div class="testimonial-card">
                            <span class="quote-icon text-success"><i class="bi bi-chat-quote-fill"></i></span>
                            <p class="testimonial-text">“Working with Fusioncentrix was seamless from day one. They delivered a clean, fast-loading web app that matched our goals exactly. Communication was clear and timelines were met.”</p>
                            <div class="testimonial-author">
                                <img src="{{ asset('assets/images/devid.webp') }}" alt="David Miller" loading="lazy">
                                <div>
                                    <strong>David Miller</strong><span> – Austin, USA</span>
                                    <small>Product Manager, <em>NovaSync Systems</em></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card swiper-slide" role="group" aria-label="2 / 5">
                        <div class="testimonial-card">
                            <span class="quote-icon text-primary"><i class="bi bi-chat-quote-fill"></i></span>
                            <p class="testimonial-text">“We hired Fusioncentrix for branding and UI design. They really understood our industry and gave us a sleek, modern identity that stood out. Highly recommend their design team.”</p>
                            <div class="testimonial-author">
                                <img src="{{ asset('assets/images/jessica.webp') }}" alt="Jessica Li" loading="lazy">
                                <div>
                                    <strong>Jessica Li</strong><span> – Vancouver, Canada</span>
                                    <small>Founder, <em>Brightflow Software</em></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card swiper-slide" role="group" aria-label="3 / 5">
                        <div class="testimonial-card">
                            <span class="quote-icon text-warning"><i class="bi bi-chat-quote-fill"></i></span>
                            <p class="testimonial-text">“Our Google rankings improved noticeably within the first few weeks. The SEO strategy from Fusioncentrix is clearly built on experience and real results, not just promises.”</p>
                            <div class="testimonial-author">
                                <img src="{{ asset('assets/images/natalie.webp') }}" alt="Natalie Cruz" loading="lazy">
                                <div>
                                    <strong>Natalie Cruz</strong><span> – Miami, USA</span>
                                    <small>Marketing Lead, <em>Verda Naturals</em></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card swiper-slide" role="group" aria-label="4 / 5">
                        <div class="testimonial-card">
                            <span class="quote-icon text-danger"><i class="bi bi-chat-quote-fill"></i></span>
                            <p class="testimonial-text">“Being based in India, it was great to work with a professional local team that delivered international-quality results. Their support post-launch was quick and dependable.”</p>
                            <div class="testimonial-author">
                                <img src="{{ asset('assets/images/abhisekh-sharma.webp') }}" alt="Abhishek Sharma" loading="lazy">
                                <div>
                                    <strong>Abhishek Sharma</strong><span> – Mumbai, India</span>
                                    <small>Director, <em>LogiXpert Technologies</em></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card swiper-slide" role="group" aria-label="5 / 5">
                        <div class="testimonial-card">
                            <span class="quote-icon text-info"><i class="bi bi-chat-quote-fill"></i></span>
                            <p class="testimonial-text">“Fusioncentrix clarified our digital marketing strategy. The campaign analytics, creative ads, and timely reporting made all the difference in hitting our quarterly goals.”</p>
                            <div class="testimonial-author">
                                <img src="{{ asset('assets/images/alexntra.webp') }}" alt="Alexandra R." loading="lazy">
                                <div>
                                    <strong>Alexandra R.</strong><span> – Dubai, UAE</span>
                                    <small>CMO, <em>Luxora Global</em></small>
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
    <section class="get-quote-section" id="get-quote">
        <div class="container">
            <div class="quote-card">
                <div class="row align-items-center gy-3">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h3 class="mb-2">Ready to Elevate Your Brand?</h3>
                        <p class="mb-0 text-white-50">Let’s create something powerful together. Fast, tailored, and results-driven.</p>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex justify-content-center justify-content-lg-end gap-3 flex-wrap">
                            <a href="{{ url('contact-us') }}" class="btn btn-gradient">Get a Free Quote</a>
                            <a href="{{ url('portfolio') }}" class="btn btn-ghost-light">View Portfolio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured-project py-5" id="featured-project">
        <div class="container">
            <div class="fp-card">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <span class="fp-badge">Case Study</span>
                        <h2 class="fp-title">High-Performance Mobile App</h2>
                        <p class="fp-text">
                            A scalable mobile experience combining modern UI/UX, a custom backend, and advanced security—built for growth and reliability.
                        </p>
                        <div class="fp-list">
                            <div class="fp-item"><i class="fas fa-check-circle text-primary me-2"></i>Mobile-first, fully responsive</div>
                            <div class="fp-item"><i class="fas fa-check-circle text-primary me-2"></i>Real-time admin dashboard</div>
                            <div class="fp-item"><i class="fas fa-check-circle text-primary me-2"></i>Optimized for speed & scale</div>
                        </div>
                        <div class="d-flex gap-3 flex-wrap mt-4">
                            <a href="{{ url('/portfolio') }}" class="btn btn-gradient">See More Projects</a>
                            <a href="{{ url('/contact-us') }}" class="btn btn-ghost-light">Start Your Project</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="fp-media swiper swiper-portfolio">
                            <div class="swiper-wrapper">
                                <div class="project-image overflow-hidden swiper-slide">
                                    <img src="{{ asset('assets/images/portfolio/image1.jpg') }}" alt="Featured Project" class="img-fluid w-100" loading="lazy">
                                </div>
                                <div class="project-image overflow-hidden swiper-slide">
                                    <img src="{{ asset('assets/images/portfolio/image2.jpg') }}" alt="Featured Project" class="img-fluid w-100" loading="lazy">
                                </div>
                                <div class="project-image overflow-hidden swiper-slide">
                                    <img src="{{ asset('assets/images/portfolio/image3.jpg') }}" alt="Featured Project" class="img-fluid w-100" loading="lazy">
                                </div>
                                <div class="project-image overflow-hidden swiper-slide">
                                    <img src="{{ asset('assets/images/portfolio/image4.jpg') }}" alt="Featured Project" class="img-fluid w-100" loading="lazy">
                                </div>
                                <div class="project-image overflow-hidden swiper-slide">
                                    <img src="{{ asset('assets/images/portfolio/image5.jpg') }}" alt="Featured Project" class="img-fluid w-100" loading="lazy">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="technologies py-5" id="technologies">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-heading">Technologies & Capabilities</h2>
                <p class="section-description text-muted">Full-stack delivery across web, apps, commerce, marketing, software, and brand experiences.</p>
            </div>

            <div class="tech-panels">
                <div class="tech-panel">
                    <div class="tech-meta">
                        <span class="tech-badge">Web</span>
                        <small>SEO / Performance</small>
                    </div>
                    <h5>Web Development</h5>
                    <p>High-performance, SEO-first sites built for global audiences.</p>
                    <div class="tech-pills">
                        <span class="tech-pill">Next.js</span><span class="tech-pill">Laravel</span><span class="tech-pill">Tailwind</span>
                    </div>
                </div>

                <div class="tech-panel">
                    <div class="tech-meta">
                        <span class="tech-badge">Apps</span>
                        <small>Cross-Platform</small>
                    </div>
                    <h5>App Development</h5>
                    <p>Native-feel mobile apps with smooth UX and offline-ready flows.</p>
                    <div class="tech-pills">
                        <span class="tech-pill">React Native</span><span class="tech-pill">Flutter</span><span class="tech-pill">API First</span>
                    </div>
                </div>

                <div class="tech-panel">
                    <div class="tech-meta">
                        <span class="tech-badge">Commerce</span>
                        <small>Growth</small>
                    </div>
                    <h5>E-Commerce</h5>
                    <p>Conversion-focused storefronts, funnels, and integrations.</p>
                    <div class="tech-pills">
                        <span class="tech-pill">Shopify</span><span class="tech-pill">WooCommerce</span><span class="tech-pill">Headless</span>
                    </div>
                </div>

                <div class="tech-panel">
                    <div class="tech-meta">
                        <span class="tech-badge">Marketing</span>
                        <small>Acquisition</small>
                    </div>
                    <h5>Digital Marketing</h5>
                    <p>Campaigns, analytics, automation, and performance reporting.</p>
                    <div class="tech-pills">
                        <span class="tech-pill">SEO</span><span class="tech-pill">SEM</span><span class="tech-pill">Automation</span>
                    </div>
                </div>

                <div class="tech-panel">
                    <div class="tech-meta">
                        <span class="tech-badge">Software</span>
                        <small>Custom</small>
                    </div>
                    <h5>Custom Software</h5>
                    <p>APIs, platforms, and integrations tailored to your workflows.</p>
                    <div class="tech-pills">
                        <span class="tech-pill">Microservices</span><span class="tech-pill">Integrations</span><span class="tech-pill">Cloud</span>
                    </div>
                </div>

                <div class="tech-panel">
                    <div class="tech-meta">
                        <span class="tech-badge">Design</span>
                        <small>Brand & UI/UX</small>
                    </div>
                    <h5>UI/UX & Branding</h5>
                    <p>Identity, logos, posters, and design systems that resonate.</p>
                    <div class="tech-pills">
                        <span class="tech-pill">Figma</span><span class="tech-pill">Brand Kits</span><span class="tech-pill">Motion</span>
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
