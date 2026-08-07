@php
    $service = $service ?? null;
@endphp

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white"><strong>Service Details</strong></div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label">Service Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $service->name ?? '') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" list="categoryList"
                               placeholder="e.g. Design, SEO, Hosting"
                               value="{{ old('category', $service->category ?? '') }}">
                        <datalist id="categoryList">
                            @foreach($categories as $category)
                                <option value="{{ $category }}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"
                                  placeholder="What's included in this service...">{{ old('description', $service->description ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white"><strong>Pricing</strong></div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-7">
                        <label class="form-label">Default Price *</label>
                        <input type="number" step="0.01" min="0" name="default_price"
                               class="form-control @error('default_price') is-invalid @enderror"
                               value="{{ old('default_price', $service->default_price ?? 0) }}" required>
                        @error('default_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-5">
                        <label class="form-label">Currency</label>
                        <select name="currency" class="form-select">
                            @foreach(['USD', 'EUR', 'GBP', 'INR', 'AUD', 'CAD'] as $currency)
                                <option value="{{ $currency }}" {{ old('currency', $service->currency ?? 'USD') == $currency ? 'selected' : '' }}>{{ $currency }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Billing Cycle *</label>
                        <select name="billing_cycle" class="form-select" required>
                            <option value="one_time" {{ old('billing_cycle', $service->billing_cycle ?? '') == 'one_time' ? 'selected' : '' }}>One-time</option>
                            <option value="monthly" {{ old('billing_cycle', $service->billing_cycle ?? '') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="quarterly" {{ old('billing_cycle', $service->billing_cycle ?? '') == 'quarterly' ? 'selected' : '' }}>Quarterly</option>
                            <option value="yearly" {{ old('billing_cycle', $service->billing_cycle ?? '') == 'yearly' ? 'selected' : '' }}>Yearly</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Default Tax Rate (%)</label>
                        <input type="number" step="0.01" min="0" max="100" name="default_tax_rate" class="form-control"
                               value="{{ old('default_tax_rate', $service->default_tax_rate ?? 0) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white"><strong>Settings</strong></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" min="0"
                           value="{{ old('sort_order', $service->sort_order ?? 0) }}">
                    <small class="text-muted">Lower numbers appear first in dropdowns.</small>
                </div>
                <div class="form-check form-switch">
                    <input type="hidden" name="is_active" value="0">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive"
                           {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="isActive">Active</label>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i>{{ $service ? 'Update Service' : 'Save Service' }}
            </button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </div>
</div>