<!-- Record Payment Modal -->
<div class="modal fade" id="recordPaymentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.invoices.payments.store', $invoice) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Record Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-light border d-flex justify-content-between mb-3">
                        <span class="text-muted">Balance Due</span>
                        <strong class="text-danger">{{ $invoice->currency }} {{ number_format($invoice->balance_due, 2) }}</strong>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Amount *</label>
                        <input type="number" step="0.01" min="0.01" max="{{ $invoice->balance_due }}"
                               name="amount" class="form-control" value="{{ $invoice->balance_due }}" required>
                        <small class="text-muted">Leave as-is for full payment, or reduce for a partial payment.</small>
                    </div>
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-label">Payment Date *</label>
                            <input type="date" name="payment_date" class="form-control" value="{{ now()->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Method *</label>
                            <select name="method" class="form-select" required>
                                <option value="bank_transfer">Bank Transfer</option>
                                <option value="card">Card</option>
                                <option value="cash">Cash</option>
                                <option value="cheque">Cheque</option>
                                <option value="online">Online</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">Reference Number</label>
                        <input type="text" name="reference_number" class="form-control" placeholder="Transaction ID, cheque number, etc.">
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Notes</label>
                        <textarea name="notes" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-dollar-sign me-1"></i>Record Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>