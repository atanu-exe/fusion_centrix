@extends('admin.layouts.app')

@section('title', 'Attendance')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Attendance Management</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Attendance</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.hrm.attendance.report') }}" class="btn btn-outline-primary">
            <i class="fas fa-file-alt me-1"></i>Reports
        </a>
    </div>
</div>

<!-- Today's Status Card -->
<div class="row mb-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-clock me-2"></i>Today's Attendance - {{ now()->format('F d, Y') }}</h5>
            </div>
            <div class="card-body">
                @if($todayAttendance)
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <p class="text-muted mb-1">Check In Time</p>
                            <h4 class="mb-0">{{ $todayAttendance->check_in->format('h:i A') }}</h4>
                        </div>
                        <div class="text-center">
                            @if($todayAttendance->check_out)
                                <span class="badge bg-success fs-6">Completed</span>
                            @else
                                <span class="badge bg-warning text-dark fs-6">Working</span>
                            @endif
                        </div>
                        <div class="text-end">
                            @if($todayAttendance->check_out)
                                <p class="text-muted mb-1">Check Out Time</p>
                                <h4 class="mb-0">{{ $todayAttendance->check_out->format('h:i A') }}</h4>
                            @else
                                <p class="text-muted mb-1">Working Hours</p>
                                <h4 class="mb-0" id="liveTimer">{{ now()->diff($todayAttendance->check_in)->format('%H:%I:%S') }}</h4>
                            @endif
                        </div>
                    </div>
                    
                    @if($todayAttendance->is_late)
                        <div class="alert alert-warning mb-3">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Late by {{ $todayAttendance->late_minutes }} minutes
                        </div>
                    @endif
                    
                    @if(!$todayAttendance->check_out)
                        <form action="{{ route('admin.hrm.attendance.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-sign-out-alt me-2"></i>Check Out
                            </button>
                        </form>
                    @else
                        <div class="alert alert-info mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            Total Working Hours: <strong>{{ number_format($todayAttendance->working_hours, 2) }} hrs</strong>
                        </div>
                    @endif
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-fingerprint text-muted mb-3" style="font-size: 3rem;"></i>
                        <p class="text-muted mb-3">You haven't checked in today</p>
                        <form action="{{ route('admin.hrm.attendance.checkin') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Check In Now
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-chart-pie me-2"></i>This Month's Summary</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="border rounded p-3 text-center">
                            <h3 class="text-success mb-1">{{ $monthStats['present'] ?? 0 }}</h3>
                            <small class="text-muted">Present Days</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border rounded p-3 text-center">
                            <h3 class="text-danger mb-1">{{ $monthStats['absent'] ?? 0 }}</h3>
                            <small class="text-muted">Absent Days</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border rounded p-3 text-center">
                            <h3 class="text-warning mb-1">{{ $monthStats['late'] ?? 0 }}</h3>
                            <small class="text-muted">Late Days</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border rounded p-3 text-center">
                            <h3 class="text-info mb-1">{{ number_format($monthStats['hours'] ?? 0, 1) }}</h3>
                            <small class="text-muted">Total Hours</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Attendance History -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0"><i class="fas fa-history me-2"></i>Attendance History</h5>
        <form class="d-flex gap-2" method="GET">
            <input type="month" name="month" class="form-control" value="{{ $selectedMonth }}" onchange="this.form.submit()">
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Working Hours</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $attendance)
                    <tr>
                        <td>
                            <strong>{{ $attendance->date->format('D, M d, Y') }}</strong>
                        </td>
                        <td>{{ $attendance->check_in ? $attendance->check_in->format('h:i A') : '-' }}</td>
                        <td>{{ $attendance->check_out ? $attendance->check_out->format('h:i A') : '-' }}</td>
                        <td>{{ $attendance->working_hours ? number_format($attendance->working_hours, 2) . ' hrs' : '-' }}</td>
                        <td>
                            @if($attendance->is_late)
                                <span class="badge bg-warning text-dark">Late</span>
                            @elseif($attendance->status === 'present')
                                <span class="badge bg-success">Present</span>
                            @elseif($attendance->status === 'half_day')
                                <span class="badge bg-info">Half Day</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($attendance->status) }}</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No attendance records found for this month</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($attendances->hasPages())
    <div class="card-footer">
        {{ $attendances->links() }}
    </div>
    @endif
</div>

@if($isAdmin)
<!-- Admin: All Team Attendance -->
<div class="card mt-4">
    <div class="card-header">
        <h5 class="card-title mb-0"><i class="fas fa-users me-2"></i>Team Attendance Today</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Employee</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Status</th>
                        <th>Working Hours</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teamAttendance as $record)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                    <span class="text-white small">{{ substr($record->user->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <strong>{{ $record->user->name }}</strong>
                                    <small class="text-muted d-block">{{ $record->user->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ $record->check_in ? $record->check_in->format('h:i A') : '-' }}</td>
                        <td>{{ $record->check_out ? $record->check_out->format('h:i A') : '-' }}</td>
                        <td>
                            @if($record->is_late)
                                <span class="badge bg-warning text-dark">Late</span>
                            @elseif($record->check_out)
                                <span class="badge bg-success">Completed</span>
                            @else
                                <span class="badge bg-info">Working</span>
                            @endif
                        </td>
                        <td>{{ $record->working_hours ? number_format($record->working_hours, 2) . ' hrs' : 'In Progress' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No attendance records today</td>
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
@if($todayAttendance && !$todayAttendance->check_out)
<script>
    // Live timer
    const checkInTime = new Date('{{ $todayAttendance->check_in->toISOString() }}');
    function updateTimer() {
        const now = new Date();
        const diff = now - checkInTime;
        const hours = Math.floor(diff / 3600000);
        const minutes = Math.floor((diff % 3600000) / 60000);
        const seconds = Math.floor((diff % 60000) / 1000);
        document.getElementById('liveTimer').textContent = 
            String(hours).padStart(2, '0') + ':' + 
            String(minutes).padStart(2, '0') + ':' + 
            String(seconds).padStart(2, '0');
    }
    setInterval(updateTimer, 1000);
</script>
@endif
@endpush
