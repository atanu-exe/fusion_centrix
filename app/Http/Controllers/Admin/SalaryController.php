<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\EmployeeDetail;
use App\Models\Salary;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index(Request $request)
    {
        $query = Salary::with(['user', 'generator']);

        // Month filter
        if ($request->filled('month')) {
            $query->where('month', $request->month);
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // User filter
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $salaries = $query->orderBy('month', 'desc')->orderBy('user_id')->paginate(20);
        $users = User::where('is_active', true)->orderBy('name')->get();
        $employees = $users; // Alias for the generate salary modal

        // Selected month for filtering
        $selectedMonth = $request->input('month', now()->format('Y-m'));

        // Stats based on selected month
        $stats = [
            'total_payroll' => Salary::where('month', $selectedMonth)->sum('net_salary'),
            'paid' => Salary::where('month', $selectedMonth)->where('status', 'paid')->sum('net_salary'),
            'pending' => Salary::where('month', $selectedMonth)->whereIn('status', ['draft', 'generated'])->sum('net_salary'),
            'employee_count' => Salary::where('month', $selectedMonth)->distinct('user_id')->count('user_id'),
        ];

        return view('admin.hrm.salary.index', compact('salaries', 'users', 'stats', 'selectedMonth', 'employees'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'month' => 'required|date_format:Y-m',
            'user_ids' => 'nullable|array',
            'user_ids.*' => 'exists:users,id',
        ]);

        $month = $request->month;
        $startDate = Carbon::parse($month)->startOfMonth();
        $endDate = Carbon::parse($month)->endOfMonth();
        $workingDays = $this->getWorkingDays($startDate, $endDate);

        // Get users
        $userIds = $request->user_ids;
        if (empty($userIds)) {
            $userIds = User::where('is_active', true)->pluck('id')->toArray();
        }

        $generated = 0;
        foreach ($userIds as $userId) {
            // Check if already exists
            if (Salary::where('user_id', $userId)->where('month', $month)->exists()) {
                continue;
            }

            $user = User::with('employeeDetail')->find($userId);
            if (!$user) continue;

            $basicSalary = $user->employeeDetail?->basic_salary ?? 0;

            // Calculate attendance
            $attendances = Attendance::where('user_id', $userId)
                ->whereBetween('date', [$startDate, $endDate])
                ->get();

            $presentDays = $attendances->whereIn('status', ['present', 'late'])->count();
            $leaveDays = $attendances->where('status', 'on_leave')->count();
            $totalOvertime = $attendances->sum('overtime_hours');

            // Calculate salary
            $perDaySalary = $basicSalary / $workingDays;
            $earnedBasic = $perDaySalary * $presentDays;
            $overtimePay = ($perDaySalary / 8) * 1.5 * $totalOvertime; // 1.5x overtime
            $deductions = $perDaySalary * ($workingDays - $presentDays - $leaveDays);

            Salary::create([
                'user_id' => $userId,
                'month' => $month,
                'basic_salary' => $basicSalary,
                'allowances' => 0, // Can be configured
                'overtime' => round($overtimePay, 2),
                'bonus' => 0,
                'deductions' => round(max(0, $deductions), 2),
                'tax' => 0, // Can calculate based on tax slabs
                'net_salary' => round($earnedBasic + $overtimePay, 2),
                'working_days' => $workingDays,
                'present_days' => $presentDays,
                'leave_days' => $leaveDays,
                'status' => 'generated',
                'generated_by' => auth()->id(),
            ]);

            $generated++;
        }

        return back()->with('success', "Salary generated for {$generated} employee(s).");
    }

    public function edit(Salary $salary)
    {
        return view('admin.hrm.salary.edit', compact('salary'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'basic_salary' => 'required|numeric|min:0',
            'allowances' => 'required|numeric|min:0',
            'overtime' => 'required|numeric|min:0',
            'bonus' => 'required|numeric|min:0',
            'deductions' => 'required|numeric|min:0',
            'tax' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:500',
        ]);

        $netSalary = $request->basic_salary
            + $request->allowances
            + $request->overtime
            + $request->bonus
            - $request->deductions
            - $request->tax;

        $salary->update([
            'basic_salary' => $request->basic_salary,
            'allowances' => $request->allowances,
            'overtime' => $request->overtime,
            'bonus' => $request->bonus,
            'deductions' => $request->deductions,
            'tax' => $request->tax,
            'net_salary' => $netSalary,
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.hrm.salary.index')
            ->with('success', 'Salary updated successfully.');
    }

    public function markPaid(Request $request, Salary $salary)
    {
        $request->validate([
            'payment_date' => 'required|date',
            'payment_method' => 'required|string|max:50',
            'transaction_id' => 'nullable|string|max:100',
        ]);

        $salary->update([
            'status' => 'paid',
            'payment_date' => $request->payment_date,
            'payment_method' => $request->payment_method,
            'transaction_id' => $request->transaction_id,
        ]);

        return back()->with('success', 'Salary marked as paid.');
    }

    public function payslip(Salary $salary)
    {
        $salary->load(['user.employeeDetail']);
        return view('admin.hrm.salary.payslip', compact('salary'));
    }

    protected function getWorkingDays(Carbon $start, Carbon $end): int
    {
        $workingDays = 0;
        $current = $start->copy();

        while ($current <= $end) {
            // Skip weekends (0 = Sunday, 6 = Saturday)
            if (!$current->isWeekend()) {
                $workingDays++;
            }
            $current->addDay();
        }

        return $workingDays;
    }
}
