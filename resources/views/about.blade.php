
@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/v2/about.css') }}">

<main id="main-content" class="fc-about-page">

    {{-- ============================================================
         01. HERO
         ============================================================ --}}

    <section class="fc-about-hero"
             aria-labelledby="about-hero-title">

        <div class="fc-about-hero-glow fc-about-hero-glow-one"
             aria-hidden="true"></div>

        <div class="fc-about-hero-glow fc-about-hero-glow-two"
             aria-hidden="true"></div>

        <div class="container">

            <div class="fc-about-hero-content">

                <span class="fc-eyebrow">
                    About FusionCentrix
                </span>

                <h1 id="about-hero-title"
                    class="fc-about-hero-title">

                    We build digital solutions
                    <span>with purpose.</span>

                </h1>

                <p class="fc-about-hero-description">
                    FusionCentrix is a digital solutions partner helping
                    businesses turn ideas into reliable, scalable, and
                    growth-focused digital experiences.
                </p>

                <div class="fc-about-hero-actions">

                    <a href="{{ url('contact-us') }}"
                       class="fc-btn fc-btn-primary">
                        Start a Conversation
                    </a>

                    <a href="{{ url('services') }}"
                       class="fc-btn fc-btn-outline">
                        Explore Our Services
                    </a>

                </div>

            </div>

        </div>

        <div class="fc-about-hero-bottom"
             aria-hidden="true">

            <span>Strategy</span>
            <i></i>

            <span>Technology</span>
            <i></i>

            <span>Design</span>
            <i></i>

            <span>Growth</span>

        </div>

    </section>


    {{-- ============================================================
         02. WHO WE ARE
         ============================================================ --}}

    <section class="fc-about-intro fc-section"
             aria-labelledby="about-intro-title">

        <div class="container">

            <div class="row g-4 g-lg-5">

                <div class="col-12 col-lg-5">

                    <div class="fc-about-intro-heading">

                        <span class="fc-eyebrow">
                            Who We Are
                        </span>

                        <h2 id="about-intro-title"
                            class="fc-section-title">

                            One partner.
                            <span class="fc-gradient-text">
                                Multiple capabilities.
                            </span>

                        </h2>

                    </div>

                </div>

                <div class="col-12 col-lg-7">

                    <div class="fc-about-intro-content">

                        <p class="fc-about-intro-lead">
                            Businesses shouldn't have to coordinate
                            disconnected teams for every part of their
                            digital journey.
                        </p>

                        <p>
                            At FusionCentrix, we bring development,
                            design, SEO, digital marketing, branding,
                            and technology solutions together under
                            one team.
                        </p>

                        <p>
                            Our goal is simple: understand the business
                            behind the project, build the right digital
                            solution, and create an experience that can
                            continue to evolve as the business grows.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ============================================================
         03. WHAT WE BELIEVE
         ============================================================ --}}

    <section class="fc-about-beliefs fc-section-soft fc-section"
             aria-labelledby="beliefs-title">

        <div class="container">

            <header class="fc-about-section-header">

                <span class="fc-eyebrow">
                    What We Believe
                </span>

                <h2 id="beliefs-title"
                    class="fc-section-title">

                    Technology should
                    <span class="fc-gradient-text">
                        solve real problems.
                    </span>

                </h2>

                <p class="fc-section-description">
                    We focus on useful technology, thoughtful design,
                    and measurable outcomes instead of building digital
                    products simply for the sake of technology.
                </p>

            </header>


            <div class="row g-0 fc-about-beliefs-grid">

                <div class="col-12 col-md-6 col-xl-3">

                    <article class="fc-about-belief">

                        <span class="fc-about-belief-number">
                            01
                        </span>

                        <h3>
                            Understand First
                        </h3>

                        <p>
                            Every strong solution starts with understanding
                            the business, users, objectives, and challenges.
                        </p>

                    </article>

                </div>


                <div class="col-12 col-md-6 col-xl-3">

                    <article class="fc-about-belief">

                        <span class="fc-about-belief-number">
                            02
                        </span>

                        <h3>
                            Keep It Useful
                        </h3>

                        <p>
                            We prioritize clarity, usability, performance,
                            and functionality over unnecessary complexity.
                        </p>

                    </article>

                </div>


                <div class="col-12 col-md-6 col-xl-3">

                    <article class="fc-about-belief">

                        <span class="fc-about-belief-number">
                            03
                        </span>

                        <h3>
                            Build to Evolve
                        </h3>

                        <p>
                            Digital products should be able to grow,
                            adapt, and improve as your business changes.
                        </p>

                    </article>

                </div>


                <div class="col-12 col-md-6 col-xl-3">

                    <article class="fc-about-belief">

                        <span class="fc-about-belief-number">
                            04
                        </span>

                        <h3>
                            Think Long Term
                        </h3>

                        <p>
                            We aim to become a reliable technology partner,
                            not simply a team that disappears after launch.
                        </p>

                    </article>

                </div>

            </div>

        </div>

    </section>


    {{-- ============================================================
         04. WHAT WE DO
         ============================================================ --}}

    <section class="fc-about-capabilities fc-section"
             aria-labelledby="capabilities-title">

        <div class="container">

            <div class="row g-4 g-lg-5 align-items-center">

                <div class="col-12 col-lg-5">

                    <div class="fc-about-capabilities-content">

                        <span class="fc-eyebrow">
                            What We Do
                        </span>

                        <h2 id="capabilities-title"
                            class="fc-section-title">

                            Different disciplines.
                            <span class="fc-gradient-text">
                                One direction.
                            </span>

                        </h2>

                        <p class="fc-section-description">
                            From strategy and design to development,
                            visibility, and continued optimization,
                            our capabilities work together to solve
                            real business requirements.
                        </p>

                        <a href="{{ url('services') }}"
                           class="fc-btn fc-btn-primary fc-about-capabilities-btn">
                            Explore Services
                        </a>

                    </div>

                </div>


                <div class="col-12 col-lg-7">

                    <div class="fc-about-capability-list">

                        <article class="fc-about-capability">

                            <span>01</span>

                            <div>
                                <h3>Development</h3>

                                <p>
                                    Websites, web applications, e-commerce,
                                    SaaS products, and custom software solutions.
                                </p>
                            </div>

                        </article>


                        <article class="fc-about-capability">

                            <span>02</span>

                            <div>
                                <h3>Design</h3>

                                <p>
                                    User experiences, interfaces, visual
                                    systems, and brand identity.
                                </p>
                            </div>

                        </article>


                        <article class="fc-about-capability">

                            <span>03</span>

                            <div>
                                <h3>Growth</h3>

                                <p>
                                    SEO, digital marketing, content,
                                    and strategies designed to improve
                                    online visibility.
                                </p>
                            </div>

                        </article>


                        <article class="fc-about-capability">

                            <span>04</span>

                            <div>
                                <h3>Technology</h3>

                                <p>
                                    Integrations, automation, optimization,
                                    and practical technology solutions.
                                </p>
                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ============================================================
         05. HOW WE WORK
         ============================================================ --}}

    <section class="fc-about-approach fc-section-dark fc-section"
             aria-labelledby="approach-title">

        <div class="container">

            <header class="fc-about-approach-header">

                <span class="fc-eyebrow">
                    How We Work
                </span>

                <h2 id="approach-title"
                    class="fc-section-title">

                    Clear thinking.
                    <span class="fc-gradient-text">
                        Better execution.
                    </span>

                </h2>

                <p class="fc-section-description fc-about-approach-description">
                    We follow a practical process that keeps business
                    objectives, users, technology, and long-term growth
                    connected from beginning to launch and beyond.
                </p>

            </header>


            <div class="row g-0 fc-about-approach-grid">

                <div class="col-12 col-md-6 col-xl-3">

                    <article class="fc-about-approach-item">

                        <span class="fc-about-approach-index">
                            01
                        </span>

                        <h3>
                            Discover
                        </h3>

                        <p>
                            We learn about your business, audience,
                            objectives, and existing digital ecosystem.
                        </p>

                    </article>

                </div>


                <div class="col-12 col-md-6 col-xl-3">

                    <article class="fc-about-approach-item">

                        <span class="fc-about-approach-index">
                            02
                        </span>

                        <h3>
                            Define
                        </h3>

                        <p>
                            We identify priorities and define a practical
                            strategy around your actual requirements.
                        </p>

                    </article>

                </div>


                <div class="col-12 col-md-6 col-xl-3">

                    <article class="fc-about-approach-item">

                        <span class="fc-about-approach-index">
                            03
                        </span>

                        <h3>
                            Create
                        </h3>

                        <p>
                            Design and development come together to create
                            the right digital experience.
                        </p>

                    </article>

                </div>


                <div class="col-12 col-md-6 col-xl-3">

                    <article class="fc-about-approach-item">

                        <span class="fc-about-approach-index">
                            04
                        </span>

                        <h3>
                            Improve
                        </h3>

                        <p>
                            We continue to optimize performance,
                            visibility, usability, and growth.
                        </p>

                    </article>

                </div>

            </div>

        </div>

    </section>


    {{-- ============================================================
         06. OUR PEOPLE
         ============================================================ --}}

    <section class="fc-about-team fc-section"
             aria-labelledby="team-title">

        <div class="container">

            <div class="row g-4 align-items-end fc-about-team-header">

                <div class="col-12 col-lg-8">

                    <span class="fc-eyebrow">
                        Our People
                    </span>

                    <h2 id="team-title"
                        class="fc-section-title">

                        The people behind
                        <span class="fc-gradient-text">
                            the solutions.
                        </span>

                    </h2>

                </div>

                <div class="col-12 col-lg-4">

                    <p>
                        A multidisciplinary team bringing together
                        technology, design, strategy, and growth.
                    </p>

                </div>

            </div>


            <div class="row g-3 g-lg-4">

                @php
                    $teamMembers = [
                        [
                            'image' => 'expert-1.webp',
                            'name' => 'Expert Name',
                            'role' => 'Founder & Digital Strategist',
                        ],
                        [
                            'image' => 'expert-2.webp',
                            'name' => 'Expert Name',
                            'role' => 'Technology & Development',
                        ],
                        [
                            'image' => 'expert-3.webp',
                            'name' => 'Expert Name',
                            'role' => 'SEO & Growth',
                        ],
                        [
                            'image' => 'expert-4.webp',
                            'name' => 'Expert Name',
                            'role' => 'Design & Branding',
                        ],
                    ];
                @endphp


                @foreach ($teamMembers as $member)

                    <div class="col-12 col-sm-6 col-xl-3">

                        <article class="fc-about-team-card">

                            <div class="fc-about-team-image">

                                <img
                                    src="{{ asset('assets/images/team/' . $member['image']) }}"
                                    alt="{{ $member['name'] }} - {{ $member['role'] }} at FusionCentrix"
                                    width="600"
                                    height="660"
                                    loading="lazy"
                                    decoding="async"
                                >

                            </div>

                            <div class="fc-about-team-content">

                                <h3>
                                    {{ $member['name'] }}
                                </h3>

                                <span>
                                    {{ $member['role'] }}
                                </span>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>

        </div>

    </section>


    {{-- ============================================================
         07. WHY FUSIONCENTRIX
         ============================================================ --}}

    <section class="fc-about-why fc-section-soft fc-section"
             aria-labelledby="why-title">

        <div class="container">

            <div class="row g-4 g-lg-5 align-items-start">

                <div class="col-12 col-lg-5">

                    <span class="fc-eyebrow">
                        Why FusionCentrix
                    </span>

                    <h2 id="why-title"
                        class="fc-section-title">

                        A partner that sees
                        <span class="fc-gradient-text">
                            the bigger picture.
                        </span>

                    </h2>

                </div>


                <div class="col-12 col-lg-7">

                    <div class="fc-about-why-list">

                        <article class="fc-about-why-item">

                            <span class="fc-about-why-icon">
                                01
                            </span>

                            <div>

                                <h3>
                                    Business-first thinking
                                </h3>

                                <p>
                                    We connect technology decisions
                                    to actual business objectives.
                                </p>

                            </div>

                        </article>


                        <article class="fc-about-why-item">

                            <span class="fc-about-why-icon">
                                02
                            </span>

                            <div>

                                <h3>
                                    One connected team
                                </h3>

                                <p>
                                    Strategy, design, development,
                                    and growth work together.
                                </p>

                            </div>

                        </article>


                        <article class="fc-about-why-item">

                            <span class="fc-about-why-icon">
                                03
                            </span>

                            <div>

                                <h3>
                                    Built for growth
                                </h3>

                                <p>
                                    We think beyond launch and create
                                    solutions that can evolve.
                                </p>

                            </div>

                        </article>


                        <article class="fc-about-why-item">

                            <span class="fc-about-why-icon">
                                04
                            </span>

                            <div>

                                <h3>
                                    Long-term partnership
                                </h3>

                                <p>
                                    We aim to remain useful long after
                                    the first version goes live.
                                </p>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ============================================================
         08. CTA
         ============================================================ --}}

    <section class="fc-about-cta"
             aria-labelledby="about-cta-title">

        <div class="fc-about-cta-glow"
             aria-hidden="true"></div>

        <div class="container">

            <div class="fc-about-cta-inner">

                <span class="fc-about-cta-eyebrow">
                    Let's Work Together
                </span>

                <h2 id="about-cta-title"
                    class="fc-about-cta-title">

                    Have an idea?
                    <span>Let's build it.</span>

                </h2>

                <p>
                    Tell us what you're working on and let's explore
                    how FusionCentrix can help.
                </p>

                <div class="fc-about-cta-actions">

                    <a href="{{ url('contact-us') }}"
                       class="fc-btn fc-btn-primary">
                        Start a Conversation
                    </a>

                    <a href="{{ url('portfolio') }}"
                       class="fc-btn fc-btn-outline">
                        View Our Work
                    </a>

                </div>

            </div>

        </div>

    </section>

</main>

@endsection