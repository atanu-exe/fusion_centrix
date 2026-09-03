@extends('layouts.app')
@section('content')
 <link rel="stylesheet" href="{{ asset('assets/css/v2/about.css') }}">
    {{-- ============================================================
     FUSIONCENTRIX V2 — ABOUT PAGE
     ============================================================ --}}

    <main id="main-content" class="fc-about-page">


        {{-- ========================================================
         01. ABOUT HERO
         ======================================================== --}}

        <section class="fc-about-hero" aria-labelledby="about-hero-title">

            <div class="fc-about-hero-glow fc-about-hero-glow-one" aria-hidden="true">
            </div>

            <div class="fc-about-hero-glow fc-about-hero-glow-two" aria-hidden="true">
            </div>


            <div class="container">

                <div class="fc-about-hero-content">

                    <span class="fc-eyebrow">
                        About FusionCentrix
                    </span>


                    <h1 id="about-hero-title" class="fc-about-hero-title">

                        We build digital solutions
                        <span>with purpose.</span>

                    </h1>


                    <p class="fc-about-hero-description">

                        FusionCentrix is a digital solutions partner
                        helping businesses turn ideas into reliable,
                        scalable, and growth-focused digital experiences.

                    </p>


                    <div class="fc-about-hero-actions">

                        <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary">

                            Start a Conversation

                        </a>


                        <a href="{{ url('services') }}" class="fc-btn fc-btn-outline">

                            Explore Our Services

                        </a>

                    </div>

                </div>

            </div>


            <div class="fc-about-hero-bottom" aria-hidden="true">

                <span>Strategy</span>
                <i></i>

                <span>Technology</span>
                <i></i>

                <span>Design</span>
                <i></i>

                <span>Growth</span>

            </div>

        </section>



        {{-- ========================================================
         02. WHO WE ARE
         ======================================================== --}}

        <section class="fc-about-intro fc-section" aria-labelledby="about-intro-title">

            <div class="container">

                <div class="fc-about-intro-grid">

                    <div class="fc-about-intro-heading">

                        <span class="fc-eyebrow">
                            Who We Are
                        </span>


                        <h2 id="about-intro-title" class="fc-section-title">

                            One partner.
                            <span class="fc-gradient-text">
                                Multiple capabilities.
                            </span>

                        </h2>

                    </div>


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

        </section>



        {{-- ========================================================
         03. WHAT WE BELIEVE
         ======================================================== --}}

        <section class="fc-about-beliefs fc-section-soft fc-section" aria-labelledby="beliefs-title">

            <div class="container">

                <div class="fc-about-beliefs-header">

                    <span class="fc-eyebrow">
                        What We Believe
                    </span>


                    <h2 id="beliefs-title" class="fc-section-title">

                        Technology should
                        <span class="fc-gradient-text">
                            solve real problems.
                        </span>

                    </h2>


                    <p class="fc-section-description">

                        We focus on useful technology, thoughtful design,
                        and measurable outcomes instead of building
                        digital products simply for the sake of technology.

                    </p>

                </div>


                <div class="fc-about-beliefs-grid">


                    {{-- Belief 01 --}}
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


                    {{-- Belief 02 --}}
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


                    {{-- Belief 03 --}}
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


                    {{-- Belief 04 --}}
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

        </section>



        {{-- ========================================================
         04. WHAT WE BRING TOGETHER
         ======================================================== --}}

        <section class="fc-about-capabilities fc-section" aria-labelledby="capabilities-title">

            <div class="container">

                <div class="fc-about-capabilities-grid">

                    <div class="fc-about-capabilities-content">

                        <span class="fc-eyebrow">
                            Our Capabilities
                        </span>


                        <h2 id="capabilities-title" class="fc-section-title">

                            Different disciplines.
                            <span class="fc-gradient-text">
                                One direction.
                            </span>

                        </h2>


                        <p class="fc-section-description">

                            From the first strategy discussion to launch
                            and continued growth, our capabilities work
                            together instead of operating in isolation.

                        </p>


                        <a href="{{ url('services') }}" class="fc-btn fc-btn-primary fc-about-capabilities-btn">

                            Explore Services

                        </a>

                    </div>


                    <div class="fc-about-capability-list">


                        <div class="fc-about-capability">

                            <span>01</span>

                            <div>

                                <h3>
                                    Development
                                </h3>

                                <p>
                                    Websites, applications, e-commerce,
                                    and custom software solutions.
                                </p>

                            </div>

                        </div>


                        <div class="fc-about-capability">

                            <span>02</span>

                            <div>

                                <h3>
                                    Design
                                </h3>

                                <p>
                                    User experiences, interfaces,
                                    visual systems, and brand identity.
                                </p>

                            </div>

                        </div>


                        <div class="fc-about-capability">

                            <span>03</span>

                            <div>

                                <h3>
                                    Growth
                                </h3>

                                <p>
                                    SEO, digital marketing, content,
                                    and strategies designed for visibility.
                                </p>

                            </div>

                        </div>


                        <div class="fc-about-capability">

                            <span>04</span>

                            <div>

                                <h3>
                                    Technology
                                </h3>

                                <p>
                                    Practical technology solutions,
                                    integrations, automation, and optimization.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================
         05. OUR APPROACH
         ======================================================== --}}

        <section class="fc-about-approach fc-section-dark fc-section" aria-labelledby="approach-title">

            <div class="container">

                <div class="fc-about-approach-header">

                    <span class="fc-eyebrow">
                        Our Approach
                    </span>


                    <h2 id="approach-title" class="fc-section-title">

                        Clear thinking.
                        <span class="fc-gradient-text">
                            Better execution.
                        </span>

                    </h2>

                </div>


                <div class="fc-about-approach-grid">


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

        </section>



        {{-- ========================================================
         06. MEET OUR EXPERTS
         ======================================================== --}}

        <section class="fc-about-team fc-section" aria-labelledby="team-title">

            <div class="container">

                <div class="fc-about-team-header">

                    <div>

                        <span class="fc-eyebrow">
                            Meet Our Experts
                        </span>


                        <h2 id="team-title" class="fc-section-title">

                            The people behind
                            <span class="fc-gradient-text">
                                the solutions.
                            </span>

                        </h2>

                    </div>


                    <p>

                        A multidisciplinary team bringing together
                        technology, design, strategy, and growth.

                    </p>

                </div>


                <div class="fc-about-team-grid">


                    {{-- Expert 01 --}}
                    <article class="fc-about-team-card">

                        <div class="fc-about-team-image">

                            <img src="{{ asset('assets/images/team/expert-1.webp') }}" alt="FusionCentrix team expert"
                                loading="lazy">

                        </div>

                        <div class="fc-about-team-content">

                            <h3>
                                Expert Name
                            </h3>

                            <span>
                                Founder &amp; Digital Strategist
                            </span>

                        </div>

                    </article>


                    {{-- Expert 02 --}}
                    <article class="fc-about-team-card">

                        <div class="fc-about-team-image">

                            <img src="{{ asset('assets/images/team/expert-2.webp') }}" alt="FusionCentrix team expert"
                                loading="lazy">

                        </div>

                        <div class="fc-about-team-content">

                            <h3>
                                Expert Name
                            </h3>

                            <span>
                                Technology &amp; Development
                            </span>

                        </div>

                    </article>


                    {{-- Expert 03 --}}
                    <article class="fc-about-team-card">

                        <div class="fc-about-team-image">

                            <img src="{{ asset('assets/images/team/expert-3.webp') }}" alt="FusionCentrix team expert"
                                loading="lazy">

                        </div>

                        <div class="fc-about-team-content">

                            <h3>
                                Expert Name
                            </h3>

                            <span>
                                SEO &amp; Growth
                            </span>

                        </div>

                    </article>


                    {{-- Expert 04 --}}
                    <article class="fc-about-team-card">

                        <div class="fc-about-team-image">

                            <img src="{{ asset('assets/images/team/expert-4.webp') }}" alt="FusionCentrix team expert"
                                loading="lazy">

                        </div>

                        <div class="fc-about-team-content">

                            <h3>
                                Expert Name
                            </h3>

                            <span>
                                Design &amp; Branding
                            </span>

                        </div>

                    </article>

                </div>

            </div>

        </section>



        {{-- ========================================================
         07. WHY FUSIONCENTRIX
         ======================================================== --}}

        <section class="fc-about-why fc-section-soft fc-section" aria-labelledby="why-title">

            <div class="container">

                <div class="fc-about-why-grid">

                    <div>

                        <span class="fc-eyebrow">
                            Why FusionCentrix
                        </span>


                        <h2 id="why-title" class="fc-section-title">

                            A partner that sees
                            <span class="fc-gradient-text">
                                the bigger picture.
                            </span>

                        </h2>

                    </div>


                    <div class="fc-about-why-list">


                        <div class="fc-about-why-item">

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

                        </div>


                        <div class="fc-about-why-item">

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

                        </div>


                        <div class="fc-about-why-item">

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

                        </div>


                        <div class="fc-about-why-item">

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

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================
         08. FINAL CTA
         ======================================================== --}}

        <section class="fc-about-cta" aria-labelledby="about-cta-title">

            <div class="fc-about-cta-glow"></div>

            <div class="container">

                <div class="fc-about-cta-inner">

                    <span class="fc-about-cta-eyebrow">
                        Let's Work Together
                    </span>


                    <h2 id="about-cta-title" class="fc-about-cta-title">

                        Have an idea?
                        <span>
                            Let's build it.
                        </span>

                    </h2>


                    <p>

                        Tell us what you're working on and
                        let's explore how FusionCentrix can help.

                    </p>


                    <div class="fc-about-cta-actions">

                        <a href="{{ url('contact-us') }}" class="fc-btn fc-btn-primary">

                            Start a Conversation

                        </a>


                        <a href="{{ url('portfolio') }}" class="fc-btn fc-btn-dark-outline">

                            View Our Work

                        </a>

                    </div>

                </div>

            </div>

        </section>


    </main>
@endsection
