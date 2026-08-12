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
    <div class="card-header d-flex justify-content-between align-items-center bg-white">
        <h5 class="mb-0">
            <i class="fas fa-diagram-project me-2 text-primary"></i>
            Projects
        </h5>

        <a href="{{ route('admin.projects.create', ['client_id' => $client->id]) }}"
            class="btn btn-sm btn-primary">
            <i class="fas fa-plus me-1"></i>
            New Project
        </a>
    </div>

    <div class="card-body p-0">

        @forelse($client->projects as $project)

            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">

                <div>

                    <h6 class="mb-1">
                        <a href="{{ route('admin.projects.show', $project) }}"
                            class="text-decoration-none">
                            {{ $project->name }}
                        </a>
                    </h6>

                    <small class="text-muted">

                        @if($project->start_date)
                            {{ $project->start_date->format('d M Y') }}
                        @endif

                        @if($project->end_date)
                            • {{ $project->end_date->format('d M Y') }}
                        @endif

                    </small>

                </div>

                <div>

                    @switch($project->status)

                        @case('planning')
                            <span class="badge bg-secondary">Planning</span>
                            @break

                        @case('in_progress')
                            <span class="badge bg-primary">In Progress</span>
                            @break

                        @case('on_hold')
                            <span class="badge bg-warning">On Hold</span>
                            @break

                        @case('completed')
                            <span class="badge bg-success">Completed</span>
                            @break

                        @case('cancelled')
                            <span class="badge bg-danger">Cancelled</span>
                            @break

                    @endswitch

                </div>

            </div>

        @empty

            <div class="text-center py-5">

                <i class="fas fa-diagram-project fa-3x text-muted mb-3"></i>

                <h6>No Projects Found</h6>

                <p class="text-muted mb-3">
                    This client doesn't have any projects yet.
                </p>

                <a href="{{ route('admin.projects.create', ['client_id' => $client->id]) }}"
                    class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>
                    Create First Project
                </a>

            </div>

        @endforelse

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