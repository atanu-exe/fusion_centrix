@extends('layouts.app')



@section('content')

  <section class="fc-header">
        <div class="container">
            <div class="fc-header-content">
                <h1>Project Showcase</h1>
                <p>Our portfolio showcases a diverse range of projects, including web applications,

                e-commerce platforms, custom software, branding, and marketing campaigns.

                Each solution is designed to meet unique business needs while ensuring

                performance, scalability, and a seamless user experience.</p>
                <div class="fc-breadcrumb">
                    <a href="/">Home</a> / <span>Project Showcase</span>
                </div>
            </div>
        </div>
    </section>






    <section id="portfolio" class="fc-portfolio py-5">
        <div class="container">
            <div class="portfolio-head text-center mb-5">
                <span class="portfolio-badge">Work</span>
                <h2 class="section-heading">Selected launches across industries</h2>
                <p class="section-description text-muted">From SaaS dashboards to e-commerce and mobile apps, here are
                    builds where we owned strategy, design, and engineering.</p>
            </div>

            <div class="portfolio-meta row g-3 align-items-center mb-4">
                <div class="col-md-6">
                    <div class="portfolio-stats">
                        <div class="stat"><span class="stat-number">180+</span><span class="stat-label">Projects delivered</span></div>
                        <div class="stat"><span class="stat-number">12</span><span class="stat-label">Industries served</span></div>
                        <div class="stat"><span class="stat-number">24/7</span><span class="stat-label">Support & SLAs</span></div>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="portfolio-filters">
                        <span class="filter-chip active">All</span>
                        <span class="filter-chip">SaaS</span>
                        <span class="filter-chip">E-commerce</span>
                        <span class="filter-chip">Mobile</span>
                        <span class="filter-chip">Branding</span>
                    </div>
                </div>
            </div>

            <div class="portfolio-grid">
                <a class="portfolio-card" href="{{ asset('assets/images/portfolio/image1.jpg') }}" target="_blank">
                    <div class="card-media"><img src="{{ asset('assets/images/portfolio/thumb/image1.jpg') }}" alt="SaaS Dashboard" loading="lazy"></div>
                    <div class="card-body">
                        <div class="card-chip">SaaS</div>
                        <h5>SaaS Analytics Dashboard</h5>
                        <p>Multi-tenant analytics with role-based access and real-time KPIs.</p>
                        <div class="card-meta">Web App • React, Laravel, Postgres</div>
                    </div>
                </a>

                <a class="portfolio-card" href="{{ asset('assets/images/portfolio/image2.jpg') }}" target="_blank">
                    <div class="card-media"><img src="{{ asset('assets/images/portfolio/thumb/image2.jpg') }}" alt="E-commerce" loading="lazy"></div>
                    <div class="card-body">
                        <div class="card-chip">E-commerce</div>
                        <h5>Headless Commerce Revamp</h5>
                        <p>Improved conversion with headless storefront, A/B testing, and fast checkout.</p>
                        <div class="card-meta">Web • Vue, Laravel API, Stripe</div>
                    </div>
                </a>

                <a class="portfolio-card" href="{{ asset('assets/images/portfolio/image3.jpg') }}" target="_blank">
                    <div class="card-media"><img src="{{ asset('assets/images/portfolio/thumb/image3.jpg') }}" alt="Healthcare" loading="lazy"></div>
                    <div class="card-body">
                        <div class="card-chip">Healthcare</div>
                        <h5>Patient Engagement Portal</h5>
                        <p>Secure portal with telehealth scheduling, messaging, and lab results.</p>
                        <div class="card-meta">Web • Laravel, Livewire, AWS</div>
                    </div>
                </a>

                <a class="portfolio-card" href="{{ asset('assets/images/portfolio/image4.jpg') }}" target="_blank">
                    <div class="card-media"><img src="{{ asset('assets/images/portfolio/thumb/image4.jpg') }}" alt="LMS" loading="lazy"></div>
                    <div class="card-body">
                        <div class="card-chip">LMS</div>
                        <h5>Learning Experience Platform</h5>
                        <p>Personalized learning paths, assessments, and instructor dashboards.</p>
                        <div class="card-meta">Web • Laravel, Inertia, MySQL</div>
                    </div>
                </a>

                <a class="portfolio-card" href="{{ asset('assets/images/portfolio/image5.jpg') }}" target="_blank">
                    <div class="card-media"><img src="{{ asset('assets/images/portfolio/thumb/image5.jpg') }}" alt="Mobile app" loading="lazy"></div>
                    <div class="card-body">
                        <div class="card-chip">Mobile</div>
                        <h5>On-demand Services App</h5>
                        <p>Consumer + provider apps with real-time tracking and wallet.</p>
                        <div class="card-meta">Mobile • Flutter, Firebase</div>
                    </div>
                </a>

                <a class="portfolio-card" href="{{ asset('assets/images/portfolio/image6.jpg') }}" target="_blank">
                    <div class="card-media"><img src="{{ asset('assets/images/portfolio/thumb/image6.jpg') }}" alt="Fintech" loading="lazy"></div>
                    <div class="card-body">
                        <div class="card-chip">Fintech</div>
                        <h5>Digital Banking Suite</h5>
                        <p>Account onboarding, payments, and compliance-ready audit trails.</p>
                        <div class="card-meta">Web • React, Node, Mongo</div>
                    </div>
                </a>

                <a class="portfolio-card" href="{{ asset('assets/images/portfolio/image7.jpg') }}" target="_blank">
                    <div class="card-media"><img src="{{ asset('assets/images/portfolio/thumb/image7.jpg') }}" alt="Branding" loading="lazy"></div>
                    <div class="card-body">
                        <div class="card-chip">Branding</div>
                        <h5>Brand & Identity System</h5>
                        <p>Logo, guidelines, and web visuals for a global SaaS launch.</p>
                        <div class="card-meta">Design • Figma, Illustrator</div>
                    </div>
                </a>

                <a class="portfolio-card" href="{{ asset('assets/images/portfolio/image8.jpg') }}" target="_blank">
                    <div class="card-media"><img src="{{ asset('assets/images/portfolio/thumb/image8.jpg') }}" alt="Marketing" loading="lazy"></div>
                    <div class="card-body">
                        <div class="card-chip">Marketing</div>
                        <h5>Performance Landing Suite</h5>
                        <p>Conversion-focused landing pages with analytics and CRO loops.</p>
                        <div class="card-meta">Web • Next.js, Headless CMS</div>
                    </div>
                </a>

                <a class="portfolio-card" href="{{ asset('assets/images/portfolio/image9.jpg') }}" target="_blank">
                    <div class="card-media"><img src="{{ asset('assets/images/portfolio/thumb/image9.jpg') }}" alt="Logistics" loading="lazy"></div>
                    <div class="card-body">
                        <div class="card-chip">Logistics</div>
                        <h5>Fleet & Delivery Ops</h5>
                        <p>Route optimization, driver app, and live ETAs for urban delivery.</p>
                        <div class="card-meta">Web • Laravel, Maps APIs</div>
                    </div>
                </a>

                <a class="portfolio-card" href="{{ asset('assets/images/portfolio/image10.jpg') }}" target="_blank">
                    <div class="card-media"><img src="{{ asset('assets/images/portfolio/thumb/image10.jpg') }}" alt="CRM" loading="lazy"></div>
                    <div class="card-body">
                        <div class="card-chip">CRM</div>
                        <h5>Sales CRM Modernization</h5>
                        <p>Pipeline automation, forecasting, and integrations with marketing ops.</p>
                        <div class="card-meta">Web • Laravel, Vue, Redis</div>
                    </div>
                </a>

                <a class="portfolio-card" href="{{ asset('assets/images/portfolio/image11.jpg') }}" target="_blank">
                    <div class="card-media"><img src="{{ asset('assets/images/portfolio/thumb/image11.jpg') }}" alt="Hospitality" loading="lazy"></div>
                    <div class="card-body">
                        <div class="card-chip">Hospitality</div>
                        <h5>Booking & Concierge</h5>
                        <p>Property search, bookings, loyalty, and guest messaging.</p>
                        <div class="card-meta">Web • React, Laravel, MySQL</div>
                    </div>
                </a>

                <a class="portfolio-card" href="{{ asset('assets/images/portfolio/image12.jpg') }}" target="_blank">
                    <div class="card-media"><img src="{{ asset('assets/images/portfolio/thumb/image12.jpg') }}" alt="Marketplace" loading="lazy"></div>
                    <div class="card-body">
                        <div class="card-chip">Marketplace</div>
                        <h5>B2B Services Marketplace</h5>
                        <p>Vendor onboarding, RFQs, escrow payments, and reviews.</p>
                        <div class="card-meta">Web • Laravel, Alpine, Stripe</div>
                    </div>
                </a>

                <a class="portfolio-card" href="{{ asset('assets/images/portfolio/image13.jpg') }}" target="_blank">
                    <div class="card-media"><img src="{{ asset('assets/images/portfolio/thumb/image13.jpg') }}" alt="Analytics" loading="lazy"></div>
                    <div class="card-body">
                        <div class="card-chip">Analytics</div>
                        <h5>Embedded Analytics Suite</h5>
                        <p>White-label analytics with custom theming and permissions.</p>
                        <div class="card-meta">Web • React, Laravel, Supabase</div>
                    </div>
                </a>
            </div>

            <div class="portfolio-cta text-center mt-5">
                <h4>Want to see a detailed case study?</h4>
                <p class="text-muted mb-3">Tell us your industry and we’ll share relevant work with metrics and demos.</p>
                <a href="{{ url('contact-us') }}" class="btn btn-gradient">Request a case study</a>
            </div>
        </div>
    </section>
@endsection
