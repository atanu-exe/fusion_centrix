@extends('layouts.app')



@section('content')
    <!-- Hero Banner -->
     <section class="fc-header">
        <div class="container">
            <div class="fc-header-content">
                <h1>Expert E-commerce Development Services</h1>
                <p>
                Build <b>custom e-commerce platforms</b> including <b>WooCommerce</b> and <b>Shopify</b> for businesses
                    in the US, Canada, India, and worldwide. Our solutions ensure <b>secure transactions, optimized user
                        experience, and SEO-friendly product listings</b> to drive sales and growth.
                        </p>
                <div class="fc-breadcrumb">
                    <a href="/">Home</a> / <a href="{{ route('services') }}">Services </a> / <span>E-commerce Development</span>
                </div>
            </div>
        </div>
    </section>


    <!-- Service Overview -->
    <section class="py-5 py-lg-6">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                {{-- <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3 rounded-pill">
                    <i class="fas fa-shopping-cart me-2"></i>Platform Development
                </span> --}}
                <h2 class="display-5 fw-bold mb-3">Custom E-commerce Platforms</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">
                    We build <strong>custom e-commerce platforms</strong> tailored to your business needs, ensuring
                    scalability, performance, and a seamless shopping experience that converts visitors into loyal customers.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-code fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Custom Development</h5>
                        <p class="text-muted small mb-0">Built from scratch using modern frameworks like Laravel, React, and Node.js. Every feature is designed specifically for your business model and customer needs.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-expand-arrows-alt fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Scalable Architecture</h5>
                        <p class="text-muted small mb-0">Cloud-ready infrastructure that grows with your business. Handle thousands of products and concurrent users without performance degradation.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-bolt fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Lightning Performance</h5>
                        <p class="text-muted small mb-0">Optimized for speed with lazy loading, CDN integration, and efficient caching. Fast load times improve SEO rankings and conversion rates.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-search-dollar fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">SEO Optimized</h5>
                        <p class="text-muted small mb-0">Built with SEO best practices including schema markup, meta tags, and clean URLs to help your products rank higher in search results.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 py-lg-6 bg-light">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                {{-- <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 mb-3 rounded-pill">
                    <i class="fab fa-shopify me-2"></i>Platform Expertise
                </span> --}}
                <h2 class="display-5 fw-bold mb-3">WooCommerce & Shopify Development</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">
                    Leverage the power of leading e-commerce platforms with <strong>custom designs, integrated apps, and smooth checkout processes</strong> that maximize conversions.
                </p>
            </div>
            <div class="row g-4 mb-5">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start mb-4">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 me-3">
                                    <i class="fab fa-wordpress fa-3x"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-2">WooCommerce Development</h4>
                                    <p class="text-muted mb-0">WordPress-powered flexibility</p>
                                </div>
                            </div>
                            <p class="text-muted mb-4">Transform your WordPress site into a powerful e-commerce store with WooCommerce. Perfect for businesses that want complete control and unlimited customization options.</p>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-start mb-3">
                                    <i class="fas fa-check-circle text-primary me-3 mt-1"></i>
                                    <span><strong>Custom Theme Development:</strong> Unique designs that match your brand perfectly with responsive layouts</span>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="fas fa-check-circle text-primary me-3 mt-1"></i>
                                    <span><strong>Plugin Integration:</strong> Payment gateways, shipping calculators, and marketing tools seamlessly integrated</span>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="fas fa-check-circle text-primary me-3 mt-1"></i>
                                    <span><strong>Product Variations:</strong> Unlimited attributes, options, and combinations for complex product catalogs</span>
                                </li>
                                <li class="d-flex align-items-start mb-0">
                                    <i class="fas fa-check-circle text-primary me-3 mt-1"></i>
                                    <span><strong>SEO & Performance:</strong> Optimized for search engines with fast loading speeds and mobile responsiveness</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start mb-4">
                                <div class="bg-success bg-opacity-10 text-success rounded-3 p-3 me-3">
                                    <i class="fab fa-shopify fa-3x"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-2">Shopify Development</h4>
                                    <p class="text-muted mb-0">All-in-one e-commerce solution</p>
                                </div>
                            </div>
                            <p class="text-muted mb-4">Launch your online store quickly with Shopify's robust platform. Ideal for businesses seeking a reliable, scalable solution with built-in hosting and security.</p>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-start mb-3">
                                    <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                                    <span><strong>Theme Customization:</strong> Tailor Shopify themes or build custom designs from scratch for unique branding</span>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                                    <span><strong>App Integration:</strong> Connect marketing, analytics, and automation tools from Shopify's extensive app store</span>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                                    <span><strong>Secure Payments:</strong> Built-in PCI compliance with support for 100+ payment gateways worldwide</span>
                                </li>
                                <li class="d-flex align-items-start mb-0">
                                    <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                                    <span><strong>Mobile Commerce:</strong> Responsive design and mobile app integration for shopping on-the-go</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 py-lg-6">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                {{-- <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 mb-3 rounded-pill">
                    <i class="fas fa-boxes me-2"></i>Inventory Solutions
                </span> --}}
                <h2 class="display-5 fw-bold mb-3">Inventory & Order Management Systems</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">
                    Streamline your operations with <strong>intelligent inventory management</strong> that reduces errors, saves time, and keeps customers satisfied with accurate stock information.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-sync-alt fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Real-time Synchronization</h5>
                            <p class="text-muted mb-0">Automatic inventory updates across all sales channels. When a product sells on your website, mobile app, or marketplace, stock levels adjust instantly preventing overselling.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-bell fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Smart Alerts & Notifications</h5>
                            <p class="text-muted mb-0">Get automated alerts for low stock levels, reorder points, and out-of-stock items. Set custom thresholds to maintain optimal inventory and never miss a sale.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-barcode fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Barcode & SKU Management</h5>
                            <p class="text-muted mb-0">Generate and scan barcodes for quick product identification. Track products with custom SKUs, manage variations, and organize inventory efficiently for faster fulfillment.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-clipboard-list fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Order Processing & Tracking</h5>
                            <p class="text-muted mb-0">Streamline order workflows from placement to delivery. Automated status updates, packing slips, shipping labels, and real-time tracking keep customers informed.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-warehouse fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Multi-warehouse Support</h5>
                            <p class="text-muted mb-0">Manage inventory across multiple warehouses or locations. Automatic routing to nearest warehouse reduces shipping costs and delivery times for customers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-secondary bg-opacity-10 text-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-chart-bar fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Analytics & Reporting</h5>
                            <p class="text-muted mb-0">Detailed insights on stock levels, sales velocity, and product performance. Make data-driven decisions about purchasing, promotions, and product discontinuation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 py-lg-6 bg-light">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                {{-- <span class="badge bg-info bg-opacity-10 text-info px-3 py-2 mb-3 rounded-pill">
                    <i class="fas fa-store-alt me-2"></i>Marketplace Solutions
                </span> --}}
                <h2 class="display-5 fw-bold mb-3">Multi-vendor Marketplace Setup</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">
                    Create powerful <strong>multi-vendor marketplaces</strong> like Amazon, Etsy, or eBay where multiple sellers manage their products while you earn commission on every transaction.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-tachometer-alt fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Vendor Dashboard</h5>
                            <p class="text-muted mb-0">Comprehensive seller panel for managing products, orders, inventory, and earnings. Each vendor has their own secure login with customizable permissions and branding options.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-percentage fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Commission Management</h5>
                            <p class="text-muted mb-0">Flexible commission structures with fixed rates, percentage-based, or tiered pricing. Automatic calculations, payment splits, and detailed financial reporting for transparency.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-user-check fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Vendor Verification</h5>
                            <p class="text-muted mb-0">Multi-step vendor approval process to maintain quality. Document verification, business validation, and review system ensure trustworthy sellers on your platform.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-credit-card fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Split Payment System</h5>
                            <p class="text-muted mb-0">Automated payment distribution to vendors after deducting commissions. Support for multiple payment gateways with scheduled payouts and transaction history.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-comments fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Review & Rating System</h5>
                            <p class="text-muted mb-0">Build trust with customer reviews for products and vendor ratings. Moderation tools, verified purchase badges, and response system for seller feedback management.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-secondary bg-opacity-10 text-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-shipping-fast fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Individual Shipping Rules</h5>
                            <p class="text-muted mb-0">Each vendor sets their own shipping methods, rates, and zones. Support for local pickup, free shipping thresholds, and integration with major shipping carriers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <!-- Features Section -->
    <section class="py-5 py-lg-6 position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#667eea" fill-opacity="0.05" d="M0,192L48,176C96,160,192,128,288,106.7C384,85,480,75,576,69.3C672,64,768,64,864,96C960,128,1056,192,1152,213.3C1248,235,1344,213,1392,202.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
        <div class="container position-relative">
            <div class="text-center mb-5" data-aos="fade-up">
                {{-- <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3 rounded-pill">Key Benefits</span> --}}
                <h2 class="display-5 fw-bold mb-3">What You Get</h2>
                <p class="lead text-muted mx-auto" style="max-width: 760px;">A quick, skimmable overview with clear icons and short explanations — no cards, just simple stripes and FAQs.</p>
            </div>

            <div class="mx-auto" style="max-width: 1000px;">
                <!-- Benefit Stripes (Side-by-side) -->
                <div class="row g-3" data-aos="fade-up">
                    <div class="col-md-6">
                        <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                <i class="fas fa-store"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Custom Stores</h5>
                                <p class="text-muted mb-0">WooCommerce & Shopify solutions tailored to your brand identity and business goals.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                <i class="fas fa-boxes"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Inventory & Orders</h5>
                                <p class="text-muted mb-0">Real-time sync, smart alerts, barcode/SKU support, and multi-location management.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Optimized Shopping</h5>
                                <p class="text-muted mb-0">Fast checkout, trust signals, and conversion-focused UX to maximize sales.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                            <div class="bg-info bg-opacity-10 text-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Secure Transactions</h5>
                                <p class="text-muted mb-0">PCI-ready payments, SSL, fraud prevention, and role-based access controls.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                            <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Mobile-First Design</h5>
                                <p class="text-muted mb-0">Responsive layouts optimized for smartphones, tablets, and desktops.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 p-md-4 bg-white shadow-sm rounded-3 d-flex align-items-start gap-3 h-100">
                            <div class="bg-secondary bg-opacity-10 text-secondary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Analytics & Insights</h5>
                                <p class="text-muted mb-0">Track sales, customer behavior, and performance metrics in real-time.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick FAQ -->
                <div class="accordion mt-4" id="benefitsFaq" data-aos="fade-up" data-aos-delay="150">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                How fast will my store load?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#benefitsFaq">
                            <div class="accordion-body text-muted">We optimize images, caching, and delivery via CDN, targeting sub‑2s load on modern devices.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Can I manage multiple warehouses?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#benefitsFaq">
                            <div class="accordion-body text-muted">Yes — we support multi-location stock, nearest‑warehouse routing, and separate shipping rules.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Is it SEO‑friendly from day one?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#benefitsFaq">
                            <div class="accordion-body text-muted">We ship clean URLs, meta tags, schema markup, and fast pages to help rankings.</div>
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
        <div class="container position-relative" data-aos="zoom-in">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-4">Ready to Launch Your E-commerce Store?</h2>
                    <p class="lead mb-4 fs-5">From concept to launch, we design scalable, high-performance e-commerce solutions tailored to your business needs</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="{{ url('contact-us') }}" class="btn btn-light btn-lg text-primary fw-bold px-5 py-3 rounded-pill shadow-lg hover-lift">
                            <i class="fas fa-rocket me-2"></i>Let's Get Started
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg fw-bold px-5 py-3 rounded-pill" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/fusioncentrix/30min?hide_event_type_details=1&hide_gdpr_banner=1'});return false;">
                            <i class="fas fa-phone me-2"></i>Schedule a Call
                        </a>
                    </div>
                    <div class="mt-4">
                        <small class="opacity-75"><i class="fas fa-check-circle me-2"></i>Free consultation <i class="fas fa-check-circle mx-2"></i>No commitment required</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services -->
    <section class="py-5 py-lg-6 bg-light">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                {{-- <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2 mb-3 rounded-pill">Explore More</span> --}}
                <h2 class="display-5 fw-bold mb-3">Other Services</h2>
                <p class="lead text-muted mx-auto" style="max-width: 900px;">
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
