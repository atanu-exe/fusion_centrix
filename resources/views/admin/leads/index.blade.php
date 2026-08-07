@extends('admin.layouts.app')

@section('title', 'Leads')

@section('content')
    <div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="page-title">Lead Management</h1>
            <div class="page-breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
                <span>Leads</span>
            </div>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.leads.import.form') }}" class="btn btn-outline-success">
                <i class="fas fa-upload me-1"></i>Import
            </a>
            <a href="{{ route('admin.leads.export', request()->query()) }}" class="btn btn-outline-primary">
                <i class="fas fa-download me-1"></i>Export
            </a>
            <a href="{{ route('admin.leads.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Add Lead
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-3">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-primary bg-opacity-10"
                        style="width:44px;height:44px;">
                        <i class="fas fa-users text-primary"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $stats['total'] }}</h4>
                        <small class="text-muted">Total Leads</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-info bg-opacity-10"
                        style="width:44px;height:44px;">
                        <i class="fas fa-calendar-plus text-info"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $stats['new_today'] }}</h4>
                        <small class="text-muted">New Today</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-warning bg-opacity-10"
                        style="width:44px;height:44px;">
                        <i class="fas fa-phone-volume text-warning"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $stats['needs_followup'] }}</h4>
                        <small class="text-muted">Needs Follow-up</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-danger bg-opacity-10"
                        style="width:44px;height:44px;">
                        <i class="fas fa-user-slash text-danger"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $stats['unassigned'] }}</h4>
                        <small class="text-muted">Unassigned</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Status breakdown pills -->
    @if ($statuses->count())
        <div class="d-flex flex-wrap gap-2 mb-4">
            @foreach ($statuses as $status)
                <a href="{{ request()->fullUrlWithQuery(['status' => $status->id]) }}"
                    class="badge rounded-pill text-decoration-none px-3 py-2 {{ request('status') == $status->id ? 'border border-2' : '' }}"
                    style="background-color: {{ $status->color ?? '#6c757d' }}1a; color: {{ $status->color ?? '#6c757d' }}; border-color: {{ $status->color ?? '#6c757d' }} !important;">
                    {{ $status->name }} <span class="fw-semibold ms-1">{{ $stats[$status->slug] ?? 0 }}</span>
                </a>
            @endforeach
        </div>
    @endif

    <!-- Filters -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <form method="GET" id="filterForm">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-5 col-md-6">
                        <label class="form-label small text-muted mb-1">Search</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-start-0 ps-0"
                                placeholder="Name, email, phone, company..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="form-label small text-muted mb-1">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}"
                                    {{ request('status') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-filter me-1"></i>Filter
                        </button>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <button type="button" class="btn btn-outline-secondary w-100" data-bs-toggle="collapse"
                            data-bs-target="#advancedFilters">
                            <i class="fas fa-sliders-h me-1"></i>More Filters
                        </button>
                    </div>
                </div>

                <div class="collapse {{ request()->hasAny(['source', 'assigned_to', 'priority', 'date_from', 'date_to', 'sort', 'dir']) ? 'show' : '' }}"
                    id="advancedFilters">
                    <hr class="my-3">
                    <div class="row g-3 align-items-end">
                        <div class="col-lg-2 col-md-4 col-6">
                            <label class="form-label small text-muted mb-1">Source</label>
                            <select name="source" class="form-select">
                                <option value="">All Sources</option>
                                @foreach ($sources as $source)
                                    <option value="{{ $source->id }}"
                                        {{ request('source') == $source->id ? 'selected' : '' }}>{{ $source->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <label class="form-label small text-muted mb-1">Assigned To</label>
                            <select name="assigned_to" class="form-select">
                                <option value="">All Users</option>
                                <option value="unassigned" {{ request('assigned_to') == 'unassigned' ? 'selected' : '' }}>
                                    Unassigned</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ request('assigned_to') == $user->id ? 'selected' : '' }}>{{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <label class="form-label small text-muted mb-1">Priority</label>
                            <select name="priority" class="form-select">
                                <option value="">All Priorities</option>
                                <option value="urgent" {{ request('priority') == 'urgent' ? 'selected' : '' }}>Urgent
                                </option>
                                <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                                <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium
                                </option>
                                <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <label class="form-label small text-muted mb-1">From Date</label>
                            <input type="date" name="date_from" class="form-control"
                                value="{{ request('date_from') }}">
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <label class="form-label small text-muted mb-1">To Date</label>
                            <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <label class="form-label small text-muted mb-1">Sort By</label>
                            <select name="sort" class="form-select">
                                <option value="created_at"
                                    {{ request('sort', 'created_at') == 'created_at' ? 'selected' : '' }}>Date Added
                                </option>
                                <option value="last_contacted"
                                    {{ request('sort') == 'last_contacted' ? 'selected' : '' }}>Last Contacted</option>
                                <option value="last_followup" {{ request('sort') == 'last_followup' ? 'selected' : '' }}>
                                    Last Follow-up</option>
                                <option value="next_followup" {{ request('sort') == 'next_followup' ? 'selected' : '' }}>
                                    Next Follow-up</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                                <option value="priority" {{ request('sort') == 'priority' ? 'selected' : '' }}>Priority
                                </option>
                                <option value="value" {{ request('sort') == 'value' ? 'selected' : '' }}>Estimated Value
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 align-items-end mt-1">
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label small text-muted mb-1 d-block">Order</label>
                            <div class="btn-group w-100" role="group">
                                <input type="radio" class="btn-check" name="dir" id="dirDesc" value="desc"
                                    autocomplete="off" {{ request('dir', 'desc') == 'desc' ? 'checked' : '' }}>
                                <label class="btn btn-outline-secondary" for="dirDesc">
                                    <i class="fas fa-arrow-down-wide-short me-1"></i>Descending
                                </label>

                                <input type="radio" class="btn-check" name="dir" id="dirAsc" value="asc"
                                    autocomplete="off" {{ request('dir') == 'asc' ? 'checked' : '' }}>
                                <label class="btn btn-outline-secondary" for="dirAsc">
                                    <i class="fas fa-arrow-up-wide-short me-1"></i>Ascending
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <label class="form-label small text-muted mb-1">Per Page</label>
                            <select name="per_page" class="form-select">
                                @foreach ([10, 20, 50, 100] as $count)
                                    <option value="{{ $count }}"
                                        {{ (int) request('per_page', 20) == $count ? 'selected' : '' }}>
                                        {{ $count }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>

            @php
                $activeFilters = collect(
                    request()->only(['search', 'status', 'source', 'assigned_to', 'priority', 'date_from', 'date_to']),
                )->filter(fn($v) => filled($v));
            @endphp
            @if ($activeFilters->isNotEmpty())
                <div class="d-flex flex-wrap align-items-center gap-2 mt-3 pt-3 border-top">
                    <small class="text-muted me-1">Active filters:</small>

                    @if (request('search'))
                        <span class="badge bg-light text-dark border fw-normal">
                            Search: "{{ request('search') }}"
                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                class="text-danger text-decoration-none ms-1">&times;</a>
                        </span>
                    @endif

                    @if (request('status'))
                        <span class="badge bg-light text-dark border fw-normal">
                            Status: {{ $statuses->firstWhere('id', request('status'))?->name }}
                            <a href="{{ request()->fullUrlWithQuery(['status' => null]) }}"
                                class="text-danger text-decoration-none ms-1">&times;</a>
                        </span>
                    @endif

                    @if (request('source'))
                        <span class="badge bg-light text-dark border fw-normal">
                            Source: {{ $sources->firstWhere('id', request('source'))?->name }}
                            <a href="{{ request()->fullUrlWithQuery(['source' => null]) }}"
                                class="text-danger text-decoration-none ms-1">&times;</a>
                        </span>
                    @endif

                    @if (request('assigned_to'))
                        <span class="badge bg-light text-dark border fw-normal">
                            Assigned:
                            {{ request('assigned_to') == 'unassigned' ? 'Unassigned' : $users->firstWhere('id', request('assigned_to'))?->name }}
                            <a href="{{ request()->fullUrlWithQuery(['assigned_to' => null]) }}"
                                class="text-danger text-decoration-none ms-1">&times;</a>
                        </span>
                    @endif

                    @if (request('priority'))
                        <span class="badge bg-light text-dark border fw-normal">
                            Priority: {{ ucfirst(request('priority')) }}
                            <a href="{{ request()->fullUrlWithQuery(['priority' => null]) }}"
                                class="text-danger text-decoration-none ms-1">&times;</a>
                        </span>
                    @endif

                    @if (request('date_from') || request('date_to'))
                        <span class="badge bg-light text-dark border fw-normal">
                            Date: {{ request('date_from', '…') }} → {{ request('date_to', '…') }}
                            <a href="{{ request()->fullUrlWithQuery(['date_from' => null, 'date_to' => null]) }}"
                                class="text-danger text-decoration-none ms-1">&times;</a>
                        </span>
                    @endif

                    <a href="{{ route('admin.leads.index') }}"
                        class="btn btn-sm btn-link text-danger text-decoration-none p-0 ms-2">
                        Clear all
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Leads Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <span class="text-muted small">
                Showing {{ $leads->firstItem() ?? 0 }}–{{ $leads->lastItem() ?? 0 }} of {{ $leads->total() }} leads
            </span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 40px;">
                                <input type="checkbox" class="form-check-input" id="selectAll">
                            </th>
                            <th>Lead</th>
                            <th>Contact</th>
                            <th>Source</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            <th>Last Activity</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leads as $lead)
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input lead-checkbox"
                                        value="{{ $lead->id }}">
                                </td>
                                <td>
                                    <a href="{{ route('admin.leads.show', $lead) }}" class="text-decoration-none">
                                        <strong>{{ $lead->name }}</strong>
                                    </a>
                                    @if ($lead->company)
                                        <small class="text-muted d-block">{{ $lead->company }}</small>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <a href="mailto:{{ $lead->email }}"
                                            class="text-decoration-none">{{ $lead->email }}</a>
                                    </div>
                                    @if ($lead->phone)
                                        <small>
                                            <a href="tel:{{ $lead->phone }}" class="text-muted">{{ $lead->phone }}</a>
                                        </small>
                                    @endif
                                </td>
                                <td>
                                    @if ($lead->source)
                                        <span class="badge bg-secondary">{{ $lead->source->name }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge"
                                        style="background-color: {{ $lead->status->color ?? '#6c757d' }}">
                                        {{ $lead->status->name ?? 'Unknown' }}
                                    </span>
                                </td>
                                <td>
                                    @if ($lead->assignee)
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-1"
                                                style="width: 24px; height: 24px;">
                                                <span class="text-white"
                                                    style="font-size: 0.65rem;">{{ substr($lead->assignee->name, 0, 1) }}</span>
                                            </div>
                                            <small>{{ $lead->assignee->name }}</small>
                                        </div>
                                    @else
                                        <span class="text-muted">Unassigned</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">{{ $lead->updated_at->diffForHumans() }}</small>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.leads.show', $lead) }}"
                                            class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.leads.edit', $lead) }}"
                                            class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-info" title="Add Followup"
                                            data-bs-toggle="modal" data-bs-target="#followupModal{{ $lead->id }}">
                                            <i class="fas fa-phone"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Quick Followup Modal -->
                            <div class="modal fade" id="followupModal{{ $lead->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.leads.followup.store', $lead) }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add Follow-up for {{ $lead->name }}</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Type</label>
                                                    <select name="type" class="form-select" required>
                                                        <option value="call">Phone Call</option>
                                                        <option value="email">Email</option>
                                                        <option value="meeting">Meeting</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Notes</label>
                                                    <textarea name="notes" class="form-control" rows="3" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Next Follow-up Date</label>
                                                    <input type="datetime-local" name="scheduled_at"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save Follow-up</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="fas fa-inbox fa-2x d-block mb-2 opacity-50"></i>
                                    No leads found matching your filters.
                                    @if ($activeFilters->isNotEmpty())
                                        <a href="{{ route('admin.leads.index') }}">Clear filters</a>
                                    @else
                                        <a href="{{ route('admin.leads.create') }}">Add your first lead</a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if ($leads->hasPages())
            <div class="card-footer bg-white">
                {{ $leads->links() }}
            </div>
        @endif
    </div>

    <!-- Bulk Actions -->
    <div class="card mt-3 border-0 shadow-sm" id="bulkActions" style="display: none;">
        <div class="card-body py-2">
            <form action="{{ route('admin.leads.bulk-assign') }}" method="POST"
                class="d-flex align-items-center gap-3">
                @csrf
                <input type="hidden" name="lead_ids" id="selectedLeadIds">
                <span class="text-muted"><span id="selectedCount">0</span> leads selected</span>
                <select name="assigned_to" class="form-select form-select-sm" style="width: 200px;" required>
                    <option value="">Assign to...</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-sm btn-primary">Assign</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Auto-submit filter form when a top-level select changes
        document.getElementById('filterForm').querySelectorAll('select[name="status"]').forEach(function(el) {
            el.addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
        });

        // Bulk selection
        const selectAll = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.lead-checkbox');
        const bulkActions = document.getElementById('bulkActions');
        const selectedCount = document.getElementById('selectedCount');
        const selectedLeadIds = document.getElementById('selectedLeadIds');

        selectAll.addEventListener('change', function() {
            checkboxes.forEach(cb => cb.checked = this.checked);
            updateBulkActions();
        });

        checkboxes.forEach(cb => {
            cb.addEventListener('change', updateBulkActions);
        });

        function updateBulkActions() {
            const selected = document.querySelectorAll('.lead-checkbox:checked');
            const count = selected.length;
            selectedCount.textContent = count;
            bulkActions.style.display = count > 0 ? 'block' : 'none';
            selectedLeadIds.value = Array.from(selected).map(cb => cb.value).join(',');
        }
    </script>
@endpush
