@extends('admin.layouts.app')

@section('title', 'Leave Management')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Leave Management</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Leaves</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.hrm.leaves.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>Apply for Leave
        </a>
    </div>
</div>

<!-- Leave Balance Cards -->
<div class="row mb-4">
    @foreach($leaveTypes as $type)
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            <div class="card-body text-center">
                <h5 class="text-muted mb-2">{{ $type->name }}</h5>
                <h2 class="mb-0" style="color: {{ $type->color }}">
                    {{ $leaveBalances[$type->id]['remaining'] ?? $type->days_per_year }}
                </h2>
                <small class="text-muted">of {{ $type->days_per_year }} days remaining</small>
                <div class="progress mt-2" style="height: 4px;">
                    @php
                        $used = $leaveBalances[$type->id]['used'] ?? 0;
                        $total = $type->days_per_year;
                        $percentage = $total > 0 ? ($used / $total) * 100 : 0;
                    @endphp
                    <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%; background-color: {{ $type->color }};"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- My Leave Requests -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0"><i class="fas fa-calendar-alt me-2"></i>My Leave Requests</h5>
        <div class="d-flex gap-2">
            <select class="form-select form-select-sm" id="statusFilter" onchange="filterByStatus(this.value)">
                <option value="">All Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Days</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($myLeaves as $leave)
                    <tr>
                        <td>
                            <span class="badge" style="background-color: {{ $leave->leaveType->color }}">
                                {{ $leave->leaveType->name }}
                            </span>
                        </td>
                        <td>{{ $leave->start_date->format('M d, Y') }}</td>
                        <td>{{ $leave->end_date->format('M d, Y') }}</td>
                        <td>{{ $leave->total_days }}</td>
                        <td>{{ Str::limit($leave->reason, 30) }}</td>
                        <td>
                            @if($leave->status === 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($leave->status === 'approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif($leave->status === 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($leave->status) }}</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#leaveModal{{ $leave->id }}">
                                <i class="fas fa-eye"></i>
                            </button>
                            @if($leave->status === 'pending')
                            <form action="{{ route('admin.hrm.leaves.cancel', $leave) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Cancel this leave request?')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    
                    <!-- Leave Detail Modal -->
                    <div class="modal fade" id="leaveModal{{ $leave->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Leave Request Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <dl class="row mb-0">
                                        <dt class="col-4">Type:</dt>
                                        <dd class="col-8">{{ $leave->leaveType->name }}</dd>
                                        
                                        <dt class="col-4">Period:</dt>
                                        <dd class="col-8">{{ $leave->start_date->format('M d') }} - {{ $leave->end_date->format('M d, Y') }}</dd>
                                        
                                        <dt class="col-4">Total Days:</dt>
                                        <dd class="col-8">{{ $leave->total_days }} days</dd>
                                        
                                        <dt class="col-4">Status:</dt>
                                        <dd class="col-8">
                                            @if($leave->status === 'pending')
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @elseif($leave->status === 'approved')
                                                <span class="badge bg-success">Approved</span>
                                            @else
                                                <span class="badge bg-danger">Rejected</span>
                                            @endif
                                        </dd>
                                        
                                        <dt class="col-4">Reason:</dt>
                                        <dd class="col-8">{{ $leave->reason }}</dd>
                                        
                                        @if($leave->admin_remarks)
                                        <dt class="col-4">Remarks:</dt>
                                        <dd class="col-8">{{ $leave->admin_remarks }}</dd>
                                        @endif
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No leave requests found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($myLeaves->hasPages())
    <div class="card-footer">
        {{ $myLeaves->links() }}
    </div>
    @endif
</div>

@if(in_array(auth()->user()->user_type, ['admin', 'super_admin']))
<!-- Admin: Pending Approvals -->
<div class="card mt-4">
    <div class="card-header">
        <h5 class="card-title mb-0"><i class="fas fa-clock me-2"></i>Pending Approvals</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Employee</th>
                        <th>Type</th>
                        <th>Period</th>
                        <th>Days</th>
                        <th>Reason</th>
                        <th>Applied On</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendingApprovals as $leave)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                    <span class="text-white small">{{ substr($leave->user->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <strong>{{ $leave->user->name }}</strong>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge" style="background-color: {{ $leave->leaveType->color }}">
                                {{ $leave->leaveType->name }}
                            </span>
                        </td>
                        <td>{{ $leave->start_date->format('M d') }} - {{ $leave->end_date->format('M d') }}</td>
                        <td>{{ $leave->total_days }}</td>
                        <td>{{ Str::limit($leave->reason, 25) }}</td>
                        <td>{{ $leave->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="btn-group">
                                <form action="{{ route('admin.hrm.leaves.approve', $leave) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success" title="Approve">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $leave->id }}" title="Reject">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Reject Modal -->
                    <div class="modal fade" id="rejectModal{{ $leave->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.hrm.leaves.reject', $leave) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Reject Leave Request</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Reason for Rejection</label>
                                            <textarea name="admin_remarks" class="form-control" rows="3" required placeholder="Please provide a reason..."></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Reject Leave</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No pending leave requests</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection

@push('scripts')
<script>
function filterByStatus(status) {
    const url = new URL(window.location.href);
    if (status) {
        url.searchParams.set('status', status);
    } else {
        url.searchParams.delete('status');
    }
    window.location.href = url.toString();
}
</script>
@endpush
