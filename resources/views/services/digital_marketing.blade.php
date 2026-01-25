@extends('layouts.app')

@section('content')

    <!-- Hero Banner -->
    <section class="fc-header">
        <div class="container">
            <div class="fc-header-content">
                <h1>Comprehensive Digital Marketing Services</h1>
                <p>Boost your online presence with <b>SEO, social media marketing, PPC advertising, email automation, and content marketing</b> for businesses in the US, Canada, India, and globally. We help you generate <b>leads, increase conversions, and maximize ROI</b>.</p>
                <div class="fc-breadcrumb">
                    <a href="/">Home</a> / <a href="{{ route('services') }}">Services </a> / <span>Digital Marketing</span>
                </div>
            </div>
        </div>
    </section>

    <!-- SEO & Analytics Section -->
    <section class="py-5 py-lg-6">
        <div class="container">
            <div class="row align-items-start g-5">
                <!-- Text Column -->
                <div class="col-lg-6 order-1 order-lg-1">
                    <div class="mb-3">
                        {{-- <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">Search Optimization</span> --}}
                    </div>
                    <h2 class="display-6 fw-bold mb-3">SEO & Search Engine Marketing</h2>
                    <p class="text-muted lead mb-3">
                        Dominate search results with <strong>comprehensive SEO services, technical optimization, and keyword strategy</strong> that drives sustainable organic traffic to your website.
                    </p>
                    <p class="text-muted mb-4">
                        Our <strong>search engine marketing specialists</strong> combine on-page and off-page optimization with advanced analytics to improve rankings, increase visibility, and generate qualified leads from search engines.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Technical SEO audits, site speed optimization, and mobile-first indexing</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Keyword research, on-page optimization, and content strategy</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Link building, competitor analysis, and SERP tracking</span>
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
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Keyword Research</h6>
                                        <small class="text-muted">Strategic targeting</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Technical SEO</h6>
                                        <small class="text-muted">Site performance</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-link"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Link Building</h6>
                                        <small class="text-muted">Authority growth</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Analytics & Reporting</h6>
                                        <small class="text-muted">Data-driven insights</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media Marketing Section -->
    <section class="py-5 py-lg-6 bg-light">
        <div class="container">
            <div class="row align-items-start g-5">
                <!-- Text Column -->
                <div class="col-lg-6 order-1 order-lg-1">
                    <div class="mb-3">
                        {{-- <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">Social Media Marketing</span> --}}
                    </div>
                    <h2 class="display-6 fw-bold mb-3">Social Media Marketing & Influencer Partnerships</h2>
                    <p class="text-muted lead mb-3">
                        Build a thriving community on <strong>Instagram, Facebook, LinkedIn, TikTok, and Twitter</strong> with our strategic social media marketing campaigns that drive engagement and brand loyalty.
                    </p>
                    <p class="text-muted mb-4">
                        We create <strong>engaging social content, manage community interactions, run paid social campaigns</strong>, and partner with influencers to amplify your reach and drive authentic engagement and conversions.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Social media strategy, content calendar, and brand voice development</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Community management, engagement tracking, and audience growth</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Influencer outreach, partnerships, and campaign management</span>
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
                                        <i class="fab fa-instagram"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Instagram & Facebook</h6>
                                        <small class="text-muted">Visual content campaigns</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fab fa-linkedin"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">LinkedIn & B2B</h6>
                                        <small class="text-muted">Professional networking</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Influencer Marketing</h6>
                                        <small class="text-muted">Brand partnerships</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-video"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Video & Reels</h6>
                                        <small class="text-muted">Viral content creation</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PPC Advertising Section -->
    <section class="py-5 py-lg-6">
        <div class="container">
            <div class="row align-items-start g-5">
                <!-- Text Column -->
                <div class="col-lg-6 order-1 order-lg-1">
                    <div class="mb-3">
                        {{-- <span class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill">Paid Advertising</span> --}}
                    </div>
                    <h2 class="display-6 fw-bold mb-3">PPC Advertising & Conversion Rate Optimization</h2>
                    <p class="text-muted lead mb-3">
                        Maximize your <strong>ROI with targeted Google Ads, Bing Ads, and Facebook Ads campaigns</strong> that reach your ideal customers at the right moment with precision targeting.
                    </p>
                    <p class="text-muted mb-4">
                        We combine <strong>strategic ad management, conversion optimization, A/B testing, and funnel analysis</strong> to turn visitors into qualified leads and paying customers with measurable ROAS.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Google Ads (Search, Display, Shopping) and Bing Ads management</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Landing page optimization and conversion funnel design</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>CRO testing, bid optimization, and ROAS tracking</span>
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
                                        <i class="fas fa-search-dollar"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Google Ads</h6>
                                        <small class="text-muted">Search & Display ads</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-shopping-bag"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Shopping & Product Ads</h6>
                                        <small class="text-muted">E-commerce campaigns</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-percent"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Conversion Optimization</h6>
                                        <small class="text-muted">A/B testing & CRO</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-funnel"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Funnel Analytics</h6>
                                        <small class="text-muted">ROI & ROAS tracking</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Marketing Section -->
    <section class="py-5 py-lg-6 bg-light">
        <div class="container">
            <div class="row align-items-start g-5">
                <!-- Text Column -->
                <div class="col-lg-6 order-1 order-lg-1">
                    <div class="mb-3">
                        {{-- <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill">Content & Automation</span> --}}
                    </div>
                    <h2 class="display-6 fw-bold mb-3">Content Marketing & Marketing Automation</h2>
                    <p class="text-muted lead mb-3">
                        Engage your audience with <strong>high-quality blog content, copywriting, video marketing, and thought leadership</strong> that drives authority, trust, and customer loyalty.
                    </p>
                    <p class="text-muted mb-4">
                        Automate your <strong>email marketing campaigns, lead nurturing, customer retention</strong>, and sales workflows to generate consistent revenue and improve customer lifetime value with personalized experiences.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>SEO-optimized blog posts, whitepapers, and case studies</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Email automation, segmentation, and nurture workflows</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span>Video content, podcasts, and multimedia storytelling</span>
                        </li>
                    </ul>
                </div>
                <!-- Icon Grid Column -->
                <div class="col-lg-6 order-2 order-lg-2">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Blog & Articles</h6>
                                        <small class="text-muted">SEO-optimized content</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-envelope-open"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Email Marketing</h6>
                                        <small class="text-muted">Campaigns & automation</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-video"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Video Content</h6>
                                        <small class="text-muted">Production & editing</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="fas fa-robot"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Automation Workflows</h6>
                                        <small class="text-muted">Lead nurturing & CRM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What You Get - 4 Modern Stripes with FAQ -->
    <section class="py-5 py-lg-6">
        <div class="container">
            <div class="text-center mb-5">
                {{-- <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3 rounded-pill">Results-Driven Services</span> --}}
                <h2 class="display-6 fw-bold mb-3">What You Get</h2>
                <p class="text-muted mx-auto" style="max-width: 720px;">A complete digital marketing strategy combining <strong>SEO</strong>, <strong>paid advertising</strong>, <strong>social media</strong>, <strong>content</strong>, and <strong>marketing automation</strong> for measurable growth and sustainable business results.</p>
            </div>

            <!-- 4 Modern Stripes -->
            <div class="row g-3 mb-5">
                <div class="col-md-6">
                    <div class="p-4  bg-opacity-5 border-start border-primary border-5 rounded-2 h-100">
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px; min-width: 50px;">
                                <i class="fas fa-search fs-6"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2">SEO Optimization & Organic Growth</h5>
                                <p class="text-muted mb-0">Improve search rankings, drive qualified organic traffic, establish long-term visibility, and dominate your target keywords in Google results.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4  bg-opacity-5 border-start border-success border-5 rounded-2 h-100">
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px; min-width: 50px;">
                                <i class="fas fa-chart-bar fs-6"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2">Targeted Paid Advertising</h5>
                                <p class="text-muted mb-0">Google Ads, Facebook Ads, and performance marketing campaigns that deliver measurable ROI and drive qualified leads to your business.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4  bg-opacity-5 border-start border-info border-5 rounded-2 h-100">
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px; min-width: 50px;">
                                <i class="fas fa-share-alt fs-6"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2">Social Media Presence</h5>
                                <p class="text-muted mb-0">Community building, brand engagement, strategic campaigns, and viral content across Instagram, Facebook, LinkedIn, TikTok, and Twitter.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4  bg-opacity-5 border-start border-warning border-5 rounded-2 h-100">
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px; min-width: 50px;">
                                <i class="fas fa-chart-line fs-6"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2">Measurable Results & Analytics</h5>
                                <p class="text-muted mb-0">Comprehensive reporting, KPI tracking, and data-driven strategy optimization with transparent monthly dashboards and actionable insights.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Digital Marketing Benefits FAQ -->
            <div class="bg-light rounded-3 p-4">
                <h3 class="fw-bold mb-4">Frequently Asked Questions About Digital Marketing</h3>
                <div class="accordion" id="marketingFaq">
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header" id="faqOne">
                            <button class="accordion-button bg-transparent fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fas fa-question-circle text-primary me-2"></i>How long does it take to see SEO results?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#marketingFaq">
                            <div class="accordion-body text-muted bg-white rounded">SEO is a long-term strategy with compound results. You can typically expect to see initial improvements in 3-6 months, with significant ranking growth and traffic increases in 6-12 months. Meanwhile, PPC campaigns show immediate results within days.</div>
                        </div>
                    </div>
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header" id="faqTwo">
                            <button class="accordion-button collapsed bg-transparent fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fas fa-question-circle text-primary me-2"></i>What's the typical cost of digital marketing services?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#marketingFaq">
                            <div class="accordion-body text-muted bg-white rounded">Costs vary based on services, goals, and competition level. We offer flexible packages starting from basic SEO audits ($500-2000) to comprehensive integrated strategies ($2000-10000+ monthly). Let's discuss your budget and business objectives to create a customized plan.</div>
                        </div>
                    </div>
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header" id="faqThree">
                            <button class="accordion-button collapsed bg-transparent fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="fas fa-question-circle text-primary me-2"></i>How do you measure marketing ROI and success?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#marketingFaq">
                            <div class="accordion-body text-muted bg-white rounded">We track KPIs like organic traffic growth, conversion rates, ROAS, lead quality, customer acquisition cost, and revenue impact. Monthly transparent reports provide actionable insights for ongoing optimization and strategy refinement based on real data.</div>
                        </div>
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
                    <h2 class="display-5 fw-bold mb-3">Ready to Grow Your Business with Digital Marketing?</h2>
                    <p class="lead mb-4 opacity-90">Let's create a data-driven marketing strategy that drives organic traffic, generates qualified leads, increases conversions, and maximizes your marketing ROI for sustainable growth.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="{{ url('contact-us') }}" class="btn btn-light btn-lg text-primary fw-bold px-5 py-3 rounded-pill shadow-lg">
                            <i class="fas fa-chart-line me-2"></i>Get Marketing Audit
                        </a>
                        <a href="{{ url('contact-us') }}" class="btn btn-outline-light btn-lg fw-bold px-5 py-3 rounded-pill">
                            <i class="fas fa-phone me-2"></i>Schedule Consultation
                        </a>
                    </div>
                    <div class="mt-4">
                        <small class="opacity-85"><i class="fas fa-check-circle me-2"></i>Free digital marketing audit <i class="fas fa-check-circle mx-2"></i>Customized strategy included <i class="fas fa-check-circle mx-2"></i>No commitment required</small>
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

