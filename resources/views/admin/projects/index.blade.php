@extends('admin.layouts.app')

@section('title', 'Projects')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Projects</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Projects</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>Add Project
        </a>
    </div>
</div>

<!-- Stats -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 py-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-primary bg-opacity-10" style="width:44px;height:44px;">
                    <i class="fas fa-diagram-project text-primary"></i>
                </div>
                <div>
                    <h4 class="mb-0">{{ $stats['total'] }}</h4>
                    <small class="text-muted">Total Projects</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 py-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-info bg-opacity-10" style="width:44px;height:44px;">
                    <i class="fas fa-spinner text-info"></i>
                </div>
                <div>
                    <h4 class="mb-0">{{ $stats['in_progress'] }}</h4>
                    <small class="text-muted">In Progress</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 py-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-success bg-opacity-10" style="width:44px;height:44px;">
                    <i class="fas fa-circle-check text-success"></i>
                </div>
                <div>
                    <h4 class="mb-0">{{ $stats['completed'] }}</h4>
                    <small class="text-muted">Completed</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 py-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-warning bg-opacity-10" style="width:44px;height:44px;">
                    <i class="fas fa-sack-dollar text-warning"></i>
                </div>
                <div>
                    <h4 class="mb-0">{{ number_format($stats['total_budget'], 0) }}</h4>
                    <small class="text-muted">Total Budget (active)</small>
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
                    <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Project name..." value="{{ request('search') }}">
                </div>
            </div>
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
                <label class="form-label small text-muted mb-1">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="planning" {{ request('status') == 'planning' ? 'selected' : '' }}>Planning</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="on_hold" {{ request('status') == 'on_hold' ? 'selected' : '' }}>On Hold</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-6">
                <label class="form-label small text-muted mb-1">Manager</label>
                <select name="manager" class="form-select">
                    <option value="">All</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ request('manager') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-2 col-md-6">
                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter me-1"></i>Filter</button>
            </div>
        </form>
    </div>
</div>

<!-- Projects Table -->
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Project</th>
                        <th>Client</th>
                        <th>Status</th>
                        <th>Timeline</th>
                        <th>Budget</th>
                        <th>Manager</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}" class="text-decoration-none">
                                <strong>{{ $project->name }}</strong>
                            </a>
                            @if($project->is_overdue)
                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger-subtle ms-1">Overdue</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.clients.show', $project->client) }}" class="text-decoration-none text-muted">
                                {{ $project->client->name }}
                            </a>
                        </td>
                        <td>
                            <span class="badge bg-{{ $project->status_color }}">{{ $project->status_label }}</span>
                        </td>
                        <td>
                            <small class="text-muted">
                                {{ $project->start_date?->format('M d, Y') ?? '—' }} → {{ $project->end_date?->format('M d, Y') ?? '—' }}
                            </small>
                        </td>
                        <td>
                            @if($project->budget)
                                <strong>{{ $project->currency }} {{ number_format($project->budget, 2) }}</strong>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>
                            <small>{{ $project->manager->name ?? 'Unassigned' }}</small>
                        </td>
                        <td class="text-end">
                            <div class="btn-group">
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-outline-primary" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fas fa-diagram-project fa-2x d-block mb-2 opacity-50"></i>
                            No projects yet. <a href="{{ route('admin.projects.create') }}">Add your first project</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($projects->hasPages())
    <div class="card-footer bg-white">
        {{ $projects->links() }}
    </div>
    @endif
</div>
@endsection