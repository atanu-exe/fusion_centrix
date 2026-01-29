<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index(Request $request)
    {
        $query = LeaveRequest::with(['user', 'leaveType', 'approver']);

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // User filter (for admins)
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        } elseif (!auth()->user()->isAdmin()) {
            // Non-admins see only their own
            $query->where('user_id', auth()->id());
        }

        $leaves = $query->orderBy('created_at', 'desc')->paginate(15);
        $users = User::where('is_active', true)->orderBy('name')->get();
        $leaveTypes = LeaveType::where('is_active', true)->get();

        // Stats
        $stats = [
            'pending' => LeaveRequest::where('status', 'pending')->count(),
            'approved_this_month' => LeaveRequest::where('status', 'approved')
                ->whereMonth('approved_at', now()->month)
                ->count(),
            'total_this_month' => LeaveRequest::whereMonth('created_at', now()->month)->count(),
        ];

        // Current user's leave requests
        $myLeaves = LeaveRequest::with(['leaveType', 'approver'])
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Pending approvals (for managers/admins)
        $pendingApprovals = LeaveRequest::with(['user', 'leaveType'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.hrm.leaves.index', compact('leaves', 'users', 'leaveTypes', 'stats', 'myLeaves', 'pendingApprovals'));
    }

    public function create()
    {
        $leaveTypes = LeaveType::where('is_active', true)->get();
        return view('admin.hrm.leaves.create', compact('leaveTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:1000',
        ]);

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
        $totalDays = $startDate->diffInDays($endDate) + 1;

        LeaveRequest::create([
            'user_id' => auth()->id(),
            'leave_type_id' => $request->leave_type_id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_days' => $totalDays,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()->route('admin.hrm.leaves.index')
            ->with('success', 'Leave request submitted successfully.');
    }

    public function approve(LeaveRequest $leave)
    {
        if (!auth()->user()->isAdmin()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $leave->update([
            'status' => 'approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        return back()->with('success', 'Leave request approved.');
    }

    public function reject(Request $request, LeaveRequest $leave)
    {
        if (!auth()->user()->isAdmin()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ]);

        $leave->update([
            'status' => 'rejected',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
            'rejection_reason' => $request->rejection_reason,
        ]);

        return back()->with('success', 'Leave request rejected.');
    }

    public function cancel(LeaveRequest $leave)
    {
        if ($leave->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            return back()->with('error', 'Unauthorized action.');
        }

        if ($leave->status !== 'pending') {
            return back()->with('error', 'Only pending requests can be cancelled.');
        }

        $leave->update(['status' => 'cancelled']);

        return back()->with('success', 'Leave request cancelled.');
    }

    // Leave Types Management
    public function types()
    {
        $leaveTypes = LeaveType::withCount('leaveRequests')->get();
        return view('admin.hrm.leaves.types', compact('leaveTypes'));
    }

    public function storeType(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'days_per_year' => 'required|integer|min:0|max:365',
            'is_paid' => 'boolean',
        ]);

        LeaveType::create([
            'name' => $request->name,
            'days_per_year' => $request->days_per_year,
            'is_paid' => $request->boolean('is_paid'),
        ]);

        return back()->with('success', 'Leave type created successfully.');
    }

    public function updateType(Request $request, LeaveType $leaveType)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'days_per_year' => 'required|integer|min:0|max:365',
            'is_paid' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $leaveType->update([
            'name' => $request->name,
            'days_per_year' => $request->days_per_year,
            'is_paid' => $request->boolean('is_paid'),
            'is_active' => $request->boolean('is_active'),
        ]);

        return back()->with('success', 'Leave type updated successfully.');
    }
}
