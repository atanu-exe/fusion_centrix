<!-- Mobile Helper Button -->
{{-- <button id="mobileHelper" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/fusioncentrix/30min?hide_event_type_details=1&hide_gdpr_banner=1'});return false;" class="fc-mobile-helper">
    <img src="{{ asset('assets/images/help-robot.webp') }}" alt="Helper" class="fc-helper-img">
    <div class="fc-helper-speech">📅 Free Consultation</div>
</button> --}}

<!-- Quote Modal -->
<div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content fc-modal-content">
            <div class="modal-header fc-modal-header">
                <h5 class="modal-title" id="quoteModalLabel">Request a Free Quote</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="/submit-quote">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="quoteName" class="form-label fw-semibold">Your Name</label>
                        <input type="text" class="form-control" id="quoteName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="quoteEmail" class="form-label fw-semibold">Email Address</label>
                        <input type="email" class="form-control" id="quoteEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="quotePhone" class="form-label fw-semibold">Phone Number</label>
                        <input type="tel" class="form-control" id="quotePhone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="quoteService" class="form-label fw-semibold">Service</label>
                        <select class="form-select" id="quoteService" name="service" required>
                            <option value="" selected disabled>Select a service</option>
                            <option>Web & App Development</option>
                            <option>E-Commerce Solutions</option>
                            <option>Digital Marketing</option>
                            <option>Custom Software</option>
                            <option>Branding & Identity</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quoteMessage" class="form-label fw-semibold">Your Message</label>
                        <textarea class="form-control" id="quoteMessage" rows="3" name="message" required></textarea>
                    </div>
                </div>
                <div class="modal-footer p-3">
                    <button type="submit" class="btn btn-primary w-100">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>

</main>

<!-- Modern Footer -->
<footer class="fc-footer">
    <div class="container-fluid px-4 px-lg-5">
        <!-- Footer Grid -->
        <div class="row g-5 mb-5 pb-4">
            
            <!-- Brand Section -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="fc-footer-brand">
                    <div class="fc-logo-footer">
                        <span class="fc-logo-icon-footer">FC</span>
                        <span class="fc-logo-text-footer">Fusioncentrix</span>
                    </div>
                    <p class="fc-footer-desc">Fusioncentrix Solutions is your one-stop IT partner — Web, App, SEO, Marketing, Design & more.</p>
                    {{-- <div class="fc-social-footer">
                        <a href="https://www.facebook.com/fusioncentrix" target="_blank" rel="noopener noreferrer" title="Facebook" class="fc-social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/fusioncentrix" target="_blank" rel="noopener noreferrer" title="Instagram" class="fc-social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/fusioncentrix" target="_blank" rel="noopener noreferrer" title="LinkedIn" class="fc-social-link">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://twitter.com/fusioncentrix" target="_blank" rel="noopener noreferrer" title="Twitter" class="fc-social-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div> --}}
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 col-sm-12">
                <h5 class="fc-footer-title">Quick Links</h5>
                <ul class="fc-footer-links">
                    <li><a href="{{ url('') }}">Home</a></li>
                    <li><a href="{{ url('about') }}">About Us</a></li>
                    <li><a href="{{ url('services') }}">Services</a></li>
                    <li><a href="{{ url('portfolio') }}">Portfolio</a></li>
                    <li><a href="{{ url('blog') }}">Blog</a></li>
                    <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                </ul>
            </div>

            <!-- Services Links -->
            <div class="col-lg-2 col-md-6 col-sm-12">
                <h5 class="fc-footer-title">Services</h5>
                <ul class="fc-footer-links">
                    <li><a href="{{ route('services.web_app_development') }}">Web & App Dev</a></li>
                    <li><a href="{{ route('services.e_commerce') }}">E-Commerce</a></li>
                    <li><a href="{{ route('services.digital_marketing') }}">Digital Marketing</a></li>
                    <li><a href="{{ route('services.custom_software') }}">Custom Software</a></li>
                    <li><a href="{{ route('services.ui_ux_design') }}">UI/UX Design</a></li>
                    <li><a href="{{ route('services.branding_identity') }}">Branding</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h5 class="fc-footer-title">Get in Touch</h5>
                <div class="fc-contact-info">
                    <div class="fc-contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <p class="fc-contact-label">Address</p>
                            <p>Sector V, Salt Lake<br>Kolkata, India - 700091</p>
                        </div>
                    </div>
                    <div class="fc-contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <p class="fc-contact-label">Email</p>
                            <p><a href="mailto:info@fusioncentrix.com">info@fusioncentrix.com</a></p>
                        </div>
                    </div>
                    <div class="fc-contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <p class="fc-contact-label">Phone</p>
                            <p><a href="tel:+919477614409">+91 9477614409</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer Bottom -->
        <div class="fc-footer-bottom">
            <div class="row align-items-center gy-3">
                <div class="col-md-6 text-center text-md-start">
                    <p class="fc-footer-copyright">&copy; {{ date('Y') }} Fusioncentrix Solutions. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <ul class="fc-footer-bottom-links">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Calendly Integration -->
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>

</body>

</html>
