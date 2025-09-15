<button id="mobileHelper" class="btn consult-helper border-0" data-bs-toggle="modal" data-bs-target="#quoteModal">
  <img src="{{ asset('assets/images/help-robot.png') }}" alt="Helper" class="helper-img">
  <div class="helper-speech">Hi! Need help?</div>
</button>
<!-- Get a Quote Modal -->
<div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header bg-primary text-white rounded-top-4">
        <h5 class="modal-title" id="quoteModalLabel">Request a Free Quote</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="/submit-quote">
        <div class="modal-body p-4">
          <div class="mb-3">
            <label for="quoteName" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="quoteName" name="name" required>
          </div>
          <div class="mb-3">
            <label for="quoteEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="quoteEmail" name="email" required>
          </div>
          <div class="mb-3">
            <label for="quotePhone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="quotePhone" name="phone">
          </div>
          <div class="mb-3">
            <label for="quoteService" class="form-label">Service</label>
            <select class="form-select" id="quoteService" name="service" required>
              <option value="" selected disabled>Select a service</option>
              <option>Web & App Development</option>
              <option>eCommerce Solutions</option>
              <option>Custom Software</option>
              <option>Brand Merchandise</option>
              <option>Logo & Graphics Design</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="quoteMessage" class="form-label">Your Message</label>
            <textarea class="form-control" id="quoteMessage" rows="3" name="message" required></textarea>
          </div>
        </div>
        <div class="modal-footer p-3">
          <button type="submit" class="btn btn-success w-100">Submit Request</button>
        </div>
      </form>
    </div>
  </div>
</div>


</main>
<footer class="footer mt-5 text-white bg-gradient-dark">
    <div class="container py-5">
        <div class="row">
            <!-- Brand -->
            <div class="col-md-3 mb-4">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Fusioncentrix Logo" style="width: 160px;">
                <p class="mt-3">Fusioncentrix Solutions is your one-stop IT partner — Web, SEO, Marketing, Design &
                    more.</p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-3 mb-4">
                <h5 class="footer-heading">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="/" class="footer-link">Home</a></li>
                    <li><a href="/about" class="footer-link">About Us</a></li>
                    <li><a href="/services" class="footer-link">Services</a></li>
                    <li><a href="/contact" class="footer-link">Contact</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="col-md-3 mb-4">
                <h5 class="footer-heading">Services</h5>
                <ul class="list-unstyled">
                    <li><a href="/web-development" class="footer-link">Web & App Development</a></li>
                    <li><a href="/seo" class="footer-link">SEO & Promotion</a></li>
                    <li><a href="/branding" class="footer-link">Branding & Ads</a></li>
                    <li><a href="/design" class="footer-link">Graphics & Logo</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-md-3 mb-4">
                <h5 class="footer-heading">Contact</h5>
                <p class="mb-1">Sector V, Salt Lake, Kolkata</p>
                <p class="mb-1">West Bengal, India - 700091</p>
                <p class="mb-1">📞 +91-9876543210</p>
                <p class="mb-1">📧 contact@fusioncentrix.com</p>

                <div class="social-icons mt-3">
                    <a href="https://www.facebook.com/fusioncentrix" target="_blank"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/fusioncentrix" target="_blank"><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/fusioncentrix" target="_blank"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center py-3 bg-dark">
        <small>&copy; {{ date('Y') }} Fusioncentrix Solutions. All rights reserved.</small>
    </div>
</footer>
<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
