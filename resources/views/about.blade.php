@extends('layouts.app')
@section('content')
    <!-- Modern Hero Header -->
    <section class="fc-header">
        <div class="container">
            <div class="fc-header-content">
                <h1>About Us</h1>
                <p>Delivering <b>CRM, ERP, SaaS applications, LMS, and custom software solutions</b> for businesses in the
                    US, Canada, India, and worldwide. Our software ensures <b>scalability, efficiency, and SEO-friendly
                        integrations</b> to streamline operations.
                </p>
                <div class="fc-breadcrumb">
                    <a href="/">Home</a> / <span>About Us</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section id="mission-vission" class="fc-mission-vision py-5">
        <div class="container">
            <div class="mv-head text-center mb-5">
                {{-- <span class="mv-badge">Mission & Vision</span> --}}
                <h2 class="section-heading">Building dependable tech, guided by purpose</h2>
                <p class="section-description text-muted">We align strategy, delivery, and support to keep your business
                    shipping, scaling, and winning.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="mv-card mission">
                        <div class="mv-icon"><i class="fas fa-rocket"></i></div>
                        <div class="mv-meta">
                            <span class="mv-chip">Mission</span>
                            <h3>Ship measurable value, faster</h3>
                            <p>Deliver scalable, secure, and intelligent solutions that turn roadmaps into shipped products
                                with clear outcomes.</p>
                        </div>
                        <div class="mv-stats">
                            <div class="mv-stat">
                                <div class="stat-title">Time-to-market</div>
                                <div class="stat-value">2x faster</div>
                            </div>
                            <div class="mv-stat">
                                <div class="stat-title">Uptime</div>
                                <div class="stat-value">99.9%</div>
                            </div>
                            <div class="mv-stat">
                                <div class="stat-title">NPS</div>
                                <div class="stat-value">+62</div>
                            </div>
                        </div>
                        <ul class="mv-list">
                            <li><i class="fas fa-check-circle"></i> Agile delivery with weekly demos and transparent
                                sprints.</li>
                            <li><i class="fas fa-check-circle"></i> Secure-by-design builds with audits and performance
                                budgets.</li>
                            <li><i class="fas fa-check-circle"></i> Data-driven decisions with analytics wired in from day
                                one.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mv-card vision">
                        <div class="mv-icon"><i class="fas fa-star"></i></div>
                        <div class="mv-meta">
                            <span class="mv-chip">Vision</span>
                            <h3>Be your long-term tech ally</h3>
                            <p>Partner as the trusted team known for transparent delivery, innovation, and resilient
                                platforms that grow with you.</p>
                        </div>
                        <div class="mv-stats">
                            <div class="mv-stat">
                                <div class="stat-title">Markets</div>
                                <div class="stat-value">US, CA, IN</div>
                            </div>
                            <div class="mv-stat">
                                <div class="stat-title">Domains</div>
                                <div class="stat-value">SaaS, E-comm, LMS</div>
                            </div>
                            <div class="mv-stat">
                                <div class="stat-title">Support</div>
                                <div class="stat-value">24/7</div>
                            </div>
                        </div>
                        <ul class="mv-list">
                            <li><i class="fas fa-check-circle"></i> Co-creation with your teams—strategy to rollout.</li>
                            <li><i class="fas fa-check-circle"></i> Platforms built for scale: cloud-native, API-first,
                                SEO-ready.</li>
                            <li><i class="fas fa-check-circle"></i> Continuous improvement with monitoring, feedback, and
                                optimizations.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section id="our-core-values" class="fc-values py-5">
        <div class="container">
            <div class="values-head text-center mb-5">
                {{-- <span class="values-badge">Core Values</span> --}}
                <h2 class="section-heading">Built on trust, driven by impact</h2>
                <p class="section-description text-muted">Six principles that shape how we partner, deliver, and grow with
                    our clients.</p>
            </div>

            <div class="values-stats row g-3 mb-4">
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-label">Client-first</div>
                        <div class="stat-number">100%</div>
                        <p class="stat-text">Clear communication, shared goals, and measurable outcomes.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-label">Delivery pace</div>
                        <div class="stat-number">2x</div>
                        <p class="stat-text">Agile teams, fast iterations, and on-time milestones.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-label">Reliability</div>
                        <div class="stat-number">24/7</div>
                        <p class="stat-text">Post-launch support, monitoring, and proactive fixes.</p>
                    </div>
                </div>
            </div>

            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon innovation"><i class="fas fa-lightbulb"></i></div>
                    <div>
                        <div class="value-chip">Innovation</div>
                        <h5>Inventive by default</h5>
                        <p>We turn bold ideas into solutions using the right mix of modern stacks and experimentation.</p>
                    </div>
                </div>
                <div class="value-card">
                    <div class="value-icon collaboration"><i class="fas fa-handshake"></i></div>
                    <div>
                        <div class="value-chip">Collaboration</div>
                        <h5>Co-create with you</h5>
                        <p>We blend your domain knowledge with our expertise to ship work that fits your market.</p>
                    </div>
                </div>
                <div class="value-card">
                    <div class="value-icon integrity"><i class="fas fa-shield-alt"></i></div>
                    <div>
                        <div class="value-chip">Integrity</div>
                        <h5>Transparent always</h5>
                        <p>Open updates, honest estimates, and accountable delivery in every sprint.</p>
                    </div>
                </div>
                <div class="value-card">
                    <div class="value-icon excellence"><i class="fas fa-crown"></i></div>
                    <div>
                        <div class="value-chip">Excellence</div>
                        <h5>Quality you can feel</h5>
                        <p>Performance, accessibility, security, and polish are baked into every release.</p>
                    </div>
                </div>
                <div class="value-card">
                    <div class="value-icon growth"><i class="fas fa-chart-line"></i></div>
                    <div>
                        <div class="value-chip">Growth</div>
                        <h5>Outcomes over outputs</h5>
                        <p>We measure success with adoption, retention, and ROI—not just shipped features.</p>
                    </div>
                </div>
                <div class="value-card">
                    <div class="value-icon support"><i class="fas fa-headset"></i></div>
                    <div>
                        <div class="value-chip">Support</div>
                        <h5>Here beyond launch</h5>
                        <p>Continuous improvements, observability, and quick response when you need us.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section id="about-why-choose-us" class="fc-why-choose py-5">
        <div class="container">
            <div class="awc-head text-center mb-5">
                {{-- <span class="awc-badge">Why Choose Us</span> --}}
                <h2 class="section-heading">Partners you can count on</h2>
                <p class="section-description text-muted">Full-stack delivery, transparent process, and long-term support
                    across every engagement.</p>
            </div>

            <div class="awc-highlight row g-3 mb-4">
                <div class="col-md-4">
                    <div class="awc-stat">
                        <div class="stat-label">Projects delivered</div>
                        <div class="stat-value">180+</div>
                        <p class="stat-note">Web, mobile, SaaS, and commerce builds.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="awc-stat">
                        <div class="stat-label">Avg. timeline gain</div>
                        <div class="stat-value">2x faster</div>
                        <p class="stat-note">Agile pods, weekly demos, zero surprises.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="awc-stat">
                        <div class="stat-label">Support coverage</div>
                        <div class="stat-value">24/7</div>
                        <p class="stat-note">Monitoring, SLAs, and proactive fixes.</p>
                    </div>
                </div>
            </div>

            <div class="awc-grid">
                <div class="awc-card">
                    <div class="awc-icon"><i class="fas fa-layer-group"></i></div>
                    <div>
                        <div class="awc-chip">End-to-end</div>
                        <h6>One team for all</h6>
                        <p>Strategy, UX, engineering, QA, DevOps, and growth in one squad.</p>
                    </div>
                </div>
                <div class="awc-card">
                    <div class="awc-icon"><i class="fas fa-globe"></i></div>
                    <div>
                        <div class="awc-chip">Global-ready</div>
                        <h6>Ship for US, CA, IN</h6>
                        <p>Timezone-friendly standups, compliance-aware builds, and localization.</p>
                    </div>
                </div>
                <div class="awc-card">
                    <div class="awc-icon"><i class="fas fa-bolt"></i></div>
                    <div>
                        <div class="awc-chip">Agile speed</div>
                        <h6>Fast without friction</h6>
                        <p>Short cycles, clear acceptance, and iterative releases.</p>
                    </div>
                </div>
                <div class="awc-card">
                    <div class="awc-icon"><i class="fas fa-shield-alt"></i></div>
                    <div>
                        <div class="awc-chip">Transparent</div>
                        <h6>See progress daily</h6>
                        <p>Roadmaps, burndowns, and open comms—no black boxes.</p>
                    </div>
                </div>
                <div class="awc-card">
                    <div class="awc-icon"><i class="fas fa-chart-line"></i></div>
                    <div>
                        <div class="awc-chip">Outcome-first</div>
                        <h6>Metrics that matter</h6>
                        <p>We optimize for adoption, retention, conversion, and ROI.</p>
                    </div>
                </div>
                <div class="awc-card">
                    <div class="awc-icon"><i class="fas fa-headset"></i></div>
                    <div>
                        <div class="awc-chip">Always-on</div>
                        <h6>Support beyond launch</h6>
                        <p>Runbooks, monitoring, and rapid-response maintenance.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Process -->
    <section id="project-process" class="fc-process-section py-5">
        <div class="container">
            <div class="pp-head text-center mb-5">
                {{-- <span class="pp-badge">Project Process</span> --}}
                <h2 class="section-heading">From idea to launch, with clarity</h2>
                <p class="section-description text-muted">A visible, trackable flow—each step builds momentum to
                    production.</p>
            </div>

            <div class="pp-progress">
                <div class="pp-step">
                    <div class="pp-node">1</div>
                    <h6>Discovery</h6>
                    <p>Workshops to align goals, users, scope, and success metrics.</p>
                    <div class="pp-meta">Owner: Product • 1–2 wks</div>
                </div>
                <div class="pp-step">
                    <div class="pp-node">2</div>
                    <h6>Design</h6>
                    <p>UX flows and UI prototypes validated quickly with stakeholders.</p>
                    <div class="pp-meta">Owner: Design • 1–2 wks</div>
                </div>
                <div class="pp-step">
                    <div class="pp-node">3</div>
                    <h6>Build</h6>
                    <p>Agile sprints, clean code, CI/CD, and frequent demos.</p>
                    <div class="pp-meta">Owner: Engineering • 2–6 wks</div>
                </div>
                <div class="pp-step">
                    <div class="pp-node">4</div>
                    <h6>Quality</h6>
                    <p>Functional, security, accessibility, and performance checks.</p>
                    <div class="pp-meta">Owner: QA • 1–2 wks</div>
                </div>
                <div class="pp-step">
                    <div class="pp-node">5</div>
                    <h6>Launch & Grow</h6>
                    <p>Release, observe, optimize, and support with SLAs.</p>
                    <div class="pp-meta">Owner: DevOps • Ongoing</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="get-quote-section fc-primary-bg" id="get-quote">
        <div class="container">
            <div class="quote-card">
                <div class="row align-items-center gy-3">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h3 class="display-5 fw-bold mb-3">Ready to Transform Your Digital Presence?</h3>
                        <p class="lead mb-4 opacity-90">Let's partner to create something extraordinary.</p>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex justify-content-center justify-content-lg-end gap-3 flex-wrap">
                            <a href="{{ url('contact-us') }}" class="btn btn-light btn-lg text-primary fw-bold px-5 py-3 rounded-pill shadow-lg">Get a Free Consultation</a>
                            {{-- <a href="{{ url('portfolio') }}" class="btn btn-ghost-light">View Portfolio</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Section -->
    <section id="faq" class="fc-faq py-5">
        <div class="container">
            <div class="faq-head text-center mb-5">
                <span class="faq-badge">Support & FAQs</span>
                <h2 class="section-heading">Answers before we start</h2>
                <p class="section-description text-muted">Quick answers to common questions. If you need something
                    specific, reach out and we'll tailor a response.</p>
            </div>
            <div class="row g-4 align-items-start">
                <div class="col-lg-4">
                    <div class="faq-card">
                        <h5>Need something specific?</h5>
                        <p class="mb-3 text-muted">Share your requirements and we’ll reply within 24 hours with next
                            steps.</p>
                        <ul class="faq-points">
                            <li><i class="fas fa-check-circle"></i> Scoping and discovery calls</li>
                            <li><i class="fas fa-check-circle"></i> Clear milestones and estimates</li>
                            <li><i class="fas fa-check-circle"></i> NDA-friendly engagement</li>
                        </ul>
                        <a href="{{ url('contact-us') }}" class="btn btn-gradient w-100 mt-3">Talk to our team</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="accordion faq-accordion" id="aboutFaqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button faq-toggle" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1">
                                    What services does Fusioncentrix Solutions provide?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show"
                                data-bs-parent="#aboutFaqAccordion">
                                <div class="accordion-body">
                                    We offer <strong>web & app development, e-commerce solutions, digital marketing, UI/UX
                                        design, custom software, and branding & identity services</strong> for businesses
                                    globally.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button faq-toggle collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Who are your typical clients?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#aboutFaqAccordion">
                                <div class="accordion-body">
                                    We work with <strong>startups, SMEs, and large enterprises</strong> across tech,
                                    e-commerce, healthcare, education, and marketing industries.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button faq-toggle collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq3">
                                    How long does a typical project take?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#aboutFaqAccordion">
                                <div class="accordion-body">
                                    Most projects are completed within <strong>4–12 weeks</strong>, depending on
                                    complexity and requirements.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button faq-toggle collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Do you work with international clients?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#aboutFaqAccordion">
                                <div class="accordion-body">
                                    Yes, we serve clients globally, including the <strong>US, Canada, India, and other
                                        international markets</strong>.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button faq-toggle collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq5">
                                    How do you ensure quality?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#aboutFaqAccordion">
                                <div class="accordion-body">
                                    We follow <strong>best coding practices, thorough testing, and regular
                                        maintenance</strong> to ensure high-quality, reliable solutions.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
