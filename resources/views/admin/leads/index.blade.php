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
        <a href="{{ route('admin.leads.export') }}" class="btn btn-outline-primary">
            <i class="fas fa-download me-1"></i>Export
        </a>
        <a href="{{ route('admin.leads.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>Add Lead
        </a>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-md-2 col-6 mb-3">
        <div class="card h-100">
            <div class="card-body text-center py-3">
                <h3 class="mb-1">{{ $stats['total'] }}</h3>
                <small class="text-muted">Total Leads</small>
            </div>
        </div>
    </div>
    @foreach($statuses as $status)
    <div class="col-md-2 col-6 mb-3">
        <div class="card h-100">
            <div class="card-body text-center py-3">
                <h3 class="mb-1" style="color: {{ $status->color }}">{{ $stats[$status->slug] ?? 0 }}</h3>
                <small class="text-muted">{{ $status->name }}</small>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body py-3">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Name, email, phone..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ request('status') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Source</label>
                <select name="source" class="form-select">
                    <option value="">All Sources</option>
                    @foreach($sources as $source)
                        <option value="{{ $source->id }}" {{ request('source') == $source->id ? 'selected' : '' }}>{{ $source->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Assigned To</label>
                <select name="assigned" class="form-select">
                    <option value="">All Users</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ request('assigned') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary me-2"><i class="fas fa-search me-1"></i>Filter</button>
                <a href="{{ route('admin.leads.index') }}" class="btn btn-outline-secondary">Clear</a>
            </div>
        </form>
    </div>
</div>

<!-- Leads Table -->
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>
                            <input type="checkbox" class="form-check-input" id="selectAll">
                        </th>
                        <th>Lead</th>
                        <th>Contact</th>
                        <th>Source</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Last Activity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input lead-checkbox" value="{{ $lead->id }}">
                        </td>
                        <td>
                            <a href="{{ route('admin.leads.show', $lead) }}" class="text-decoration-none">
                                <strong>{{ $lead->name }}</strong>
                            </a>
                            @if($lead->company)
                                <small class="text-muted d-block">{{ $lead->company }}</small>
                            @endif
                        </td>
                        <td>
                            <div>
                                <a href="mailto:{{ $lead->email }}" class="text-decoration-none">{{ $lead->email }}</a>
                            </div>
                            @if($lead->phone)
                            <small>
                                <a href="tel:{{ $lead->phone }}" class="text-muted">{{ $lead->phone }}</a>
                            </small>
                            @endif
                        </td>
                        <td>
                            @if($lead->source)
                                <span class="badge bg-secondary">{{ $lead->source->name }}</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge" style="background-color: {{ $lead->status->color ?? '#6c757d' }}">
                                {{ $lead->status->name ?? 'Unknown' }}
                            </span>
                        </td>
                        <td>
                            @if($lead->assignedTo)
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-1" style="width: 24px; height: 24px;">
                                        <span class="text-white" style="font-size: 0.65rem;">{{ substr($lead->assignedTo->name, 0, 1) }}</span>
                                    </div>
                                    <small>{{ $lead->assignedTo->name }}</small>
                                </div>
                            @else
                                <span class="text-muted">Unassigned</span>
                            @endif
                        </td>
                        <td>
                            <small class="text-muted">{{ $lead->updated_at->diffForHumans() }}</small>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.leads.show', $lead) }}" class="btn btn-sm btn-outline-primary" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.leads.edit', $lead) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-info" title="Add Followup" data-bs-toggle="modal" data-bs-target="#followupModal{{ $lead->id }}">
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
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
                                            <input type="datetime-local" name="scheduled_at" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save Follow-up</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">
                            No leads found. <a href="{{ route('admin.leads.create') }}">Add your first lead</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($leads->hasPages())
    <div class="card-footer">
        {{ $leads->links() }}
    </div>
    @endif
</div>

<!-- Bulk Actions -->
<div class="card mt-3" id="bulkActions" style="display: none;">
    <div class="card-body py-2">
        <form action="{{ route('admin.leads.bulk-assign') }}" method="POST" class="d-flex align-items-center gap-3">
            @csrf
            <input type="hidden" name="lead_ids" id="selectedLeadIds">
            <span class="text-muted"><span id="selectedCount">0</span> leads selected</span>
            <select name="assigned_to" class="form-select form-select-sm" style="width: 200px;" required>
                <option value="">Assign to...</option>
                @foreach($users as $user)
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
