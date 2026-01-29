@extends('admin.layouts.app')

@section('title', 'Salary Management')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Salary Management</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Salary</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generateModal">
            <i class="fas fa-calculator me-1"></i>Generate Salary
        </button>
    </div>
</div>

<!-- Summary Stats -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <h6 class="text-white-50 mb-2">Total Payroll ({{ $selectedMonth }})</h6>
                <h3 class="mb-0">₹{{ number_format($stats['total_payroll']) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <h6 class="text-white-50 mb-2">Paid</h6>
                <h3 class="mb-0">₹{{ number_format($stats['paid']) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-warning text-dark h-100">
            <div class="card-body">
                <h6 class="opacity-75 mb-2">Pending</h6>
                <h3 class="mb-0">₹{{ number_format($stats['pending']) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-info text-white h-100">
            <div class="card-body">
                <h6 class="text-white-50 mb-2">Employees</h6>
                <h3 class="mb-0">{{ $stats['employee_count'] }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Salary List -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0"><i class="fas fa-money-bill-wave me-2"></i>Salary Records</h5>
        <form class="d-flex gap-2" method="GET">
            <input type="month" name="month" class="form-control" value="{{ $selectedMonth }}" onchange="this.form.submit()">
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Employee</th>
                        <th class="text-end">Basic Salary</th>
                        <th class="text-end">Allowances</th>
                        <th class="text-end">Deductions</th>
                        <th class="text-end">Net Salary</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($salaries as $salary)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 36px; height: 36px;">
                                    <span class="text-white">{{ substr($salary->user->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <strong>{{ $salary->user->name }}</strong>
                                    <small class="text-muted d-block">{{ $salary->user->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-end">₹{{ number_format($salary->basic_salary) }}</td>
                        <td class="text-end text-success">+₹{{ number_format($salary->total_allowances) }}</td>
                        <td class="text-end text-danger">-₹{{ number_format($salary->total_deductions) }}</td>
                        <td class="text-end"><strong>₹{{ number_format($salary->net_salary) }}</strong></td>
                        <td>
                            @if($salary->status === 'paid')
                                <span class="badge bg-success">Paid</span>
                            @elseif($salary->status === 'processing')
                                <span class="badge bg-info">Processing</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.hrm.salary.edit', $salary) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.hrm.salary.payslip', $salary) }}" class="btn btn-sm btn-outline-secondary" title="Payslip" target="_blank">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                                @if($salary->status !== 'paid')
                                <button type="button" class="btn btn-sm btn-outline-success" title="Mark as Paid" 
                                        data-bs-toggle="modal" data-bs-target="#markPaidModal{{ $salary->id }}">
                                    <i class="fas fa-check"></i>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            No salary records for {{ $selectedMonth }}. 
                            <a href="#" data-bs-toggle="modal" data-bs-target="#generateModal">Generate now</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($salaries->hasPages())
    <div class="card-footer">
        {{ $salaries->links() }}
    </div>
    @endif
</div>

<!-- Generate Salary Modal -->
<div class="modal fade" id="generateModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.hrm.salary.generate') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Generate Monthly Salary</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Select Month</label>
                        <input type="month" name="month" class="form-control" value="{{ date('Y-m') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employees</label>
                        <select name="user_ids[]" class="form-select" multiple>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                        <small class="text-muted">Leave empty to generate for all employees</small>
                    </div>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Salary will be calculated based on attendance records and employee's base salary configuration.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Generate Salary</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Mark as Paid Modals -->
@foreach($salaries as $salary)
@if($salary->status !== 'paid')
<div class="modal fade" id="markPaidModal{{ $salary->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.hrm.salary.mark-paid', $salary) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Mark Salary as Paid</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <strong>{{ $salary->user->name }}</strong><br>
                        Net Salary: <strong>₹{{ number_format($salary->net_salary, 2) }}</strong>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Payment Date <span class="text-danger">*</span></label>
                        <input type="date" name="payment_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Payment Method <span class="text-danger">*</span></label>
                        <select name="payment_method" class="form-select" required>
                            <option value="">Select Method</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                            <option value="upi">UPI</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Transaction ID</label>
                        <input type="text" name="transaction_id" class="form-control" placeholder="Optional">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check me-2"></i>Mark as Paid
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endforeach
@endsection
