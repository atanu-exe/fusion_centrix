@extends('admin.layouts.app')

@section('title', 'Edit Salary')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Edit Salary</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.hrm.salary.index') }}">Salary</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Edit</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.hrm.salary.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-edit me-2"></i>Edit Salary Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.hrm.salary.update', $salary) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Employee Info (Read Only) -->
                    <div class="alert alert-info mb-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;">
                                <span class="text-white fw-bold">{{ substr($salary->user->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <strong>{{ $salary->user->name }}</strong>
                                <p class="mb-0 small">{{ $salary->user->email }} | Month: {{ \Carbon\Carbon::parse($salary->month . '-01')->format('F Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings -->
                    <h6 class="text-success mb-3 border-bottom pb-2"><i class="fas fa-plus-circle me-2"></i>Earnings</h6>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Basic Salary <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" step="0.01" name="basic_salary" class="form-control @error('basic_salary') is-invalid @enderror" 
                                       value="{{ old('basic_salary', $salary->basic_salary) }}" required>
                            </div>
                            @error('basic_salary')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Allowances</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" step="0.01" name="allowances" class="form-control @error('allowances') is-invalid @enderror" 
                                       value="{{ old('allowances', $salary->allowances) }}">
                            </div>
                            @error('allowances')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Overtime Pay</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" step="0.01" name="overtime" class="form-control @error('overtime') is-invalid @enderror" 
                                       value="{{ old('overtime', $salary->overtime) }}">
                            </div>
                            @error('overtime')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Bonus</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" step="0.01" name="bonus" class="form-control @error('bonus') is-invalid @enderror" 
                                       value="{{ old('bonus', $salary->bonus) }}">
                            </div>
                            @error('bonus')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Deductions -->
                    <h6 class="text-danger mb-3 border-bottom pb-2 mt-4"><i class="fas fa-minus-circle me-2"></i>Deductions</h6>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Deductions</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" step="0.01" name="deductions" class="form-control @error('deductions') is-invalid @enderror" 
                                       value="{{ old('deductions', $salary->deductions) }}">
                            </div>
                            @error('deductions')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tax</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" step="0.01" name="tax" class="form-control @error('tax') is-invalid @enderror" 
                                       value="{{ old('tax', $salary->tax) }}">
                            </div>
                            @error('tax')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="mb-4">
                        <label class="form-label">Notes</label>
                        <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" rows="3" 
                                  placeholder="Any additional notes...">{{ old('notes', $salary->notes) }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Salary
                        </button>
                        <a href="{{ route('admin.hrm.salary.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Current Summary -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-calculator me-2"></i>Salary Summary</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Basic Salary</span>
                    <span>₹{{ number_format($salary->basic_salary, 2) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Allowances</span>
                    <span class="text-success">+₹{{ number_format($salary->allowances ?? 0, 2) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Overtime</span>
                    <span class="text-success">+₹{{ number_format($salary->overtime ?? 0, 2) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Bonus</span>
                    <span class="text-success">+₹{{ number_format($salary->bonus ?? 0, 2) }}</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Deductions</span>
                    <span class="text-danger">-₹{{ number_format($salary->deductions ?? 0, 2) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Tax</span>
                    <span class="text-danger">-₹{{ number_format($salary->tax ?? 0, 2) }}</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <strong>Net Salary</strong>
                    <strong class="text-primary fs-5">₹{{ number_format($salary->net_salary, 2) }}</strong>
                </div>
            </div>
        </div>

        <!-- Status Card -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-info-circle me-2"></i>Status</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Status</span>
                    @switch($salary->status)
                        @case('paid')
                            <span class="badge bg-success">Paid</span>
                            @break
                        @case('generated')
                            <span class="badge bg-warning text-dark">Generated</span>
                            @break
                        @default
                            <span class="badge bg-secondary">{{ ucfirst($salary->status) }}</span>
                    @endswitch
                </div>
                @if($salary->payment_date)
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Payment Date</span>
                    <span>{{ \Carbon\Carbon::parse($salary->payment_date)->format('d M Y') }}</span>
                </div>
                @endif
                @if($salary->payment_method)
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Payment Method</span>
                    <span>{{ ucfirst($salary->payment_method) }}</span>
                </div>
                @endif
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Working Days</span>
                    <span>{{ $salary->working_days ?? 'N/A' }} days</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
