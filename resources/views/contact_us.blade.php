@extends('layouts.app')

@section('content')
    {{-- ============================================================
     FUSIONCENTRIX V2 — CONTACT PAGE
     ============================================================ --}}

    <main id="main-content" class="fc-contact-page">
        <link rel="stylesheet" href="{{ asset('assets/css/v2/contact.css') }}">

        {{-- ========================================================
         01. CONTACT HERO
         ======================================================== --}}

        <section class="fc-contact-hero" aria-labelledby="contact-hero-title">

            <div class="fc-contact-hero-glow"></div>

            <div class="container">

                <div class="fc-contact-hero-content">

                    <span class="fc-eyebrow">
                        Get In Touch
                    </span>

                    <h1 id="contact-hero-title" class="fc-contact-hero-title">

                        Let's talk about
                        <span>what you're building.</span>

                    </h1>

                    <p class="fc-contact-hero-description">

                        Have a project, an idea, or a digital challenge?
                        Tell us what you have in mind and we'll explore
                        how FusionCentrix can help.

                    </p>

                </div>

            </div>

        </section>



        {{-- ========================================================
         02. CONTACT AREA
         ======================================================== --}}

        <section class="fc-contact-main fc-section" aria-labelledby="contact-form-title">

            <div class="container">

                <div class="fc-contact-grid">


                    {{-- =================================================
                     LEFT — CONTACT INFORMATION
                     ================================================= --}}

                    <div class="fc-contact-info">

                        <span class="fc-eyebrow">
                            Start a Conversation
                        </span>

                        <h2 class="fc-contact-info-title">

                            Tell us what you
                            <span class="fc-gradient-text">
                                need.
                            </span>

                        </h2>

                        <p class="fc-contact-info-description">

                            Whether you're starting something new,
                            improving an existing product, or looking
                            for a long-term technology partner, we'd
                            love to hear from you.

                        </p>


                        {{-- Email --}}
                        <a href="mailto:info@fusioncentrix.com" class="fc-contact-detail">

                            <span class="fc-contact-detail-label">
                                Email
                            </span>

                            <strong>
                                info@fusioncentrix.com
                            </strong>

                        </a>


                        {{-- Phone --}}
                        <a href="tel:+918282098384" class="fc-contact-detail">

                            <span class="fc-contact-detail-label">
                                Phone
                            </span>

                            <strong>
                                +91 82820 98384
                            </strong>

                        </a>


                        {{-- Location --}}
                        <div class="fc-contact-detail">

                            <span class="fc-contact-detail-label">
                                Location
                            </span>

                            <strong>
                                Sector V, Salt Lake<br>
                                Kolkata, India - 700091
                            </strong>

                        </div>


                        {{-- Response note --}}
                        <div class="fc-contact-note">

                            <span class="fc-contact-note-dot"></span>

                            <p>
                                Tell us about your project.
                                We'll get back to you with
                                the next steps.
                            </p>

                        </div>

                    </div>



                    {{-- =================================================
                     RIGHT — FORM
                     ================================================= --}}

                    <div class="fc-contact-form-wrap">

                        <div class="fc-contact-form-header">

                            <span>
                                Project Enquiry
                            </span>

                            <h2 id="contact-form-title">
                                How can we help?
                            </h2>

                        </div>


                        <form action="{{ url('contact-us') }}" method="POST" class="fc-contact-form">

                            @csrf


                            {{-- Name --}}
                            <div class="fc-contact-field">

                                <label for="contact-name">
                                    Your Name
                                </label>

                                <input type="text" id="contact-name" name="name" class="fc-input"
                                    placeholder="Enter your name" autocomplete="name" required>

                            </div>


                            {{-- Email --}}
                            <div class="fc-contact-field">

                                <label for="contact-email">
                                    Email Address
                                </label>

                                <input type="email" id="contact-email" name="email" class="fc-input"
                                    placeholder="you@example.com" autocomplete="email" required>

                            </div>


                            {{-- Company --}}
                            <div class="fc-contact-field">

                                <label for="contact-company">
                                    Company
                                    <span>Optional</span>
                                </label>

                                <input type="text" id="contact-company" name="company" class="fc-input"
                                    placeholder="Company name" autocomplete="organization">

                            </div>


                            {{-- Service --}}
                            <div class="fc-contact-field">

                                <label for="contact-service">
                                    What do you need?
                                </label>

                                <select id="contact-service" name="service" class="fc-select" required>

                                    <option value="">
                                        Select a service
                                    </option>

                                    <option value="web-app-development">
                                        Web &amp; App Development
                                    </option>

                                    <option value="e-commerce">
                                        E-Commerce
                                    </option>

                                    <option value="digital-marketing">
                                        Digital Marketing
                                    </option>

                                    <option value="custom-software">
                                        Custom Software
                                    </option>

                                    <option value="ui-ux-design">
                                        UI/UX Design
                                    </option>

                                    <option value="branding">
                                        Branding &amp; Identity
                                    </option>

                                    <option value="other">
                                        Something Else
                                    </option>

                                </select>

                            </div>


                            {{-- Budget --}}
                            <div class="fc-contact-field">

                                <label for="contact-budget">
                                    Estimated Budget
                                    <span>Optional</span>
                                </label>

                                <select id="contact-budget" name="budget" class="fc-select">

                                    <option value="">
                                        Select a range
                                    </option>

                                    <option value="under-1l">
                                        Under ₹1 Lakh
                                    </option>

                                    <option value="1l-3l">
                                        ₹1 Lakh – ₹3 Lakh
                                    </option>

                                    <option value="3l-5l">
                                        ₹3 Lakh – ₹5 Lakh
                                    </option>

                                    <option value="5l-10l">
                                        ₹5 Lakh – ₹10 Lakh
                                    </option>

                                    <option value="10l-plus">
                                        ₹10 Lakh+
                                    </option>

                                    <option value="not-sure">
                                        Not Sure Yet
                                    </option>

                                </select>

                            </div>


                            {{-- Message --}}
                            <div class="fc-contact-field">

                                <label for="contact-message">
                                    Tell us about your project
                                </label>

                                <textarea id="contact-message" name="message" class="fc-textarea" rows="5"
                                    placeholder="Tell us about your goals, requirements, timeline, or anything else that would help us understand your project."
                                    required></textarea>

                            </div>


                            {{-- Submit --}}
                            <div class="fc-contact-submit">

                                <button type="submit" class="fc-btn fc-btn-primary">

                                    Send Enquiry

                                </button>

                                <p>
                                    We'll use your information only
                                    to respond to your enquiry.
                                </p>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================
         03. WHAT HAPPENS NEXT
         ======================================================== --}}

        <section class="fc-contact-process fc-section-soft fc-section" aria-labelledby="contact-process-title">

            <div class="container">

                <div class="fc-contact-process-header">

                    <span class="fc-eyebrow">
                        What Happens Next
                    </span>

                    <h2 id="contact-process-title" class="fc-section-title">

                        Simple from the
                        <span class="fc-gradient-text">
                            first conversation.
                        </span>

                    </h2>

                </div>


                <div class="fc-contact-process-grid">


                    <article class="fc-contact-process-item">

                        <span class="fc-contact-process-number">
                            01
                        </span>

                        <h3>
                            Tell Us About It
                        </h3>

                        <p>
                            Share your idea, requirements,
                            goals, or current challenge.
                        </p>

                    </article>


                    <article class="fc-contact-process-item">

                        <span class="fc-contact-process-number">
                            02
                        </span>

                        <h3>
                            We Understand
                        </h3>

                        <p>
                            We'll review your requirements and
                            identify the right direction.
                        </p>

                    </article>


                    <article class="fc-contact-process-item">

                        <span class="fc-contact-process-number">
                            03
                        </span>

                        <h3>
                            Plan the Solution
                        </h3>

                        <p>
                            Together we'll discuss scope,
                            priorities, timelines, and next steps.
                        </p>

                    </article>


                    <article class="fc-contact-process-item">

                        <span class="fc-contact-process-number">
                            04
                        </span>

                        <h3>
                            Start Building
                        </h3>

                        <p>
                            Once everything is aligned,
                            we turn the plan into reality.
                        </p>

                    </article>

                </div>

            </div>

        </section>



        {{-- ========================================================
         04. CONTACT CTA
         ======================================================== --}}

        <section class="fc-contact-cta" aria-labelledby="contact-cta-title">

            <div class="fc-contact-cta-glow"></div>

            <div class="container">

                <div class="fc-contact-cta-inner">

                    <span class="fc-contact-cta-eyebrow">
                        Prefer a Quick Call?
                    </span>

                    <h2 id="contact-cta-title" class="fc-contact-cta-title">

                        Let's discuss your
                        <span>
                            next move.
                        </span>

                    </h2>

                    <p>
                        If you'd rather talk through your requirements,
                        schedule a conversation with our team.
                    </p>

                    <a href="#" class="fc-btn fc-btn-primary"
                        onclick="Calendly.initPopupWidget({url: 'https://calendly.com/fusioncentrix/30min?hide_event_type_details=1&hide_gdpr_banner=1'});return false;">

                        Schedule a Consultation

                    </a>

                </div>

            </div>

        </section>


    </main>
@endsection
