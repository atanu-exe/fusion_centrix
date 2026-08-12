@extends('admin.layouts.app')

@section('title', 'Payments')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Payments</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Payments</span>
        </div>
    </div>
</div>

<!-- Stats -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 py-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-success bg-opacity-10" style="width:44px;height:44px;">
                    <i class="fas fa-sack-dollar text-success"></i>
                </div>
                <div>
                    <h4 class="mb-0">{{ number_format($stats['total_collected'], 2) }}</h4>
                    <small class="text-muted">Total Collected</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 py-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-primary bg-opacity-10" style="width:44px;height:44px;">
                    <i class="fas fa-calendar text-primary"></i>
                </div>
                <div>
                    <h4 class="mb-0">{{ number_format($stats['this_month'], 2) }}</h4>
                    <small class="text-muted">This Month</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 py-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-info bg-opacity-10" style="width:44px;height:44px;">
                    <i class="fas fa-calendar-week text-info"></i>
                </div>
                <div>
                    <h4 class="mb-0">{{ number_format($stats['this_week'], 2) }}</h4>
                    <small class="text-muted">This Week</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 py-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-secondary bg-opacity-10" style="width:44px;height:44px;">
                    <i class="fas fa-receipt text-secondary"></i>
                </div>
                <div>
                    <h4 class="mb-0">{{ $stats['count'] }}</h4>
                    <small class="text-muted">Total Payments</small>
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
                <label class="form-label small text-muted mb-1">Client</label>
                <select name="client" class="form-select">
                    <option value="">All Clients</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ request('client') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-2 col-md-6">
                <label class="form-label small text-muted mb-1">Method</label>
                <select name="method" class="form-select">
                    <option value="">All Methods</option>
                    <option value="bank_transfer" {{ request('method') == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                    <option value="card" {{ request('method') == 'card' ? 'selected' : '' }}>Card</option>
                    <option value="cash" {{ request('method') == 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="cheque" {{ request('method') == 'cheque' ? 'selected' : '' }}>Cheque</option>
                    <option value="online" {{ request('method') == 'online' ? 'selected' : '' }}>Online</option>
                    <option value="other" {{ request('method') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-6">
                <label class="form-label small text-muted mb-1">From</label>
                <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
            </div>
            <div class="col-lg-2 col-md-6">
                <label class="form-label small text-muted mb-1">To</label>
                <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
            </div>
            <div class="col-lg-2 col-md-6">
                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter me-1"></i>Filter</button>
            </div>
        </form>
    </div>
</div>

<!-- Payments Table -->
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Invoice</th>
                        <th>Client</th>
                        <th>Method</th>
                        <th>Reference</th>
                        <th>Recorded By</th>
                        <th class="text-end">Amount</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payments as $payment)
                    <tr>
                        <td><small>{{ $payment->payment_date->format('M d, Y') }}</small></td>
                        <td>
                            <a href="{{ route('admin.invoices.show', $payment->invoice) }}" class="text-decoration-none">
                                {{ $payment->invoice->invoice_number }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.clients.show', $payment->client) }}" class="text-decoration-none text-muted">
                                {{ $payment->client->name }}
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border">{{ $payment->method_label }}</span></td>
                        <td><small class="text-muted">{{ $payment->reference_number ?: '—' }}</small></td>
                        <td><small>{{ $payment->recordedBy->name ?? '—' }}</small></td>
                        <td class="text-end"><strong>{{ $payment->invoice->currency }} {{ number_format($payment->amount, 2) }}</strong></td>
                        <td class="text-end">
                            <form action="{{ route('admin.payments.destroy', $payment) }}" method="POST"
                                  onsubmit="return confirm('Remove this payment? The invoice balance will be updated.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="fas fa-receipt fa-2x d-block mb-2 opacity-50"></i>
                            No payments recorded yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($payments->hasPages())
    <div class="card-footer bg-white">
        {{ $payments->links() }}
    </div>
    @endif
</div>
@endsection