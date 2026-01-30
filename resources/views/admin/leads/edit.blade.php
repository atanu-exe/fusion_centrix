@extends('admin.layouts.app')

@section('title', 'Edit Lead')

@section('content')
<div class="page-header mb-4">
    <h1 class="page-title">Edit Lead</h1>
    <div class="page-breadcrumb">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
        <a href="{{ route('admin.leads.index') }}">Leads</a>
        <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
        <span>Edit</span>
    </div>
</div>

<form action="{{ route('admin.leads.update', $lead) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-user me-2"></i>Lead Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $lead->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email', $lead->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                                   value="{{ old('phone', $lead->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Alternate Phone</label>
                            <input type="text" name="alternate_phone" class="form-control @error('alternate_phone') is-invalid @enderror" 
                                   value="{{ old('alternate_phone', $lead->alternate_phone) }}">
                            @error('alternate_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Company</label>
                            <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" 
                                   value="{{ old('company', $lead->company) }}">
                            @error('company')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" 
                                   value="{{ old('designation', $lead->designation) }}">
                            @error('designation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Website</label>
                            <input type="url" name="website" class="form-control @error('website') is-invalid @enderror" 
                                   value="{{ old('website', $lead->website) }}" placeholder="https://">
                            @error('website')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Estimated Value</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" name="estimated_value" class="form-control @error('estimated_value') is-invalid @enderror" 
                                       value="{{ old('estimated_value', $lead->estimated_value) }}" step="0.01">
                            </div>
                            @error('estimated_value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-map-marker-alt me-2"></i>Address Information</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" 
                                  rows="2">{{ old('address', $lead->address) }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" 
                                   value="{{ old('city', $lead->city) }}">
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">State</label>
                            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" 
                                   value="{{ old('state', $lead->state) }}">
                            @error('state')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" 
                                   value="{{ old('country', $lead->country) }}">
                            @error('country')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Postal Code</label>
                            <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" 
                                   value="{{ old('postal_code', $lead->postal_code) }}">
                            @error('postal_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Description -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-file-alt me-2"></i>Description</h5>
                </div>
                <div class="card-body">
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                              rows="5" placeholder="Detailed information about this lead...">{{ old('description', $lead->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-cog me-2"></i>Lead Settings</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="lead_status_id" class="form-select @error('lead_status_id') is-invalid @enderror" required>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}" {{ old('lead_status_id', $lead->lead_status_id) == $status->id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('lead_status_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Source</label>
                        <select name="lead_source_id" class="form-select @error('lead_source_id') is-invalid @enderror">
                            <option value="">Select Source</option>
                            @foreach($sources as $source)
                                <option value="{{ $source->id }}" {{ old('lead_source_id', $lead->lead_source_id) == $source->id ? 'selected' : '' }}>
                                    {{ $source->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('lead_source_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Priority <span class="text-danger">*</span></label>
                        <select name="priority" class="form-select @error('priority') is-invalid @enderror" required>
                            <option value="low" {{ old('priority', $lead->priority) == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ old('priority', $lead->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ old('priority', $lead->priority) == 'high' ? 'selected' : '' }}>High</option>
                            <option value="urgent" {{ old('priority', $lead->priority) == 'urgent' ? 'selected' : '' }}>Urgent</option>
                        </select>
                        @error('priority')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Assign To</label>
                        <select name="assigned_to" class="form-select @error('assigned_to') is-invalid @enderror">
                            <option value="">Unassigned</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('assigned_to', $lead->assigned_to) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('assigned_to')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Expected Close Date</label>
                        <input type="date" name="expected_close_date" class="form-control @error('expected_close_date') is-invalid @enderror" 
                               value="{{ old('expected_close_date', $lead->expected_close_date?->format('Y-m-d')) }}">
                        @error('expected_close_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Lead Info Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-info-circle me-2"></i>Lead Info</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Created</span>
                        <span>{{ $lead->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Updated</span>
                        <span>{{ $lead->updated_at->format('d M Y, H:i') }}</span>
                    </div>
                    @if($lead->creator)
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Created By</span>
                        <span>{{ $lead->creator->name }}</span>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>Update Lead
                </button>
                <a href="{{ route('admin.leads.show', $lead) }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </div>
    </div>
</form>
@endsection
