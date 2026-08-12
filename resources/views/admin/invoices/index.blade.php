@extends('admin.layouts.app')

@section('title', 'Invoices')

@section('content')
    <div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="page-title">Invoices</h1>
            <div class="page-breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
                <span>Invoices</span>
            </div>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.invoices.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Create Invoice
            </a>
        </div>
    </div>

    <!-- Stats -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-primary bg-opacity-10"
                        style="width:44px;height:44px;">
                        <i class="fas fa-file-invoice-dollar text-primary"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ number_format($stats['outstanding'], 2) }}</h4>
                        <small class="text-muted">Outstanding Balance</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-danger bg-opacity-10"
                        style="width:44px;height:44px;">
                        <i class="fas fa-triangle-exclamation text-danger"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $stats['overdue_count'] }}</h4>
                        <small class="text-muted">Overdue Invoices</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-success bg-opacity-10"
                        style="width:44px;height:44px;">
                        <i class="fas fa-sack-dollar text-success"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ number_format($stats['paid_this_month'], 2) }}</h4>
                        <small class="text-muted">Paid This Month</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-secondary bg-opacity-10"
                        style="width:44px;height:44px;">
                        <i class="fas fa-file-pen text-secondary"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $stats['draft_count'] }}</h4>
                        <small class="text-muted">Drafts</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <form method="GET" class="row g-3 align-items-end">
                <div class="col-lg-3 col-md-6">
                    <label class="form-label small text-muted mb-1">Search</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control border-start-0 ps-0"
                            placeholder="Invoice number..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="form-label small text-muted mb-1">Client</label>
                    <select name="client" class="form-select">
                        <option value="">All Clients</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ request('client') == $client->id ? 'selected' : '' }}>
                                {{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 col-md-6">
                    <label class="form-label small text-muted mb-1">Status</label>
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="sent" {{ request('status') == 'sent' ? 'selected' : '' }}>Sent</option>
                        <option value="partially_paid" {{ request('status') == 'partially_paid' ? 'selected' : '' }}>
                            Partially Paid</option>
                        <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="overdue" {{ request('status') == 'overdue' ? 'selected' : '' }}>Overdue</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                        </option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="form-check mt-4 pt-1">
                        <input class="form-check-input" type="checkbox" name="overdue_only" value="1" id="overdueOnly"
                            {{ request('overdue_only') ? 'checked' : '' }}>
                        <label class="form-check-label" for="overdueOnly">Overdue only</label>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter me-1"></i>Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Invoices Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Invoice #</th>
                            <th>Client</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>Total</th>
                            <th>Balance Due</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($invoices as $invoice)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.invoices.show', $invoice) }}" class="text-decoration-none">
                                        <strong>{{ $invoice->invoice_number }}</strong>
                                    </a>
                                    @if ($invoice->project)
                                        <small class="text-muted d-block">{{ $invoice->project->name }}</small>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.clients.show', $invoice->client) }}"
                                        class="text-decoration-none text-muted">
                                        {{ $invoice->client->name }}
                                    </a>
                                </td>
                                <td><small>{{ $invoice->issue_date->format('M d, Y') }}</small></td>
                                <td><small>{{ $invoice->due_date->format('M d, Y') }}</small></td>
                                <td><strong>{{ $invoice->currency }}
                                        {{ number_format($invoice->total_amount, 2) }}</strong></td>
                                <td>
                                    @if ($invoice->balance_due > 0)
                                        <span class="text-danger">{{ $invoice->currency }}
                                            {{ number_format($invoice->balance_due, 2) }}</span>
                                    @else
                                        <span class="text-success">Paid in full</span>
                                    @endif
                                </td>
                                <td>
                                    <span
                                        class="badge bg-{{ $invoice->status_color }}">{{ $invoice->status_label }}</span>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group">

                                        <!-- View -->
                                        <a href="{{ route('admin.invoices.show', $invoice) }}"
                                            class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <!-- Edit -->
                                        @if ($invoice->status === 'draft')
                                            <a href="{{ route('admin.invoices.edit', $invoice) }}"
                                                class="btn btn-sm btn-outline-secondary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @else
                                            <!-- Send Email -->
                                            <form action="{{ route('admin.invoices.send-email', $invoice) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-success"
                                                    title="Send Email"
                                                    onclick="return confirm('Send this invoice to {{ $invoice->client->email }}?')">
                                                    <i class="fas fa-paper-plane"></i>
                                                </button>
                                            </form>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="fas fa-file-invoice fa-2x d-block mb-2 opacity-50"></i>
                                    No invoices yet. <a href="{{ route('admin.invoices.create') }}">Create your first
                                        invoice</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if ($invoices->hasPages())
            <div class="card-footer bg-white">
                {{ $invoices->links() }}
            </div>
        @endif
    </div>
@endsection
