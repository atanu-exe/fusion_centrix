@extends('admin.layouts.app')

@section('title', 'Services')

@section('content')
    <div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="page-title">Services Catalog</h1>
            <div class="page-breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
                <span>Services</span>
            </div>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Add Service
            </a>
        </div>
    </div>

    <!-- Stats -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-primary bg-opacity-10"
                        style="width:44px;height:44px;">
                        <i class="fas fa-box text-primary"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $stats['total'] }}</h4>
                        <small class="text-muted">Total Services</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
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
        <div class="col-md-4 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-info bg-opacity-10"
                        style="width:44px;height:44px;">
                        <i class="fas fa-rotate text-info"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $stats['recurring'] }}</h4>
                        <small class="text-muted">Recurring Billing</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <form method="GET" class="row g-3 align-items-end">
                <div class="col-lg-4 col-md-6">
                    <label class="form-label small text-muted mb-1">Search</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control border-start-0 ps-0"
                            placeholder="Service name or description..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <label class="form-label small text-muted mb-1">Category</label>
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                {{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 col-md-6">
                    <label class="form-label small text-muted mb-1">Billing Cycle</label>
                    <select name="billing_cycle" class="form-select">
                        <option value="">All</option>
                        <option value="one_time" {{ request('billing_cycle') == 'one_time' ? 'selected' : '' }}>One-time
                        </option>
                        <option value="monthly" {{ request('billing_cycle') == 'monthly' ? 'selected' : '' }}>Monthly
                        </option>
                        <option value="quarterly" {{ request('billing_cycle') == 'quarterly' ? 'selected' : '' }}>Quarterly
                        </option>
                        <option value="yearly" {{ request('billing_cycle') == 'yearly' ? 'selected' : '' }}>Yearly</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6">
                    <label class="form-label small text-muted mb-1">Status</label>
                    <select name="status" class="form-select">
                        <option value="">All</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter me-1"></i>Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Services Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Service</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Billing Cycle</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                            <tr>
                                <td>
                                    <strong>{{ $service->name }}</strong>
                                    @if ($service->description)
                                        <small
                                            class="text-muted d-block">{{ Str::limit($service->description, 60) }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if ($service->category)
                                        <span class="badge bg-secondary">{{ $service->category }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $service->currency }}
                                        {{ number_format($service->default_price, 2) }}</strong>
                                    @if ($service->default_tax_rate > 0)
                                        <small class="text-muted d-block">+{{ $service->default_tax_rate }}% tax</small>
                                    @endif
                                </td>
                                <td>
                                    <span
                                        class="badge bg-light text-dark border">{{ $service->billing_cycle_label }}</span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.services.toggle', $service) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent">
                                            <span class="badge {{ $service->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group" role="group">

                                        <a href="{{ route('admin.services.edit', $service) }}"
                                            class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Delete this service?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-sm btn-outline-danger rounded-0 rounded-end"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="fas fa-box-open fa-2x d-block mb-2 opacity-50"></i>
                                    No services yet. <a href="{{ route('admin.services.create') }}">Add your first
                                        service</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if ($services->hasPages())
            <div class="card-footer bg-white">
                {{ $services->links() }}
            </div>
        @endif
    </div>
@endsection
