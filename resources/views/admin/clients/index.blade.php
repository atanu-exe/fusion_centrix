@extends('admin.layouts.app')

@section('title', 'Clients')

@section('content')
    <div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="page-title">Clients</h1>
            <div class="page-breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
                <span>Clients</span>
            </div>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Add Client
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
                        <i class="fas fa-building text-primary"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $stats['total'] }}</h4>
                        <small class="text-muted">Total Clients</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-success bg-opacity-10"
                        style="width:44px;height:44px;">
                        <i class="fas fa-circle-check text-success"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $stats['active'] }}</h4>
                        <small class="text-muted">Active</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-info bg-opacity-10"
                        style="width:44px;height:44px;">
                        <i class="fas fa-arrow-right-arrow-left text-info"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $stats['from_leads'] }}</h4>
                        <small class="text-muted">Converted from Lead</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-secondary bg-opacity-10"
                        style="width:44px;height:44px;">
                        <i class="fas fa-user-plus text-secondary"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $stats['direct'] }}</h4>
                        <small class="text-muted">Direct Entry</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <form method="GET" id="filterForm">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label small text-muted mb-1">Search</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-start-0 ps-0"
                                placeholder="Name, company, email, phone..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label small text-muted mb-1">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label small text-muted mb-1">Origin</label>
                        <select name="origin" class="form-select">
                            <option value="">All</option>
                            <option value="direct" {{ request('origin') == 'direct' ? 'selected' : '' }}>Direct Entry
                            </option>
                            <option value="lead" {{ request('origin') == 'lead' ? 'selected' : '' }}>From Lead</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label small text-muted mb-1">Account Manager</label>
                        <select name="account_manager" class="form-select">
                            <option value="">All Users</option>
                            <option value="unassigned" {{ request('account_manager') == 'unassigned' ? 'selected' : '' }}>
                                Unassigned</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ request('account_manager') == $user->id ? 'selected' : '' }}>{{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-filter me-1"></i>Filter
                        </button>
                    </div>
                </div>
            </form>

            @php
                $activeFilters = collect(request()->only(['search', 'status', 'origin', 'account_manager']))->filter(
                    fn($v) => filled($v),
                );
            @endphp
            @if ($activeFilters->isNotEmpty())
                <div class="d-flex flex-wrap align-items-center gap-2 mt-3 pt-3 border-top">
                    <small class="text-muted me-1">Active filters:</small>
                    @foreach ($activeFilters as $key => $value)
                        <span class="badge bg-light text-dark border fw-normal">
                            {{ ucfirst(str_replace('_', ' ', $key)) }}: {{ $value }}
                            <a href="{{ request()->fullUrlWithQuery([$key => null]) }}"
                                class="text-danger text-decoration-none ms-1">&times;</a>
                        </span>
                    @endforeach
                    <a href="{{ route('admin.clients.index') }}"
                        class="btn btn-sm btn-link text-danger text-decoration-none p-0 ms-2">Clear all</a>
                </div>
            @endif
        </div>
    </div>

    <!-- Clients Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <span class="text-muted small">
                Showing {{ $clients->firstItem() ?? 0 }}–{{ $clients->lastItem() ?? 0 }} of {{ $clients->total() }}
                clients
            </span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Client</th>
                            <th>Contact</th>
                            <th>Origin</th>
                            <th>Account Manager</th>
                            <th>Status</th>
                            <th>Added</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clients as $client)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.clients.show', $client) }}" class="text-decoration-none">
                                        <strong>{{ $client->name }}</strong>
                                    </a>
                                    @if ($client->company)
                                        <small class="text-muted d-block">{{ $client->company }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if ($client->email)
                                        <div><a href="mailto:{{ $client->email }}"
                                                class="text-decoration-none">{{ $client->email }}</a></div>
                                    @endif
                                    @if ($client->phone)
                                        <small><a href="tel:{{ $client->phone }}"
                                                class="text-muted">{{ $client->phone }}</a></small>
                                    @endif
                                </td>
                                <td>
                                    @if ($client->converted_from_lead_id)
                                        <span class="badge bg-info bg-opacity-10 text-info border border-info-subtle">From
                                            Lead</span>
                                    @else
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border">Direct</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($client->accountManager)
                                        <small>{{ $client->accountManager->name }}</small>
                                    @else
                                        <span class="text-muted">Unassigned</span>
                                    @endif
                                </td>
                                <td>
                                    <span
                                        class="badge {{ $client->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ ucfirst($client->status) }}
                                    </span>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $client->created_at->diffForHumans() }}</small>
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex">

                                        <a href="{{ route('admin.clients.show', $client) }}"
                                            class="btn btn-sm btn-outline-primary rounded-start rounded-0">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.clients.edit', $client) }}"
                                            class="btn btn-sm btn-outline-secondary rounded-0">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.clients.destroy', $client) }}" method="POST"
                                            class="d-inline m-0">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-sm btn-outline-danger rounded-end rounded-0"
                                                onclick="return confirm('Delete this client? This cannot be undone.');">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="fas fa-building fa-2x d-block mb-2 opacity-50"></i>
                                    No clients found.
                                    @if ($activeFilters->isNotEmpty())
                                        <a href="{{ route('admin.clients.index') }}">Clear filters</a>
                                    @else
                                        <a href="{{ route('admin.clients.create') }}">Add your first client</a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if ($clients->hasPages())
            <div class="card-footer bg-white">
                {{ $clients->links() }}
            </div>
        @endif
    </div>
@endsection
