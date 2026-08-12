@php
    $invoice = $invoice ?? null;
    $preselectedClientId = $preselectedClientId ?? null;
    $project = $project ?? null;

    // Build initial rows: existing invoice items, prefilled project services, or one blank row
    if ($invoice) {
        $initialItems = $invoice->items
            ->map(
                fn($item) => [
                    'service_id' => $item->service_id,
                    'description' => $item->description,
                    'quantity' => (float) $item->quantity,
                    'unit_price' => (float) $item->unit_price,
                    'tax_rate' => (float) $item->tax_rate,
                ],
            )
            ->toArray();
    } elseif (!empty($prefillItems)) {
        $initialItems = $prefillItems;
    } else {
        $initialItems = [
            ['service_id' => null, 'description' => '', 'quantity' => 1, 'unit_price' => 0, 'tax_rate' => 0],
        ];
    }

    // Build this separately (not inline inside @json() below) — Blade's @json()
// directive parser can't reliably handle a nested fn() => [...] closure
    // with mixed quotes inside its argument list.
    $serviceOptions = $services
        ->map(function ($s) {
            return [
                'id' => $s->id,
                'name' => $s->name,
                'price' => (float) $s->default_price,
                'tax_rate' => (float) $s->default_tax_rate,
            ];
        })
        ->values()
        ->toArray();
@endphp

<div id="invoiceApp" data-initial-items='@json($initialItems)' data-services='@json($serviceOptions)'>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><strong>Invoice Details</strong></div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Client *</label>
                            <select id="select_client" name="client_id"
                                class="form-select @error('client_id') is-invalid @enderror" required>
                                <option value="">Select client</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}"
                                        {{ old('client_id', $invoice?->client_id ?? $preselectedClientId) == $client->id ? 'selected' : '' }}>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Project <small class="text-muted">(optional)</small></label>
                            <select name="project_id" id="select_project" class="form-select">
                                <option value="">Select project</option>
                                @if (isset($projects) && $projects->isNotEmpty())
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}"
                                            {{ old('project_id', $invoice?->project_id ?? ($project?->id ?? '')) == $project->id ? 'selected' : '' }}>
                                            {{ $project->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Issue Date *</label>
                            <input type="date" name="issue_date"
                                class="form-control @error('issue_date') is-invalid @enderror"
                                value="{{ old('issue_date', $invoice?->issue_date?->format('Y-m-d') ?? now()->format('Y-m-d')) }}"
                                required>
                            @error('issue_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Due Date *</label>
                            <input type="date" name="due_date"
                                class="form-control @error('due_date') is-invalid @enderror"
                                value="{{ old('due_date', $invoice?->due_date?->format('Y-m-d') ?? now()->addDays(15)->format('Y-m-d')) }}"
                                required>
                            @error('due_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Line Items -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <strong>Line Items</strong>
                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="addItemRow()">
                        <i class="fas fa-plus me-1"></i>Add Line
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="min-width:200px;">Description</th>
                                    <th style="width:90px;">Qty</th>
                                    <th style="width:120px;">Unit Price</th>
                                    <th style="width:90px;">Tax %</th>
                                    <th style="width:120px;" class="text-end">Amount</th>
                                    <th style="width:40px;"></th>
                                </tr>
                            </thead>
                            <tbody id="itemsBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white"><strong>Notes & Terms</strong></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Notes <small class="text-muted">(visible to client)</small></label>
                        <textarea name="notes" class="form-control" rows="2">{{ old('notes', $invoice?->notes ?? '') }}</textarea>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Payment Terms</label>
                        <textarea name="terms" class="form-control" rows="2" placeholder="e.g. Payment due within 15 days.">{{ old('terms', $invoice?->terms ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><strong>Summary</strong></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal</span>
                        <strong id="summarySubtotal">0.00</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Tax</span>
                        <strong id="summaryTax">0.00</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted">Discount</span>
                        <input type="number" step="0.01" min="0" name="discount_amount" id="discountInput"
                            class="form-control form-control-sm w-50 text-end"
                            value="{{ old('discount_amount', $invoice?->discount_amount ?? 0) }}">
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Total</strong>
                        <strong id="summaryTotal" class="fs-5">0.00</strong>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><strong>Currency & Status</strong></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Currency</label>
                        <select name="currency" class="form-select">
                            @foreach (['USD', 'EUR', 'GBP', 'INR', 'AUD', 'CAD'] as $currency)
                                <option value="{{ $currency }}"
                                    {{ old('currency', $invoice?->currency ?? ($project?->currency ?? 'USD')) == $currency ? 'selected' : '' }}>
                                    {{ $currency }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if (!$invoice)
                        <div class="mb-0">
                            <label class="form-label">Save As</label>
                            <select name="status" class="form-select">
                                <option value="draft">Draft</option>
                                <option value="sent">Sent (finalize now)</option>
                            </select>
                        </div>
                    @endif
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>{{ $invoice ? 'Update Invoice' : 'Save Invoice' }}
                </button>
                <a href="{{ $invoice ? route('admin.invoices.show', $invoice) : route('admin.invoices.index') }}"
                    class="btn btn-outline-secondary">
                    Cancel
                </a>
            </div>
        </div>
    </div>

</div>

<template id="rowTemplate">
    <tr class="item-row">
        <td>
            <select class="form-select form-select-sm service-select mb-1">
                <option value="">Custom line</option>
            </select>
            <input type="text" class="form-control form-control-sm description-input" placeholder="Description"
                required>
        </td>
        <td><input type="number" step="0.01" min="0.01" class="form-control form-control-sm qty-input"
                value="1"></td>
        <td><input type="number" step="0.01" min="0" class="form-control form-control-sm price-input"
                value="0"></td>
        <td><input type="number" step="0.01" min="0" max="100"
                class="form-control form-control-sm tax-input" value="0"></td>
        <td class="text-end amount-cell">0.00</td>
        <td><button type="button" class="btn btn-sm btn-outline-danger remove-row"><i
                    class="fas fa-trash"></i></button></td>
    </tr>
</template>

@push('scripts')
    <script>
        (function() {
            const app = document.getElementById('invoiceApp');
            const services = JSON.parse(app.dataset.services || '[]');
            const initialItems = JSON.parse(app.dataset.initialItems || '[]');
            const itemsBody = document.getElementById('itemsBody');
            const template = document.getElementById('rowTemplate');
            const form = app.closest('form');
            const selectClient = document.getElementById('select_client');
            const selectProject = document.getElementById('select_project');

            function buildServiceOptions(select) {
                services.forEach(s => {
                    const opt = document.createElement('option');
                    opt.value = s.id;
                    opt.textContent = s.name;
                    opt.dataset.price = s.price;
                    opt.dataset.taxRate = s.tax_rate;
                    select.appendChild(opt);
                });
            }

            function createRow(item) {
                const row = template.content.firstElementChild.cloneNode(true);
                const serviceSelect = row.querySelector('.service-select');
                buildServiceOptions(serviceSelect);

                const descInput = row.querySelector('.description-input');
                const qtyInput = row.querySelector('.qty-input');
                const priceInput = row.querySelector('.price-input');
                const taxInput = row.querySelector('.tax-input');

                if (item) {
                    if (item.service_id) serviceSelect.value = item.service_id;
                    descInput.value = item.description || '';
                    qtyInput.value = item.quantity ?? 1;
                    priceInput.value = item.unit_price ?? 0;
                    taxInput.value = item.tax_rate ?? 0;
                }

                serviceSelect.addEventListener('change', function() {
                    const opt = this.selectedOptions[0];
                    if (this.value) {
                        descInput.value = opt.textContent;
                        priceInput.value = opt.dataset.price;
                        taxInput.value = opt.dataset.taxRate;
                    }
                    recalc();
                });

                [qtyInput, priceInput, taxInput].forEach(el => el.addEventListener('input', recalc));
                row.querySelector('.remove-row').addEventListener('click', function() {
                    if (itemsBody.querySelectorAll('.item-row').length > 1) {
                        row.remove();
                        recalc();
                    }
                });

                itemsBody.appendChild(row);
            }

            window.addItemRow = function() {
                createRow(null);
                recalc();
            };

            function recalc() {
                let subtotal = 0,
                    tax = 0;

                itemsBody.querySelectorAll('.item-row').forEach(row => {
                    const qty = parseFloat(row.querySelector('.qty-input').value) || 0;
                    const price = parseFloat(row.querySelector('.price-input').value) || 0;
                    const taxRate = parseFloat(row.querySelector('.tax-input').value) || 0;
                    const amount = qty * price;
                    const lineTax = amount * (taxRate / 100);

                    row.querySelector('.amount-cell').textContent = amount.toFixed(2);

                    subtotal += amount;
                    tax += lineTax;
                });

                const discount = parseFloat(document.getElementById('discountInput').value) || 0;
                const total = Math.max(subtotal + tax - discount, 0);

                document.getElementById('summarySubtotal').textContent = subtotal.toFixed(2);
                document.getElementById('summaryTax').textContent = tax.toFixed(2);
                document.getElementById('summaryTotal').textContent = total.toFixed(2);
            }

            document.getElementById('discountInput').addEventListener('input', recalc);

            // Seed initial rows
            if (initialItems.length) {
                initialItems.forEach(createRow);
            } else {
                createRow(null);
            }
            recalc();

            //fecth project when select client
            selectClient.addEventListener('change', function() {
                const clientId = this.value;
                const projectInput = document.querySelector('input[name="project_id"]');
                const projectNameInput = document.querySelector('input[disabled]');

                if (!clientId) {
                    projectInput.value = '';
                    projectNameInput.value = '—';
                    return;
                }

                fetch(`/admin/clients/${clientId}/projects`)
                    .then(response => response.json())
                    .then(data => {
                        let options = `<option value="">Select project</option>`;
                        if (data.length > 0) {
                            data.forEach(project => {
                                options += `<option value="${project.id}">${project.name}</option>`;
                            });
                        }

                        selectProject.innerHTML = options;
                    })
                    .catch(error => {
                        console.error('Error fetching projects:', error);
                        projectInput.value = '';
                        projectNameInput.value = '—';
                    });
            });

            // Serialize rows into hidden inputs before submit
            form.addEventListener('submit', function() {
                // Remove any previously injected hidden inputs (in case of repeated submits)
                form.querySelectorAll('input[data-generated="1"]').forEach(el => el.remove());

                itemsBody.querySelectorAll('.item-row').forEach((row, index) => {
                    const serviceId = row.querySelector('.service-select').value;
                    const description = row.querySelector('.description-input').value;
                    const qty = row.querySelector('.qty-input').value;
                    const price = row.querySelector('.price-input').value;
                    const taxRate = row.querySelector('.tax-input').value;

                    const fields = {
                        [`items[${index}][service_id]`]: serviceId,
                        [`items[${index}][description]`]: description,
                        [`items[${index}][quantity]`]: qty,
                        [`items[${index}][unit_price]`]: price,
                        [`items[${index}][tax_rate]`]: taxRate,
                    };

                    for (const [name, value] of Object.entries(fields)) {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = name;
                        input.value = value;
                        input.dataset.generated = '1';
                        form.appendChild(input);
                    }
                });
            });
        })();
    </script>
@endpush
