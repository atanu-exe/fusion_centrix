<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\EmailCampaignController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group.
|
*/

// Guest routes (login)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login.submit');
});

// Authenticated admin routes
Route::middleware(['admin'])->group(function () {
    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
    
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
    
    // Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('admin.profile.password');
    Route::post('profile/avatar', [ProfileController::class, 'updateAvatar'])->name('admin.profile.avatar');
    
    // Blog Management
    Route::resource('blogs', BlogController::class)->names('admin.blogs');
    Route::post('blogs/{blog}/publish', [BlogController::class, 'publish'])->name('admin.blogs.publish');
    Route::post('blogs/{blog}/unpublish', [BlogController::class, 'unpublish'])->name('admin.blogs.unpublish');
    Route::post('blogs/{blog}/duplicate', [BlogController::class, 'duplicate'])->name('admin.blogs.duplicate');
    
    // Category Management
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    
    // Analytics
    Route::prefix('analytics')->group(function () {
        Route::get('/', [AnalyticsController::class, 'overview'])->name('admin.analytics.overview');
        Route::get('realtime', [AnalyticsController::class, 'realtime'])->name('admin.analytics.realtime');
        Route::get('pages', [AnalyticsController::class, 'pages'])->name('admin.analytics.pages');
        Route::get('locations', [AnalyticsController::class, 'locations'])->name('admin.analytics.locations');
    });
    
    // Settings
    Route::get('settings', [SettingsController::class, 'general'])->name('admin.settings.general');
    Route::put('settings', [SettingsController::class, 'update'])->name('admin.settings.update');
    
    // ===============================
    // HRM Module
    // ===============================
    Route::prefix('hrm')->group(function () {
        // Attendance
        Route::get('attendance', [AttendanceController::class, 'index'])->name('admin.hrm.attendance.index');
        Route::post('attendance/check-in', [AttendanceController::class, 'checkIn'])->name('admin.hrm.attendance.checkin');
        Route::post('attendance/check-out', [AttendanceController::class, 'checkOut'])->name('admin.hrm.attendance.checkout');
        Route::post('attendance', [AttendanceController::class, 'store'])->name('admin.hrm.attendance.store');
        Route::get('attendance/report', [AttendanceController::class, 'report'])->name('admin.hrm.attendance.report');
        
        // Leave Management
        Route::get('leaves', [LeaveController::class, 'index'])->name('admin.hrm.leaves.index');
        Route::get('leaves/create', [LeaveController::class, 'create'])->name('admin.hrm.leaves.create');
        Route::post('leaves', [LeaveController::class, 'store'])->name('admin.hrm.leaves.store');
        Route::get('leaves/{leave}', [LeaveController::class, 'show'])->name('admin.hrm.leaves.show');
        Route::post('leaves/{leave}/approve', [LeaveController::class, 'approve'])->name('admin.hrm.leaves.approve');
        Route::post('leaves/{leave}/reject', [LeaveController::class, 'reject'])->name('admin.hrm.leaves.reject');
        Route::post('leaves/{leave}/cancel', [LeaveController::class, 'cancel'])->name('admin.hrm.leaves.cancel');
        
        // Leave Types (Admin only)
        Route::middleware('role:admin,super_admin')->group(function () {
            Route::get('leave-types', [LeaveController::class, 'types'])->name('admin.hrm.leave-types.index');
            Route::post('leave-types', [LeaveController::class, 'storeType'])->name('admin.hrm.leave-types.store');
            Route::put('leave-types/{leaveType}', [LeaveController::class, 'updateType'])->name('admin.hrm.leave-types.update');
            Route::delete('leave-types/{leaveType}', [LeaveController::class, 'destroyType'])->name('admin.hrm.leave-types.destroy');
        });
        
        // Salary (Admin only)
        Route::middleware('role:admin,super_admin')->group(function () {
            Route::get('salary', [SalaryController::class, 'index'])->name('admin.hrm.salary.index');
            Route::post('salary/generate', [SalaryController::class, 'generate'])->name('admin.hrm.salary.generate');
            Route::get('salary/{salary}/edit', [SalaryController::class, 'edit'])->name('admin.hrm.salary.edit');
            Route::put('salary/{salary}', [SalaryController::class, 'update'])->name('admin.hrm.salary.update');
            Route::post('salary/{salary}/mark-paid', [SalaryController::class, 'markPaid'])->name('admin.hrm.salary.mark-paid');
            Route::get('salary/{salary}/payslip', [SalaryController::class, 'payslip'])->name('admin.hrm.salary.payslip');
        });
    });
    
    // ===============================
    // Marketing / CRM Module
    // ===============================
    // Lead Management
    Route::prefix('leads')->group(function () {
        Route::get('/', [LeadController::class, 'index'])->name('admin.leads.index');
        Route::get('create', [LeadController::class, 'create'])->name('admin.leads.create');
        Route::post('/', [LeadController::class, 'store'])->name('admin.leads.store');
        Route::get('{lead}', [LeadController::class, 'show'])->name('admin.leads.show');
        Route::get('{lead}/edit', [LeadController::class, 'edit'])->name('admin.leads.edit');
        Route::put('{lead}', [LeadController::class, 'update'])->name('admin.leads.update');
        Route::delete('{lead}', [LeadController::class, 'destroy'])->name('admin.leads.destroy');
        
        // Lead actions
        Route::post('{lead}/status', [LeadController::class, 'updateStatus'])->name('admin.leads.status');
        Route::post('{lead}/assign', [LeadController::class, 'assign'])->name('admin.leads.assign');
        Route::post('bulk-assign', [LeadController::class, 'bulkAssign'])->name('admin.leads.bulk-assign');
        
        // Follow-ups
        Route::post('{lead}/followup', [LeadController::class, 'addFollowup'])->name('admin.leads.followup.store');
        Route::post('followup/{followup}/complete', [LeadController::class, 'completeFollowup'])->name('admin.leads.followup.complete');
        
        // Import/Export
        Route::get('import/form', [LeadController::class, 'showImport'])->name('admin.leads.import.form');
        Route::post('import', [LeadController::class, 'import'])->name('admin.leads.import');
        Route::get('export', [LeadController::class, 'export'])->name('admin.leads.export');
    });
    
    // Email Marketing
    Route::prefix('email')->group(function () {
        // Campaigns
        Route::get('campaigns', [EmailCampaignController::class, 'index'])->name('admin.email.campaigns.index');
        Route::get('campaigns/create', [EmailCampaignController::class, 'create'])->name('admin.email.campaigns.create');
        Route::post('campaigns', [EmailCampaignController::class, 'store'])->name('admin.email.campaigns.store');
        Route::get('campaigns/{campaign}', [EmailCampaignController::class, 'show'])->name('admin.email.campaigns.show');
        Route::get('campaigns/{campaign}/edit', [EmailCampaignController::class, 'edit'])->name('admin.email.campaigns.edit');
        Route::put('campaigns/{campaign}', [EmailCampaignController::class, 'update'])->name('admin.email.campaigns.update');
        Route::delete('campaigns/{campaign}', [EmailCampaignController::class, 'destroy'])->name('admin.email.campaigns.destroy');
        Route::post('campaigns/{campaign}/send', [EmailCampaignController::class, 'send'])->name('admin.email.campaigns.send');
        Route::post('campaigns/{campaign}/schedule', [EmailCampaignController::class, 'schedule'])->name('admin.email.campaigns.schedule');
        
        // Templates
        Route::get('templates', [EmailCampaignController::class, 'templates'])->name('admin.email.templates.index');
        Route::get('templates/create', [EmailCampaignController::class, 'createTemplate'])->name('admin.email.templates.create');
        Route::post('templates', [EmailCampaignController::class, 'storeTemplate'])->name('admin.email.templates.store');
        Route::get('templates/{template}/edit', [EmailCampaignController::class, 'editTemplate'])->name('admin.email.templates.edit');
        Route::put('templates/{template}', [EmailCampaignController::class, 'updateTemplate'])->name('admin.email.templates.update');
        Route::delete('templates/{template}', [EmailCampaignController::class, 'destroyTemplate'])->name('admin.email.templates.destroy');
    });
    
    // User Management (Admin & Super Admin only)
    Route::middleware('role:admin,super_admin')->group(function () {
        Route::resource('users', UserController::class)->names('admin.users');
        Route::post('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('admin.users.toggle-status');
        Route::put('users/{user}/permissions', [UserController::class, 'updatePermissions'])->name('admin.users.permissions');
        Route::post('users/{user}/reset-permissions', [UserController::class, 'resetPermissions'])->name('admin.users.reset-permissions');
    });
    
    // Role Management (Super Admin only)
    Route::middleware('role:super_admin')->group(function () {
        Route::get('roles', [RoleController::class, 'index'])->name('admin.roles.index');
        Route::put('roles/{role}/permissions', [RoleController::class, 'updateRolePermissions'])->name('admin.roles.permissions');
    });
});
