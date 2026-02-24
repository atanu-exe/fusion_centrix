<div id="getQuoteModal" class="modal fade" tabindex="-1" aria-labelledby="getQuoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg overflow-hidden bg-white">
            <div class="modal-body p-4 text-center">
                <div class="mb-3">
                    <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center fc-primary-bg" style="width:72px;height:72px;">
                        <i class="fas fa-paper-plane fa-2x text-white"></i>
                    </div>
                </div>
                <h5 id="getQuoteModalLabel" class="fw-bold mb-2 text-dark">Ready to grow? Get a free quote</h5>
                <p class="text-muted mb-3">Tell us about your project and we'll send a tailored plan — no obligation.</p>
                <ul class="list-unstyled text-start mx-auto mb-3" style="max-width:320px;">
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Fast response within 24 hours</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Custom pricing and timeline</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>No commitment</li>
                </ul>
                <div class="d-flex gap-2 justify-content-center">
                    <a href="{{ route('contact_us') }}" class="fc-btn fc-btn-primary">Get My Free Quote</a>
                    <button type="button" class="fc-btn fc-btn-secondary" data-bs-dismiss="modal">Maybe later</button>
                </div>
            </div>
        </div>
    </div>
</div>