@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/v2/services.css') }}">

    <main>

        {{-- =========================================================
        HERO
    ========================================================== --}}
        <section class="fc-services-hero">
            <div class="fc-hero-grid"></div>

            <div class="container">
                <div class="row align-items-center g-5">

                    <div class="col-lg-6">

                        <div class="fc-services-eyebrow">
                            <span></span>
                            E-commerce Development
                        </div>

                        <h1 class="fc-services-title">
                            E-commerce <span>solutions</span> built for
                            <strong>growth.</strong>
                        </h1>

                        <p class="fc-services-description">
                            Build custom e-commerce platforms including
                            <strong>WooCommerce, Shopify, and custom solutions</strong>
                            designed for secure transactions, optimized user experiences,
                            SEO-friendly product listings, and scalable business growth.
                        </p>

                        <div class="fc-services-actions">
                            <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary">
                                Start a Conversation
                            </a>

                            <a href="{{ url('portfolio') }}" class="fc-btn fc-btn-dark-outline">
                                Explore Our Work
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="fc-services-orbit" aria-hidden="true">

                            <div class="fc-orbit orbit-one"></div>
                            <div class="fc-orbit orbit-two"></div>

                            <div class="fc-orbit-line line-one"></div>
                            <div class="fc-orbit-line line-two"></div>
                            <div class="fc-orbit-line line-three"></div>

                            <span class="fc-orbit-dot dot-one"></span>
                            <span class="fc-orbit-dot dot-two"></span>
                            <span class="fc-orbit-dot dot-three"></span>
                            <span class="fc-orbit-dot dot-four"></span>

                            <div class="fc-orbit-center">
                                <strong>FC</strong>
                                <span>COMMERCE</span>
                            </div>

                            <div class="fc-orbit-card orbit-design">
                                <i class="fas fa-store"></i>
                                <span>Stores</span>
                            </div>

                            <div class="fc-orbit-card orbit-development">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Commerce</span>
                            </div>

                            <div class="fc-orbit-card orbit-growth">
                                <i class="fas fa-chart-line"></i>
                                <span>Growth</span>
                            </div>

                            <div class="fc-orbit-card orbit-intelligence">
                                <i class="fas fa-boxes"></i>
                                <span>Inventory</span>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>


        {{-- =========================================================
        OVERVIEW
    ========================================================== --}}
        <section class="fc-services-intro">

            <div class="container">

                <div class="text-center">

                    <div class="fc-section-eyebrow">
                        <span></span>
                        E-commerce Development
                        <span></span>
                    </div>

                    <h2 class="fc-services-intro-title">
                        Custom commerce experiences built around
                        <span>your business.</span>
                    </h2>

                    <p class="fc-services-intro-text">
                        We build custom e-commerce platforms tailored to your business
                        needs, combining scalable architecture, performance, intuitive
                        shopping experiences, and SEO-friendly foundations that help
                        turn visitors into customers.
                    </p>

                </div>


                <div class="row g-4 fc-capability-row">

                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">
                                <i class="fas fa-code"></i>
                            </div>

                            <span>01</span>

                            <h3>Custom Development</h3>

                            <p>
                                Build e-commerce experiences using modern technologies
                                such as Laravel, React, and Node.js around your specific
                                business model.
                            </p>

                        </div>

                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">
                                <i class="fas fa-expand-arrows-alt"></i>
                            </div>

                            <span>02</span>

                            <h3>Scalable Architecture</h3>

                            <p>
                                Cloud-ready commerce architecture designed to support
                                growing product catalogs, traffic, and operational needs.
                            </p>

                        </div>

                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">
                                <i class="fas fa-bolt"></i>
                            </div>

                            <span>03</span>

                            <h3>Performance</h3>

                            <p>
                                Optimize shopping experiences with efficient caching,
                                CDN integration, lazy loading, and performance-focused
                                implementation.
                            </p>

                        </div>

                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">

                        <div class="fc-capability">

                            <div class="fc-capability-icon">
                                <i class="fas fa-search-dollar"></i>
                            </div>

                            <span>04</span>

                            <h3>SEO Ready</h3>

                            <p>
                                Clean URLs, structured data, metadata, mobile-friendly
                                layouts, and technical SEO foundations for product pages.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        WOOCOMMERCE / SHOPIFY
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">
                            <span></span>
                            Platform Development
                        </div>

                        <h2 class="fc-services-list-title">
                            WooCommerce & Shopify
                            <span>development.</span>
                        </h2>

                    </div>

                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">
                            Choose the platform that fits your business and extend it
                            with custom design, integrations, commerce functionality,
                            and conversion-focused experiences.
                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    {{-- WooCommerce --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">01</span>

                                <div class="fc-service-icon">
                                    <i class="fab fa-wordpress"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    WordPress Commerce
                                </span>

                                <h3>WooCommerce Development</h3>

                                <p>
                                    Transform your WordPress website into a powerful
                                    e-commerce store with WooCommerce. Build flexible
                                    shopping experiences with custom functionality
                                    and control over your store.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Custom Themes</span>
                                    <span>Plugins</span>
                                    <span>Payments</span>
                                    <span>Product Variations</span>
                                </div>

                            </div>

                            <a href="{{ url('contact-us') }}" class="fc-service-link">
                                Discuss WooCommerce
                                <i class="fas fa-arrow-right"></i>
                            </a>

                        </article>

                    </div>


                    {{-- Shopify --}}
                    <div class="col-12 col-lg-6">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">02</span>

                                <div class="fc-service-icon">
                                    <i class="fab fa-shopify"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Hosted Commerce
                                </span>

                                <h3>Shopify Development</h3>

                                <p>
                                    Launch and customize Shopify stores with branded
                                    designs, integrated applications, secure payments,
                                    analytics, automation, and mobile commerce support.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Theme Development</span>
                                    <span>App Integration</span>
                                    <span>Payments</span>
                                    <span>Mobile Commerce</span>
                                </div>

                            </div>

                            <a href="{{ url('contact-us') }}" class="fc-service-link">
                                Discuss Shopify
                                <i class="fas fa-arrow-right"></i>
                            </a>

                        </article>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        INVENTORY & ORDER MANAGEMENT
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">
                            <span></span>
                            Operations
                        </div>

                        <h2 class="fc-services-list-title">
                            Inventory & Order
                            <span>management.</span>
                        </h2>

                    </div>

                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">
                            Connect products, inventory, orders, warehouses, and
                            fulfillment into a more organized commerce workflow.
                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    {{-- 01 --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">01</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-sync-alt"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Inventory
                                </span>

                                <h3>Real-time Synchronization</h3>

                                <p>
                                    Synchronize inventory across websites, mobile
                                    applications, and marketplaces to keep stock
                                    information consistent.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Stock Sync</span>
                                    <span>Multi-channel</span>
                                </div>

                            </div>

                        </article>

                    </div>


                    {{-- 02 --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">02</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-bell"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Automation
                                </span>

                                <h3>Smart Alerts & Notifications</h3>

                                <p>
                                    Configure alerts for low stock, reorder points,
                                    and out-of-stock products to keep inventory
                                    under control.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Low Stock</span>
                                    <span>Alerts</span>
                                </div>

                            </div>

                        </article>

                    </div>


                    {{-- 03 --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">03</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-barcode"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Product Management
                                </span>

                                <h3>Barcode & SKU Management</h3>

                                <p>
                                    Organize products with custom SKUs, barcode
                                    support, product variations, and structured
                                    inventory management.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Barcodes</span>
                                    <span>SKUs</span>
                                </div>

                            </div>

                        </article>

                    </div>


                    {{-- 04 --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">04</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-clipboard-list"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Fulfillment
                                </span>

                                <h3>Order Processing & Tracking</h3>

                                <p>
                                    Streamline order workflows from placement through
                                    delivery with status updates, shipping labels,
                                    packing slips, and tracking.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Orders</span>
                                    <span>Tracking</span>
                                    <span>Fulfillment</span>
                                </div>

                            </div>

                        </article>

                    </div>


                    {{-- 05 --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">05</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-warehouse"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Logistics
                                </span>

                                <h3>Multi-warehouse Support</h3>

                                <p>
                                    Manage stock across multiple locations and
                                    configure fulfillment workflows around your
                                    warehouse structure.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Warehouses</span>
                                    <span>Locations</span>
                                </div>

                            </div>

                        </article>

                    </div>


                    {{-- 06 --}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">

                                <span class="fc-service-number">06</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-chart-bar"></i>
                                </div>

                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">
                                    Analytics
                                </span>

                                <h3>Analytics & Reporting</h3>

                                <p>
                                    Understand stock levels, sales velocity, and
                                    product performance to support purchasing and
                                    merchandising decisions.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Reports</span>
                                    <span>Sales Data</span>
                                </div>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        MULTI-VENDOR MARKETPLACE
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-8">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">
                            <span></span>
                            Marketplace Solutions
                        </div>

                        <h2 class="fc-services-list-title">
                            Multi-vendor marketplaces
                            <span>built to scale.</span>
                        </h2>

                    </div>

                    <div class="col-lg-4">

                        <p class="fc-services-list-intro">
                            Build marketplace platforms where multiple sellers can
                            manage products and orders while your business manages
                            commissions, payments, and marketplace operations.
                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">
                                <span class="fc-service-number">01</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">Vendors</span>

                                <h3>Vendor Dashboard</h3>

                                <p>
                                    Give sellers a dedicated dashboard to manage
                                    products, orders, inventory, earnings, permissions,
                                    and account settings.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Seller Panel</span>
                                    <span>Permissions</span>
                                </div>

                            </div>

                        </article>

                    </div>


                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">
                                <span class="fc-service-number">02</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-percentage"></i>
                                </div>
                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">Revenue</span>

                                <h3>Commission Management</h3>

                                <p>
                                    Configure fixed, percentage-based, or tiered
                                    commission structures with automated calculations
                                    and financial reporting.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Commission</span>
                                    <span>Reporting</span>
                                </div>

                            </div>

                        </article>

                    </div>


                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">
                                <span class="fc-service-number">03</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">Trust</span>

                                <h3>Vendor Verification</h3>

                                <p>
                                    Support vendor approval workflows with document
                                    verification, business validation, and review
                                    processes.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Verification</span>
                                    <span>Approval</span>
                                </div>

                            </div>

                        </article>

                    </div>


                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">
                                <span class="fc-service-number">04</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">Payments</span>

                                <h3>Split Payment System</h3>

                                <p>
                                    Support automated payment distribution to vendors
                                    with commission deductions, payment gateways,
                                    payouts, and transaction history.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Payments</span>
                                    <span>Payouts</span>
                                </div>

                            </div>

                        </article>

                    </div>


                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card fc-service-card-dark">

                            <div class="fc-service-card-top">
                                <span class="fc-service-number">05</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-comments"></i>
                                </div>
                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">Customers</span>

                                <h3>Review & Rating System</h3>

                                <p>
                                    Build customer trust with product reviews,
                                    vendor ratings, moderation tools, verified
                                    purchases, and seller responses.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Reviews</span>
                                    <span>Ratings</span>
                                </div>

                            </div>

                        </article>

                    </div>


                    <div class="col-12 col-md-6 col-xl-4">

                        <article class="fc-service-card">

                            <div class="fc-service-card-top">
                                <span class="fc-service-number">06</span>

                                <div class="fc-service-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                            </div>

                            <div class="fc-service-card-content">

                                <span class="fc-service-category">Shipping</span>

                                <h3>Individual Shipping Rules</h3>

                                <p>
                                    Allow vendors to define shipping methods, rates,
                                    zones, local pickup options, free-shipping
                                    thresholds, and carrier integrations.
                                </p>

                                <div class="fc-service-tags">
                                    <span>Shipping</span>
                                    <span>Zones</span>
                                </div>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        WHAT YOU GET
    ========================================================== --}}
        <section class="fc-work-section">

            <div class="container">

                <div class="fc-work-header">

                    <div class="fc-work-eyebrow">
                        <span class="fc-work-eyebrow-line"></span>
                        What You Get
                    </div>

                    <div class="row align-items-end g-4">

                        <div class="col-lg-7">

                            <h2 class="fc-work-title">
                                Everything your store needs to
                                <span>move forward.</span>
                            </h2>

                        </div>

                        <div class="col-lg-5">

                            <p class="fc-work-intro">
                                From the storefront and checkout experience to
                                inventory, payments, and analytics, we build around
                                the operational needs of your commerce business.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="row g-4 fc-work-process">

                    <div class="col-12 col-sm-6 col-xl-3">

                        <article class="fc-work-card fc-work-card-featured">

                            <div class="fc-work-card-top">
                                <span class="fc-work-number">01</span>

                                <div class="fc-work-icon">
                                    <i class="fas fa-store"></i>
                                </div>
                            </div>

                            <div class="fc-work-card-content">

                                <span class="fc-work-label">Commerce</span>

                                <h3>Custom Stores</h3>

                                <p>
                                    WooCommerce, Shopify, and custom commerce
                                    solutions tailored to your brand and business goals.
                                </p>

                            </div>

                            <span class="fc-work-card-accent"></span>

                        </article>

                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">

                        <article class="fc-work-card">

                            <div class="fc-work-card-top">
                                <span class="fc-work-number">02</span>

                                <div class="fc-work-icon">
                                    <i class="fas fa-boxes"></i>
                                </div>
                            </div>

                            <div class="fc-work-card-content">

                                <span class="fc-work-label">Operations</span>

                                <h3>Inventory & Orders</h3>

                                <p>
                                    Stock synchronization, alerts, SKU management,
                                    order processing, and multi-location inventory.
                                </p>

                            </div>

                        </article>

                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">

                        <article class="fc-work-card">

                            <div class="fc-work-card-top">
                                <span class="fc-work-number">03</span>

                                <div class="fc-work-icon">
                                    <i class="fas fa-rocket"></i>
                                </div>
                            </div>

                            <div class="fc-work-card-content">

                                <span class="fc-work-label">Experience</span>

                                <h3>Optimized Shopping</h3>

                                <p>
                                    Fast checkout, clear navigation, trust signals,
                                    and conversion-focused shopping experiences.
                                </p>

                            </div>

                        </article>

                    </div>


                    <div class="col-12 col-sm-6 col-xl-3">

                        <article class="fc-work-card">

                            <div class="fc-work-card-top">
                                <span class="fc-work-number">04</span>

                                <div class="fc-work-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>

                            <div class="fc-work-card-content">

                                <span class="fc-work-label">Insights</span>

                                <h3>Analytics & Reporting</h3>

                                <p>
                                    Track sales, customer behavior, inventory,
                                    and performance data to support better decisions.
                                </p>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        FAQ
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="row align-items-end g-4 fc-services-list-header">

                    <div class="col-lg-7">

                        <div class="fc-section-eyebrow fc-section-eyebrow-left">
                            <span></span>
                            Frequently Asked Questions
                        </div>

                        <h2 class="fc-services-list-title">
                            Questions about your
                            <span>e-commerce project.</span>
                        </h2>

                    </div>

                    <div class="col-lg-5">

                        <p class="fc-services-list-intro">
                            A few common questions about performance, inventory,
                            SEO, and the technical side of building an online store.
                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    <div class="col-12">

                        <div class="accordion" id="ecommerceFaq">

                            <div class="accordion-item">

                                <h3 class="accordion-header" id="ecommerceFaqOne">

                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#ecommerceCollapseOne" aria-expanded="true"
                                        aria-controls="ecommerceCollapseOne">

                                        How fast will my store load?

                                    </button>

                                </h3>

                                <div id="ecommerceCollapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="ecommerceFaqOne" data-bs-parent="#ecommerceFaq">

                                    <div class="accordion-body">

                                        We optimize images, caching, and content
                                        delivery through performance-focused
                                        implementation and CDN support.

                                    </div>

                                </div>

                            </div>


                            <div class="accordion-item">

                                <h3 class="accordion-header" id="ecommerceFaqTwo">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#ecommerceCollapseTwo" aria-expanded="false"
                                        aria-controls="ecommerceCollapseTwo">

                                        Can I manage multiple warehouses?

                                    </button>

                                </h3>

                                <div id="ecommerceCollapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="ecommerceFaqTwo" data-bs-parent="#ecommerceFaq">

                                    <div class="accordion-body">

                                        Yes. The platform can support multi-location
                                        stock management, warehouse workflows,
                                        and separate shipping rules.

                                    </div>

                                </div>

                            </div>


                            <div class="accordion-item">

                                <h3 class="accordion-header" id="ecommerceFaqThree">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#ecommerceCollapseThree" aria-expanded="false"
                                        aria-controls="ecommerceCollapseThree">

                                        Is it SEO-friendly from day one?

                                    </button>

                                </h3>

                                <div id="ecommerceCollapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="ecommerceFaqThree" data-bs-parent="#ecommerceFaq">

                                    <div class="accordion-body">

                                        Yes. We can build clean URLs, metadata,
                                        structured data, responsive pages, and
                                        performance-focused storefronts.

                                    </div>

                                </div>

                            </div>


                            <div class="accordion-item">

                                <h3 class="accordion-header" id="ecommerceFaqFour">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#ecommerceCollapseFour" aria-expanded="false"
                                        aria-controls="ecommerceCollapseFour">

                                        Can you build a multi-vendor marketplace?

                                    </button>

                                </h3>

                                <div id="ecommerceCollapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="ecommerceFaqFour" data-bs-parent="#ecommerceFaq">

                                    <div class="accordion-body">

                                        Yes. Marketplace functionality can include
                                        vendor dashboards, commissions, verification,
                                        split payments, reviews, and vendor-specific
                                        shipping rules.

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        WHY CHOOSE US
    ========================================================== --}}
        @include('includes.why-choose-us')


        {{-- =========================================================
        CTA
    ========================================================== --}}
        <section class="fc-services-cta">

            <div class="fc-cta-glow"></div>

            <div class="container">

                <div class="fc-services-cta-inner">

                    <div class="fc-section-eyebrow fc-section-eyebrow-light">
                        <span></span>
                        Have an E-commerce Project in Mind?
                        <span></span>
                    </div>

                    <h2 class="fc-services-cta-title">
                        Ready to launch your
                        <span>e-commerce store?</span>
                    </h2>

                    <p class="fc-services-cta-text">
                        From concept to launch, we design scalable,
                        performance-focused e-commerce solutions around your
                        business needs.
                    </p>

                    <div class="fc-services-cta-actions">

                        <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary fc-btn-large">

                            <i class="fas fa-rocket me-2"></i>
                            Let's Get Started

                        </a>

                        <a href="{{ url('portfolio') }}" class="fc-btn fc-btn-dark-outline fc-btn-large">

                            View Our Work

                        </a>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        RELATED SERVICES
    ========================================================== --}}
        <section class="fc-services-list">

            <div class="container">

                <div class="text-center">

                    <div class="fc-section-eyebrow">
                        <span></span>
                        Explore More
                        <span></span>
                    </div>

                    <h2 class="fc-services-intro-title">
                        Other digital services
                        <span>for your business.</span>
                    </h2>

                    <p class="fc-services-intro-text">
                        We combine web development, software, design, branding,
                        and digital marketing to create connected digital
                        experiences around your business goals.
                    </p>

                </div>

                <div class="mt-5">

                    @include('includes.services')

                </div>

            </div>

        </section>

    </main>
@endsection
