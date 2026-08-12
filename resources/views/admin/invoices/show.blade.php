@extends('admin.layouts.app')

@section('title', $invoice->invoice_number)

@section('content')
    <div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4 no-print">
        <div>
            <h1 class="page-title">{{ $invoice->invoice_number }}</h1>
            <div class="page-breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
                <a href="{{ route('admin.invoices.index') }}">Invoices</a>
                <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
                <span>{{ $invoice->invoice_number }}</span>
            </div>
        </div>
        <div class="d-flex gap-2">
            @if ($invoice->status === 'draft')
                <a href="{{ route('admin.invoices.edit', $invoice) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-edit me-1"></i>Edit
                </a>
                <form action="{{ route('admin.invoices.mark-sent', $invoice) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary"
                        onclick="return confirm('Mark this invoice as sent? It will no longer be editable inline.');">
                        <i class="fas fa-paper-plane me-1"></i>Mark as Sent
                    </button>
                </form>
            @endif
            @if (!in_array($invoice->status, ['paid', 'cancelled']))
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">
                    <i class="fas fa-dollar-sign me-1"></i>Record Payment
                </button>
            @endif
            <button type="button" class="btn btn-outline-secondary" onclick="window.print()">
                <i class="fas fa-print me-1"></i>Print / PDF
            </button>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm printable-card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h3 class="mb-1">INVOICE</h3>
                            <div class="text-muted">{{ $invoice->invoice_number }}</div>
                        </div>
                        <span
                            class="badge bg-{{ $invoice->status_color }} fs-6 no-print">{{ $invoice->status_label }}</span>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <small class="text-muted d-block text-uppercase">Billed To</small>
                            <strong>{{ $invoice->client->name }}</strong>
                            @if ($invoice->client->company)
                                <div>{{ $invoice->client->company }}</div>
                            @endif
                            @if ($invoice->client->billing_address)
                                <div class="text-muted small">{{ $invoice->client->billing_address }}</div>
                            @endif
                            @if ($invoice->client->email)
                                <div class="text-muted small">{{ $invoice->client->email }}</div>
                            @endif
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="mb-1"><span class="text-muted">Issue Date:</span>
                                <strong>{{ $invoice->issue_date->format('M d, Y') }}</strong>
                            </div>
                            <div class="mb-1"><span class="text-muted">Due Date:</span>
                                <strong>{{ $invoice->due_date->format('M d, Y') }}</strong>
                            </div>
                            @if ($invoice->project)
                                <div><span class="text-muted">Project:</span>
                                    <strong>{{ $invoice->project->name }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>Description</th>
                                    <th class="text-end">Qty</th>
                                    <th class="text-end">Unit Price</th>
                                    <th class="text-end">Tax</th>
                                    <th class="text-end">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice->items as $item)
                                    <tr>
                                        <td>{{ $item->description }}</td>
                                        <td class="text-end">
                                            {{ rtrim(rtrim(number_format($item->quantity, 2), '0'), '.') }}</td>
                                        <td class="text-end">{{ number_format($item->unit_price, 2) }}</td>
                                        <td class="text-end">{{ $item->tax_rate > 0 ? $item->tax_rate . '%' : '—' }}</td>
                                        <td class="text-end">{{ number_format($item->amount, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            @if ($invoice->notes)
                                <small class="text-muted d-block text-uppercase">Notes</small>
                                <p class="small">{{ $invoice->notes }}</p>
                            @endif
                            @if ($invoice->terms)
                                <small class="text-muted d-block text-uppercase">Terms</small>
                                <p class="small">{{ $invoice->terms }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted">Subtotal</span>
                                <span>{{ $invoice->currency }} {{ number_format($invoice->subtotal, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted">Tax</span>
                                <span>{{ $invoice->currency }} {{ number_format($invoice->tax_amount, 2) }}</span>
                            </div>
                            @if ($invoice->discount_amount > 0)
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted">Discount</span>
                                    <span>-{{ $invoice->currency }}
                                        {{ number_format($invoice->discount_amount, 2) }}</span>
                                </div>
                            @endif
                            <hr>
                            <div class="d-flex justify-content-between mb-1">
                                <strong>Total</strong>
                                <strong class="fs-5">{{ $invoice->currency }}
                                    {{ number_format($invoice->total_amount, 2) }}</strong>
                            </div>
                            @if ($invoice->paid_amount > 0)
                                <div class="d-flex justify-content-between mb-1 text-success">
                                    <span>Paid</span>
                                    <span>-{{ $invoice->currency }} {{ number_format($invoice->paid_amount, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <strong>Balance Due</strong>
                                    <strong class="text-danger">{{ $invoice->currency }}
                                        {{ number_format($invoice->balance_due, 2) }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment History -->
            <div class="card border-0 shadow-sm mt-4 no-print">
                <div class="card-header bg-white"><strong>Payment History</strong></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Method</th>
                                    <th>Reference</th>
                                    <th class="text-end">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($invoice->payments as $payment)
                                    <tr>
                                        <td>{{ $payment->payment_date->format('M d, Y') }}</td>
                                        <td>{{ ucfirst(str_replace('_', ' ', $payment->method)) }}</td>
                                        <td>{{ $payment->reference_number ?: '—' }}</td>
                                        <td class="text-end">{{ $invoice->currency }}
                                            {{ number_format($payment->amount, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">
                                            No payments recorded yet. This will be enabled once the Payments module is
                                            added.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 no-print">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><strong>Client</strong></div>
                <div class="card-body">
                    <a href="{{ route('admin.clients.show', $invoice->client) }}" class="text-decoration-none">
                        <strong>{{ $invoice->client->name }}</strong>
                    </a>
                    @if ($invoice->client->company)
                        <small class="text-muted d-block">{{ $invoice->client->company }}</small>
                    @endif
                </div>
            </div>

            @if ($invoice->project)
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white"><strong>Project</strong></div>
                    <div class="card-body">
                        <a href="{{ route('admin.projects.show', $invoice->project) }}" class="text-decoration-none">
                            <strong>{{ $invoice->project->name }}</strong>
                        </a>
                    </div>
                </div>
            @endif

            @if (!in_array($invoice->status, ['draft', 'paid', 'cancelled']))
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.invoices.cancel', $invoice) }}" method="POST"
                            onsubmit="return confirm('Cancel this invoice? This cannot be undone.');">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="fas fa-ban me-1"></i>Cancel Invoice
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
        <button type="button" class="btn btn-outline-secondary" onclick="window.print()">
            <i class="fas fa-print me-1"></i>Print / PDF
        </button>
    </div>
    <a href="{{ route('admin.invoices.pdf', $invoice) }}" target="_blank" class="btn btn-outline-secondary">
        <i class="fas fa-eye me-1"></i>View PDF
    </a>
    <a href="{{ route('admin.invoices.pdf.download', $invoice) }}" class="btn btn-outline-primary">
        <i class="fas fa-download me-1"></i>Download PDF
    </a>

    @include('admin.payments._record_payment_modal')
    <style>
        @media print {
            .no-print {
                display: none !important;
            }

            .printable-card {
                box-shadow: none !important;
                border: none !important;
            }
        }
    </style>
@endsection
