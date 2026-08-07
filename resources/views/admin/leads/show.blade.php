@extends('admin.layouts.app')

@section('title', $lead->name . ' - Lead Details')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">{{ $lead->name }}</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.leads.index') }}">Leads</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>{{ $lead->name }}</span>
        </div>
    </div>
   <div class="d-flex align-items-center gap-2">
    <a href="{{ route('admin.leads.edit', $lead) }}" class="btn btn-outline-primary d-inline-flex align-items-center">
        <i class="fas fa-edit me-1"></i>Edit
    </a>
    <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" class="d-inline m-0 p-0">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger d-inline-flex align-items-center" onclick="return confirm('Delete this lead?')">
            <i class="fas fa-trash me-1"></i>Delete
        </button>
    </form>
</div>
</div>

<div class="row">
    <!-- Lead Details -->
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"><i class="fas fa-user me-2"></i>Lead Details</h5>
                <span class="badge" style="background-color: {{ $lead->status->color ?? '#6c757d' }}">
                    {{ $lead->status->name ?? 'Unknown' }}
                </span>
            </div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-4 text-muted">Email:</dt>
                    <dd class="col-8">
                        <a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a>
                    </dd>
                    
                    @if($lead->phone)
                    <dt class="col-4 text-muted">Phone:</dt>
                    <dd class="col-8">
                        <a href="tel:{{ $lead->phone }}">{{ $lead->phone }}</a>
                    </dd>
                    @endif
                    
                    @if($lead->company)
                    <dt class="col-4 text-muted">Company:</dt>
                    <dd class="col-8">{{ $lead->company }}</dd>
                    @endif
                    
                    @if($lead->website)
                    <dt class="col-4 text-muted">Website:</dt>
                    <dd class="col-8">
                        <a href="{{ $lead->website }}" target="_blank">{{ $lead->website }}</a>
                    </dd>
                    @endif
                    
                    @if($lead->budget)
                    <dt class="col-4 text-muted">Budget:</dt>
                    <dd class="col-8">₹{{ number_format($lead->budget) }}</dd>
                    @endif
                    
                    @if($lead->address)
                    <dt class="col-4 text-muted">Address:</dt>
                    <dd class="col-8">{{ $lead->address }}</dd>
                    @endif
                    
                    <dt class="col-4 text-muted">Source:</dt>
                    <dd class="col-8">{{ $lead->source->name ?? 'N/A' }}</dd>
                    
                    <dt class="col-4 text-muted">Assigned:</dt>
                    <dd class="col-8">{{ $lead->assignedTo->name ?? 'Unassigned' }}</dd>
                    
                    <dt class="col-4 text-muted">Created:</dt>
                    <dd class="col-8">{{ $lead->created_at->format('M d, Y') }}</dd>
                </dl>
                
                @if($lead->notes)
                <hr>
                <h6 class="text-muted mb-2">Notes</h6>
                <p class="mb-0">{{ $lead->notes }}</p>
                @endif
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $lead->email }}" class="btn btn-outline-primary">
                        <i class="fas fa-envelope me-2"></i>Send Email
                    </a>
                    @if($lead->phone)
                    <a href="tel:{{ $lead->phone }}" class="btn btn-outline-success">
                        <i class="fas fa-phone me-2"></i>Call Now
                    </a>
                    @endif
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#statusModal">
                        <i class="fas fa-exchange-alt me-2"></i>Change Status
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Follow-ups & Activity -->
    <div class="col-lg-8">
        <!-- Add Follow-up -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-plus me-2"></i>Add Follow-up</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.leads.followup.store', $lead) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-select" required>
                                <option value="call">Phone Call</option>
                                <option value="email">Email</option>
                                <option value="meeting">Meeting</option>
                                <option value="whatsapp">WhatsApp</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Notes</label>
                            <input type="text" name="notes" class="form-control" required placeholder="What happened?">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Next Follow-up</label>
                            <input type="datetime-local" name="scheduled_at" class="form-control">
                        </div>
                        <div class="col-md-1 mb-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-save"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Timeline -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-history me-2"></i>Activity Timeline</h5>
            </div>
            <div class="card-body">
                @if($lead->followups->count() > 0)
                <div class="timeline">
                    @foreach($lead->followups->sortByDesc('created_at') as $followup)
                    <div class="timeline-item pb-4 border-start ps-4 position-relative">
                        <div class="timeline-marker position-absolute bg-{{ $followup->is_completed ? 'success' : 'primary' }} rounded-circle" 
                             style="width: 12px; height: 12px; left: -6px; top: 4px;"></div>
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <div>
                                <span class="badge bg-{{ $followup->type === 'call' ? 'success' : ($followup->type === 'email' ? 'info' : 'secondary') }} me-2">
                                    <i class="fas fa-{{ $followup->type === 'call' ? 'phone' : ($followup->type === 'email' ? 'envelope' : ($followup->type === 'meeting' ? 'users' : 'comment')) }} me-1"></i>
                                    {{ ucfirst($followup->type) }}
                                </span>
                                @if(!$followup->is_completed)
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </div>
                            <small class="text-muted">{{ $followup->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1">{{ $followup->notes }}</p>
                        @if($followup->scheduled_at && !$followup->is_completed)
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>Scheduled: {{ $followup->scheduled_at->format('M d, Y h:i A') }}
                            </small>
                        @endif
                        <small class="text-muted d-block">By {{ $followup->user->name ?? 'System' }}</small>
                        
                        @if(!$followup->is_completed)
                        <form action="{{ route('admin.leads.followup.complete', $followup) }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-success">
                                <i class="fas fa-check me-1"></i>Mark Complete
                            </button>
                        </form>
                        @endif
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-muted text-center py-4 mb-0">No activity recorded yet. Add a follow-up to get started.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Change Status Modal -->
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.leads.status', $lead) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Change Lead Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">New Status</label>
                        <select name="status_id" class="form-select" required>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}" {{ $lead->status_id == $status->id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<style>
.timeline-item:last-child {
    border-left: 0 !important;
}
</style>
