@php
    $client = $client ?? null;
@endphp

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white"><strong>Client Details</strong></div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $client->name ?? '') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Company</label>
                        <input type="text" name="company" class="form-control"
                               value="{{ old('company', $client->company ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $client->email ?? '') }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control"
                               value="{{ old('phone', $client->phone ?? '') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Alternate Phone</label>
                        <input type="text" name="alternate_phone" class="form-control"
                               value="{{ old('alternate_phone', $client->alternate_phone ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Website</label>
                        <input type="text" name="website" class="form-control"
                               value="{{ old('website', $client->website ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tax Number</label>
                        <input type="text" name="tax_number" class="form-control"
                               value="{{ old('tax_number', $client->tax_number ?? '') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white"><strong>Address</strong></div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Billing Address</label>
                        <textarea name="billing_address" class="form-control" rows="2">{{ old('billing_address', $client->billing_address ?? '') }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Shipping Address <small class="text-muted">(leave blank if same as billing)</small></label>
                        <textarea name="shipping_address" class="form-control" rows="2">{{ old('shipping_address', $client->shipping_address ?? '') }}</textarea>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">City</label>
                        <input type="text" name="city" class="form-control" value="{{ old('city', $client->city ?? '') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">State</label>
                        <input type="text" name="state" class="form-control" value="{{ old('state', $client->state ?? '') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Country</label>
                        <input type="text" name="country" class="form-control" value="{{ old('country', $client->country ?? '') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Postal Code</label>
                        <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code', $client->postal_code ?? '') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white"><strong>Notes</strong></div>
            <div class="card-body">
                <textarea name="notes" class="form-control" rows="3" placeholder="Internal notes about this client...">{{ old('notes', $client->notes ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white"><strong>Billing Settings</strong></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Currency</label>
                    <select name="currency" class="form-select">
                        @foreach(['USD', 'EUR', 'GBP', 'INR', 'AUD', 'CAD'] as $currency)
                            <option value="{{ $currency }}" {{ old('currency', $client->currency ?? 'USD') == $currency ? 'selected' : '' }}>{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-0">
                    <label class="form-label">Payment Terms (days)</label>
                    <input type="number" name="payment_terms_days" class="form-control" min="0" max="365"
                           value="{{ old('payment_terms_days', $client->payment_terms_days ?? 15) }}">
                    <small class="text-muted">Invoice due date = issue date + this many days.</small>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white"><strong>Ownership</strong></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Account Manager</label>
                    <select name="account_manager_id" class="form-select">
                        <option value="">Unassigned</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('account_manager_id', $client->account_manager_id ?? '') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-0">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" {{ old('status', $client->status ?? 'active') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $client->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
        </div>

        @if($client && $client->converted_from_lead_id)
        <div class="alert alert-info d-flex align-items-center gap-2 mb-4">
            <i class="fas fa-arrow-right-arrow-left"></i>
            <small>This client was converted from a lead.</small>
        </div>
        @endif

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i>{{ $client ? 'Update Client' : 'Save Client' }}
            </button>
            <a href="{{ $client ? route('admin.clients.show', $client) : route('admin.clients.index') }}" class="btn btn-outline-secondary">
                Cancel
            </a>
        </div>
    </div>
</div>