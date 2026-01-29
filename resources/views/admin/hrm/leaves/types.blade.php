@extends('admin.layouts.app')

@section('title', 'Leave Types')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Leave Types</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.hrm.leaves.index') }}">Leaves</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Types</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTypeModal">
            <i class="fas fa-plus me-1"></i>Add Leave Type
        </button>
    </div>
</div>

<!-- Leave Types List -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0"><i class="fas fa-list me-2"></i>Leave Types</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Days Per Year</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Used By</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leaveTypes as $type)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle me-2" style="width: 12px; height: 12px; background-color: {{ $type->color ?? '#6c757d' }};"></div>
                                <strong>{{ $type->name }}</strong>
                            </div>
                        </td>
                        <td>{{ $type->days_per_year }} days</td>
                        <td>
                            @if($type->is_paid)
                                <span class="badge bg-success">Paid</span>
                            @else
                                <span class="badge bg-secondary">Unpaid</span>
                            @endif
                        </td>
                        <td>
                            @if($type->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $type->leave_requests_count }} requests</span>
                        </td>
                        <td class="text-end">
                            <button type="button" class="btn btn-sm btn-outline-primary" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editTypeModal{{ $type->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Edit Modal for each type -->
                    <div class="modal fade" id="editTypeModal{{ $type->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.hrm.leave-types.update', $type) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Leave Type</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" value="{{ $type->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Days Per Year <span class="text-danger">*</span></label>
                                            <input type="number" name="days_per_year" class="form-control" value="{{ $type->days_per_year }}" min="0" max="365" required>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="is_paid" class="form-check-input" id="isPaid{{ $type->id }}" value="1" {{ $type->is_paid ? 'checked' : '' }}>
                                                <label class="form-check-label" for="isPaid{{ $type->id }}">Paid Leave</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="is_active" class="form-check-input" id="isActive{{ $type->id }}" value="1" {{ $type->is_active ? 'checked' : '' }}>
                                                <label class="form-check-label" for="isActive{{ $type->id }}">Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-folder-open fa-2x text-muted mb-2"></i>
                            <p class="text-muted mb-0">No leave types found.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Leave Type Modal -->
<div class="modal fade" id="addTypeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.hrm.leave-types.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Leave Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="e.g., Annual Leave" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Days Per Year <span class="text-danger">*</span></label>
                        <input type="number" name="days_per_year" class="form-control" value="12" min="0" max="365" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_paid" class="form-check-input" id="isPaidNew" value="1" checked>
                            <label class="form-check-label" for="isPaidNew">Paid Leave</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Leave Type</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
