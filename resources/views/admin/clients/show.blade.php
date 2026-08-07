@extends('admin.layouts.app')

@section('title', $client->name)

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">{{ $client->name }}</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.clients.index') }}">Clients</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>{{ $client->name }}</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-outline-primary">
            <i class="fas fa-edit me-1"></i>Edit
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <strong>Client Information</strong>
                <span class="badge {{ $client->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                    {{ ucfirst($client->status) }}
                </span>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <small class="text-muted d-block">Company</small>
                        {{ $client->company ?: '—' }}
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">Email</small>
                        {{ $client->email ?: '—' }}
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">Phone</small>
                        {{ $client->phone ?: '—' }}
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">Website</small>
                        {{ $client->website ?: '—' }}
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">Billing Address</small>
                        {{ $client->billing_address ?: '—' }}
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">Location</small>
                        {{ collect([$client->city, $client->state, $client->country])->filter()->implode(', ') ?: '—' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white"><strong>Projects</strong></div>
            <div class="card-body text-muted text-center py-4">
                Projects module coming next — this section will list projects for {{ $client->name }}.
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white"><strong>Billing</strong></div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Currency</span>
                    <strong>{{ $client->currency }}</strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Payment Terms</span>
                    <strong>{{ $client->payment_terms_days }} days</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Outstanding Balance</span>
                    <strong class="text-danger">
                        {{-- Will populate once Invoices module exists --}}
                        —
                    </strong>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white"><strong>Ownership</strong></div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Account Manager</span>
                    <strong>{{ $client->accountManager->name ?? 'Unassigned' }}</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Added by</span>
                    <strong>{{ $client->creator->name ?? '—' }}</strong>
                </div>
            </div>
        </div>

        @if($client->converted_from_lead_id)
        <div class="alert alert-info d-flex align-items-center gap-2 mb-0">
            <i class="fas fa-arrow-right-arrow-left"></i>
            <small>
                Converted from
                <a href="{{ route('admin.leads.show', $client->converted_from_lead_id) }}">original lead</a>.
            </small>
        </div>
        @else
        <div class="alert alert-secondary d-flex align-items-center gap-2 mb-0">
            <i class="fas fa-user-plus"></i>
            <small>Entered directly as a client.</small>
        </div>
        @endif
    </div>
</div>
@endsection