@extends('admin.layouts.app')

@section('title', 'Attendance Report')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Attendance Report</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.hrm.attendance.index') }}">Attendance</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Report</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.hrm.attendance.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>Back
        </a>
    </div>
</div>

<!-- Filter Form -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Month</label>
                <input type="month" name="month" class="form-control" value="{{ $month }}" onchange="this.form.submit()">
            </div>
            <div class="col-md-4">
                <label class="form-label">Employee</label>
                <select name="user_id" class="form-select" onchange="this.form.submit()">
                    <option value="">All Employees</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-success" onclick="window.print()">
                    <i class="fas fa-print me-1"></i>Print Report
                </button>
                <a href="{{ route('admin.hrm.attendance.report', ['month' => $month]) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-undo me-1"></i>Reset
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Report Summary -->
@if($attendances->count() > 0)
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title mb-0">
            <i class="fas fa-chart-pie me-2"></i>
            Summary for {{ \Carbon\Carbon::parse($month)->format('F Y') }}
        </h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Employee</th>
                        <th class="text-center">Present</th>
                        <th class="text-center">Late</th>
                        <th class="text-center">Absent</th>
                        <th class="text-center">Half Day</th>
                        <th class="text-center">On Leave</th>
                        <th class="text-center">Working Hours</th>
                        <th class="text-center">Overtime</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($summary as $userId => $data)
                    @php $user = $users->find($userId); @endphp
                    @if($user)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                    <span class="text-white small">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <strong>{{ $user->name }}</strong>
                                    <small class="text-muted d-block">{{ $user->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-success">{{ $data['present'] }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-warning text-dark">{{ $data['late'] }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-danger">{{ $data['absent'] }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-info">{{ $data['half_day'] }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-secondary">{{ $data['on_leave'] }}</span>
                        </td>
                        <td class="text-center">
                            <strong>{{ number_format($data['total_hours'], 1) }} hrs</strong>
                        </td>
                        <td class="text-center">
                            @if($data['overtime'] > 0)
                                <span class="text-success">+{{ number_format($data['overtime'], 1) }} hrs</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <th>Total ({{ count($summary) }} employees)</th>
                        <th class="text-center">{{ collect($summary)->sum('present') }}</th>
                        <th class="text-center">{{ collect($summary)->sum('late') }}</th>
                        <th class="text-center">{{ collect($summary)->sum('absent') }}</th>
                        <th class="text-center">{{ collect($summary)->sum('half_day') }}</th>
                        <th class="text-center">{{ collect($summary)->sum('on_leave') }}</th>
                        <th class="text-center">{{ number_format(collect($summary)->sum('total_hours'), 1) }} hrs</th>
                        <th class="text-center">{{ number_format(collect($summary)->sum('overtime'), 1) }} hrs</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Detailed Records -->
@foreach($attendances as $userId => $records)
@php $user = $users->find($userId); @endphp
@if($user)
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">
            <i class="fas fa-user me-2"></i>{{ $user->name }}
        </h5>
        <span class="badge bg-primary">{{ $records->count() }} records</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Day</th>
                        <th class="text-center">Check In</th>
                        <th class="text-center">Check Out</th>
                        <th class="text-center">Working Hours</th>
                        <th class="text-center">Status</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records->sortBy('date') as $record)
                    <tr>
                        <td>{{ $record->date->format('d M Y') }}</td>
                        <td>{{ $record->date->format('l') }}</td>
                        <td class="text-center">
                            @if($record->check_in)
                                {{ $record->check_in->format('h:i A') }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($record->check_out)
                                {{ $record->check_out->format('h:i A') }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($record->working_hours)
                                {{ number_format($record->working_hours, 1) }} hrs
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @switch($record->status)
                                @case('present')
                                    <span class="badge bg-success">Present</span>
                                    @break
                                @case('late')
                                    <span class="badge bg-warning text-dark">Late</span>
                                    @break
                                @case('absent')
                                    <span class="badge bg-danger">Absent</span>
                                    @break
                                @case('half_day')
                                    <span class="badge bg-info">Half Day</span>
                                    @break
                                @case('on_leave')
                                    <span class="badge bg-secondary">On Leave</span>
                                    @break
                                @default
                                    <span class="badge bg-light text-dark">{{ ucfirst($record->status) }}</span>
                            @endswitch
                        </td>
                        <td>
                            <small class="text-muted">{{ $record->notes ?? '-' }}</small>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endforeach

@else
<div class="card">
    <div class="card-body text-center py-5">
        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
        <h5>No Attendance Records</h5>
        <p class="text-muted mb-0">No attendance records found for {{ \Carbon\Carbon::parse($month)->format('F Y') }}.</p>
    </div>
</div>
@endif

<style>
@media print {
    .page-header, form, .btn, .nav, .sidebar, .navbar {
        display: none !important;
    }
    .card {
        border: 1px solid #ddd !important;
        box-shadow: none !important;
    }
}
</style>
@endsection
