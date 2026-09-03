</main>

{{-- ============================================================
     FUSIONCENTRIX V2 — PREMIUM FOOTER
     ============================================================ --}}

<footer class="fc-footer" aria-labelledby="footer-brand-title">

    <div class="fc-footer-glow" aria-hidden="true"></div>

    <div class="container">

        {{-- =====================================================
             TOP
             ===================================================== --}}

        <div class="fc-footer-top">

            {{-- Brand --}}
            <div class="fc-footer-brand">

                <a href="{{ url('') }}" class="fc-footer-logo" aria-label="FusionCentrix Home">

                    <img src="{{ asset('/logo.png') }}" alt="FusionCentrix"
                        class="fc-footer-logo-image">

                </a>


                <h2 id="footer-brand-title">

                    Digital solutions built
                    for businesses that want to grow.

                </h2>


                <p>

                    Web, applications, SEO, design, and digital
                    solutions — bringing technology and strategy
                    together under one roof.

                </p>


                {{-- Social --}}
                <div class="fc-footer-social">

                    <a href="#" aria-label="LinkedIn" class="fc-footer-social-link">

                        <i class="fab fa-linkedin-in"></i>

                    </a>

                    <a href="#" aria-label="Instagram" class="fc-footer-social-link">

                        <i class="fab fa-instagram"></i>

                    </a>

                    <a href="#" aria-label="Facebook" class="fc-footer-social-link">

                        <i class="fab fa-facebook-f"></i>

                    </a>

                </div>

            </div>


            {{-- =================================================
                 COMPANY
                 ================================================= --}}

            <nav class="fc-footer-nav" aria-label="Company">

                <h3>
                    Company
                </h3>

                <a href="{{ url('about') }}">
                    About Us
                </a>

                <a href="{{ url('services') }}">
                    Services
                </a>

                <a href="{{ url('portfolio') }}">
                    Portfolio
                </a>

                <a href="{{ url('blog') }}">
                    Blog
                </a>

                <a href="{{ url('contact-us') }}">
                    Contact
                </a>

            </nav>


            {{-- =================================================
                 SERVICES
                 ================================================= --}}

            <nav class="fc-footer-nav" aria-label="Services">

                <h3>
                    Services
                </h3>

                <a href="{{ route('services.web_app_development') }}">
                    Web &amp; App Development
                </a>

                <a href="{{ route('services.e_commerce') }}">
                    E-Commerce
                </a>

                <a href="{{ route('services.digital_marketing') }}">
                    Digital Marketing
                </a>

                <a href="{{ route('services.custom_software') }}">
                    Custom Software
                </a>

                <a href="{{ route('services.ui_ux_design') }}">
                    UI/UX Design
                </a>

                <a href="{{ route('services.branding_identity') }}">
                    Branding &amp; Identity
                </a>

            </nav>

        </div>


        {{-- =====================================================
             CONTACT BAR
             ===================================================== --}}

        <div class="fc-footer-contact">

            <div class="fc-footer-contact-heading">

                <span>
                    Start a conversation
                </span>

                <strong>
                    Let's build something together.
                </strong>

            </div>


            <div class="fc-footer-contact-details">

                <a href="mailto:info@fusioncentrix.com">

                    info@fusioncentrix.com

                </a>

                <a href="tel:+918282098384">

                    +91 82820 98384

                </a>

                <span>

                    Kolkata, India

                </span>

            </div>

        </div>


        {{-- =====================================================
             BOTTOM
             ===================================================== --}}

        <div class="fc-footer-bottom">

            <p>

                &copy; {{ date('Y') }}
                Fusioncentrix Solutions.
                All rights reserved.

            </p>


            <nav class="fc-footer-legal" aria-label="Legal">

                <a href="#">
                    Privacy Policy
                </a>

                <a href="#">
                    Terms of Service
                </a>

                <a href="#">
                    Cookie Policy
                </a>

            </nav>

        </div>

    </div>

</footer>


{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

@vite(['resources/js/app.js'])


{{-- Calendly --}}
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">

<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>

</body>

</html>
