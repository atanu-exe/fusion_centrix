@extends('layouts.app')



@section('content')

    <!-- Hero Banner -->


 <section class="fc-header">
        <div class="container">
            <div class="fc-header-content">
                <h1>Tailored Custom Software Development Services</h1>
                <p>Delivering <b>CRM, ERP, SaaS applications, LMS, and custom software solutions</b> for businesses in the US, Canada, India, and worldwide. Our software ensures <b>scalability, efficiency, and SEO-friendly integrations</b> to streamline operations.
                </p>
                <div class="fc-breadcrumb">
                    <a href="/">Home</a> / / <a href="{{ route('services') }}">Services </a> / <span>Custom Software Development</span>
                </div>
            </div>
        </div>
    </section>


    <!-- Service Overview -->
<section class="py-5 py-lg-6">
    <div class="container">
        <div class="row align-items-start g-5">
            <!-- Text Column -->
            <div class="col-lg-6 order-1 order-lg-1">
                <div class="mb-3">
                    {{-- <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">Enterprise Solutions</span> --}}
                </div>
                <h2 class="display-6 fw-bold mb-3">Enterprise & Business Applications</h2>
                <p class="text-muted lead mb-3">
                    Develop robust <strong>CRM</strong>, <strong>ERP</strong>, <strong>HR & Payroll</strong>, and <strong>Inventory & Billing systems</strong> to streamline operations and improve efficiency.
                </p>
                <p class="text-muted mb-4">
                    Built for <strong>scalability</strong>, <strong>security</strong>, and <strong>SEO-friendly interfaces</strong>, enabling better decision-making and enhanced productivity.
                </p>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                        <span>Role-based access, audit trails, and compliance-ready workflows</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                        <span>Custom dashboards and reporting for actionable insights</span>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                        <span>Integrations with accounting, ERP, and third-party APIs</span>
                    </li>
                </ul>
            </div>
            <!-- Icon Grid Column -->
            <div class="col-lg-6 order-2 order-lg-2">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                    <i class="fas fa-users-cog"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">CRM</h6>
                                    <small class="text-muted">Leads, pipelines, automation</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                    <i class="fas fa-industry"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">ERP</h6>
                                    <small class="text-muted">Operations, inventory, finance</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">HR & Payroll</h6>
                                    <small class="text-muted">Attendance, payroll, policies</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                    <i class="fas fa-receipt"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Inventory & Billing</h6>
                                    <small class="text-muted">Stock, invoices, GST/VAT</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 py-lg-6 bg-light">
    <div class="container">
        <div class="row align-items-start g-5">
            <!-- Text Column -->
            <div class="col-lg-6 order-1 order-lg-1">
                <div class="mb-3">
                    {{-- <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">SaaS & Custom Apps</span> --}}
                </div>
                <h2 class="display-6 fw-bold mb-3">SaaS & Custom Applications</h2>
                <p class="text-muted lead mb-3">
                    Create scalable <strong>SaaS</strong>, <strong>LMS</strong>, and <strong>Booking & Reservation</strong> systems tailored to your users’ needs.
                </p>
                <p class="text-muted mb-4">
                    Built for <strong>user-friendly experience</strong>, <strong>mobile responsiveness</strong>, and <strong>SEO optimization</strong> to drive adoption.
                </p>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                        <span>Multi-tenant architectures with secure data isolation</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                        <span>Subscription billing, trials, and usage-based pricing</span>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                        <span>Admin portals, roles, and analytics dashboards</span>
                    </li>
                </ul>
            </div>
            <!-- Icon Grid Column -->
            <div class="col-lg-6 order-2 order-lg-2">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                    <i class="fas fa-cloud"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">SaaS</h6>
                                    <small class="text-muted">Multi-tenant, subscriptions</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">LMS</h6>
                                    <small class="text-muted">Courses, quizzes, certs</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Booking</h6>
                                    <small class="text-muted">Slots, payments, reminders</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Security</h6>
                                    <small class="text-muted">Auth, RBAC, compliance</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 py-lg-6">
    <div class="container">
        <div class="row align-items-start g-5">
            <!-- Text Column -->
            <div class="col-lg-6 order-1 order-lg-1">
                <div class="mb-3">
                    {{-- <span class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill">Data & Legacy</span> --}}
                </div>
                <h2 class="display-6 fw-bold mb-3">Data & Legacy Solutions</h2>
                <p class="text-muted lead mb-3">
                    Modernize <strong>legacy software</strong> and integrate <strong>custom APIs</strong>, <strong>middleware</strong>, and <strong>analytics dashboards</strong> for smarter insights.
                </p>
                <p class="text-muted mb-4">
                    Empower teams with <strong>actionable analytics</strong>, <strong>seamless integrations</strong>, and <strong>efficient workflows</strong> — all performance-tuned.
                </p>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                        <span>Legacy migration with minimal downtime</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                        <span>ETL pipelines and data warehousing</span>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                        <span>API-first integration strategy</span>
                    </li>
                </ul>
            </div>
            <!-- Icon Grid Column -->
            <div class="col-lg-6 order-2 order-lg-2">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                    <i class="fas fa-database"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Data Pipelines</h6>
                                    <small class="text-muted">ETL, warehousing</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                    <i class="fas fa-plug"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">API Integrations</h6>
                                    <small class="text-muted">REST, GraphQL</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Dashboards</h6>
                                    <small class="text-muted">KPIs, reports</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Modernization</h6>
                                    <small class="text-muted">Refactor, migrate</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







    <!-- What You Get -->
    <section class="py-5 py-lg-6 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                {{-- <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3 rounded-pill">Key Benefits</span> --}}
                <h3 class="fw-bold">What You Get</h3>
                <p class="text-muted mx-auto" style="max-width: 720px;">A quick, skimmable overview with clear icons and short explanations — no heavy images, just simple stripes and FAQs.</p>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Business Automation</h5>
                            <p class="text-muted mb-0">CRM, ERP, SaaS, and custom workflows to automate operations.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Data & Insights</h5>
                            <p class="text-muted mb-0">Dashboards and analytics for smarter, data-driven decisions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                        <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Secure & Scalable</h5>
                            <p class="text-muted mb-0">Compliance-ready security, performance, and cloud-native scalability.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">User-Centric UX</h5>
                            <p class="text-muted mb-0">Mobile-first, accessible interfaces that make complex tasks simple.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick FAQ -->
            <div class="accordion mt-4" id="softwareFaq">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Can you integrate with our existing systems?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#softwareFaq">
                        <div class="accordion-body text-muted">Yes — we follow an API-first approach to connect ERPs, CRMs, accounting suites, and custom services.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How do you ensure performance and security?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#softwareFaq">
                        <div class="accordion-body text-muted">We ship optimized queries, caching, CDN, SSL, RBAC, audit logs, and align with PCI/GDPR where applicable.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Do you support cloud deployment?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#softwareFaq">
                        <div class="accordion-body text-muted">Absolutely — we deploy on AWS, Azure, or GCP with CI/CD pipelines and observability.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <!-- Why Choose Us -->

    @include('includes.why-choose-us')





    <!-- Call To Action -->
    <section class="position-relative py-5 py-lg-6 text-white overflow-hidden" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h4 class="display-6 fw-bold mb-3">Ready to Build Your Custom Software?</h4>
                    <p class="lead mb-4">From concept to launch, we deliver secure, scalable, and user-centric software tailored to your operations.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="{{ url('contact-us') }}" class="btn btn-light btn-lg text-primary fw-bold px-5 py-3 rounded-pill shadow-lg">
                            <i class="fas fa-rocket me-2"></i>Let's Get Started
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg fw-bold px-5 py-3 rounded-pill" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/fusioncentrix/30min?hide_event_type_details=1&hide_gdpr_banner=1'});return false;">
                            <i class="fas fa-phone me-2"></i>Schedule a Call
                        </a>
                    </div>
                    <div class="mt-3">
                        <small class="opacity-75"><i class="fas fa-check-circle me-2"></i>Free consultation <i class="fas fa-check-circle mx-2"></i>No commitment required</small>
                    </div>
                </div>
            </div>
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

