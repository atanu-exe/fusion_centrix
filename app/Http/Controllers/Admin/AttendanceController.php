<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $query = Attendance::with('user');

        // Date filter
        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        } else {
            $query->whereDate('date', today());
        }

        // User filter
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $attendances = $query->orderBy('date', 'desc')->paginate(20);
        $users = User::where('is_active', true)->orderBy('name')->get();

        // Today's stats
        $todayStats = [
            'present' => Attendance::whereDate('date', today())->whereIn('status', ['present', 'late'])->count(),
            'absent' => Attendance::whereDate('date', today())->where('status', 'absent')->count(),
            'late' => Attendance::whereDate('date', today())->where('status', 'late')->count(),
            'on_leave' => Attendance::whereDate('date', today())->where('status', 'on_leave')->count(),
        ];

        // Current user's today attendance
        $todayAttendance = Attendance::where('user_id', auth()->id())
            ->whereDate('date', today())
            ->first();

        // Selected month for filtering
        $selectedMonth = $request->input('month', now()->format('Y-m'));

        // Team attendance for today (all users)
        $teamAttendance = Attendance::with('user')
            ->whereDate('date', today())
            ->orderBy('check_in', 'desc')
            ->get();

        return view('admin.hrm.attendance.index', compact('attendances', 'users', 'todayStats', 'todayAttendance', 'selectedMonth', 'teamAttendance'));
    }

    public function checkIn(Request $request)
    {
        $userId = auth()->id();
        $today = today();

        // Check if already checked in
        $attendance = Attendance::where('user_id', $userId)
            ->whereDate('date', $today)
            ->first();

        if ($attendance && $attendance->check_in) {
            return back()->with('error', 'You have already checked in today.');
        }

        $now = now();
        $lateTime = Carbon::parse('09:30:00'); // Configure this
        $status = $now->gt($lateTime) ? 'late' : 'present';

        if ($attendance) {
            $attendance->update([
                'check_in' => $now->format('H:i:s'),
                'check_in_ip' => $request->ip(),
                'status' => $status,
            ]);
        } else {
            Attendance::create([
                'user_id' => $userId,
                'date' => $today,
                'check_in' => $now->format('H:i:s'),
                'check_in_ip' => $request->ip(),
                'status' => $status,
            ]);
        }

        return back()->with('success', 'Checked in successfully at ' . $now->format('h:i A'));
    }

    public function checkOut(Request $request)
    {
        $userId = auth()->id();
        $today = today();

        $attendance = Attendance::where('user_id', $userId)
            ->whereDate('date', $today)
            ->first();

        if (!$attendance || !$attendance->check_in) {
            return back()->with('error', 'You haven\'t checked in today.');
        }

        if ($attendance->check_out) {
            return back()->with('error', 'You have already checked out today.');
        }

        $now = now();
        $checkIn = Carbon::parse($attendance->check_in);
        $workingHours = $now->diffInMinutes($checkIn) / 60;
        $standardHours = 8;
        $overtimeHours = max(0, $workingHours - $standardHours);

        $attendance->update([
            'check_out' => $now->format('H:i:s'),
            'check_out_ip' => $request->ip(),
            'working_hours' => round($workingHours, 2),
            'overtime_hours' => round($overtimeHours, 2),
        ]);

        return back()->with('success', 'Checked out successfully. Working hours: ' . round($workingHours, 2));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'check_in' => 'nullable|date_format:H:i',
            'check_out' => 'nullable|date_format:H:i',
            'status' => 'required|in:present,absent,half_day,late,on_leave,holiday,weekend',
            'notes' => 'nullable|string|max:500',
        ]);

        $data = $request->only(['user_id', 'date', 'check_in', 'check_out', 'status', 'notes']);

        // Calculate working hours if both check_in and check_out provided
        if ($request->check_in && $request->check_out) {
            $checkIn = Carbon::parse($request->check_in);
            $checkOut = Carbon::parse($request->check_out);
            $data['working_hours'] = round($checkOut->diffInMinutes($checkIn) / 60, 2);
        }

        Attendance::updateOrCreate(
            ['user_id' => $request->user_id, 'date' => $request->date],
            $data
        );

        return back()->with('success', 'Attendance saved successfully.');
    }

    public function report(Request $request)
    {
        $month = $request->get('month', now()->format('Y-m'));
        $userId = $request->get('user_id');

        $query = Attendance::query();

        if ($userId) {
            $query->where('user_id', $userId);
        }

        $startDate = Carbon::parse($month)->startOfMonth();
        $endDate = Carbon::parse($month)->endOfMonth();

        $query->whereBetween('date', [$startDate, $endDate]);

        $attendances = $query->with('user')
            ->orderBy('date')
            ->orderBy('user_id')
            ->get()
            ->groupBy('user_id');

        $users = User::where('is_active', true)->orderBy('name')->get();

        // Calculate summary for each user
        $summary = [];
        foreach ($attendances as $userId => $records) {
            $summary[$userId] = [
                'present' => $records->whereIn('status', ['present', 'late'])->count(),
                'absent' => $records->where('status', 'absent')->count(),
                'late' => $records->where('status', 'late')->count(),
                'half_day' => $records->where('status', 'half_day')->count(),
                'on_leave' => $records->where('status', 'on_leave')->count(),
                'total_hours' => $records->sum('working_hours'),
                'overtime' => $records->sum('overtime_hours'),
            ];
        }

        return view('admin.hrm.attendance.report', compact('attendances', 'users', 'summary', 'month'));
    }
}
