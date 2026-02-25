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
use App\Http\Controllers\Admin\EmailTrackingController;
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

    // Profile (accessible by all users)
    Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('admin.profile.password');
    Route::post('profile/avatar', [ProfileController::class, 'updateAvatar'])->name('admin.profile.avatar');

    // Blog Management - with permission checks
    // Create routes MUST come before {blog} routes to avoid "create" being matched as a blog ID
    Route::middleware('permission:blogs.create')->group(function () {
        Route::get('blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
        Route::post('blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
        Route::post('blogs/{blog}/duplicate', [BlogController::class, 'duplicate'])->name('admin.blogs.duplicate');
    });
    Route::middleware('permission:blogs.view')->group(function () {
        Route::get('blogs', [BlogController::class, 'index'])->name('admin.blogs.index');
        Route::get('blogs/{blog}', [BlogController::class, 'show'])->name('admin.blogs.show');
    });
    Route::middleware('permission:blogs.edit')->group(function () {
        Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
        Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('admin.blogs.update');
    });
    Route::middleware('permission:blogs.publish')->group(function () {
        Route::post('blogs/{blog}/publish', [BlogController::class, 'publish'])->name('admin.blogs.publish');
        Route::post('blogs/{blog}/unpublish', [BlogController::class, 'unpublish'])->name('admin.blogs.unpublish');
    });
    Route::middleware('permission:blogs.delete')->group(function () {
        Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
    });

    // Category Management - with permission checks

    Route::middleware('permission:categories.manage')->group(function () {
        Route::get('categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('categories', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });
    Route::middleware('permission:categories.view')->group(function () {
        Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    });
    // Analytics - with permission checks
    Route::middleware('permission:analytics.view')->prefix('analytics')->group(function () {
        Route::get('/', [AnalyticsController::class, 'overview'])->name('admin.analytics.overview');
        Route::get('realtime', [AnalyticsController::class, 'realtime'])->name('admin.analytics.realtime');
        Route::get('pages', [AnalyticsController::class, 'pages'])->name('admin.analytics.pages');
        Route::get('locations', [AnalyticsController::class, 'locations'])->name('admin.analytics.locations');
    });

    // Settings - with permission checks
    Route::middleware('permission:settings.view')->group(function () {
        Route::get('settings', [SettingsController::class, 'general'])->name('admin.settings.general');
    });
    Route::middleware('permission:settings.manage')->group(function () {
        Route::put('settings', [SettingsController::class, 'update'])->name('admin.settings.update');
    });

    // ===============================
    // HRM Module
    // ===============================
    Route::prefix('hrm')->group(function () {
        // Attendance - viewable by all (own records), manage for admins
        Route::middleware('permission:hrm.view')->group(function () {
            Route::get('attendance', [AttendanceController::class, 'index'])->name('admin.hrm.attendance.index');
            Route::post('attendance/check-in', [AttendanceController::class, 'checkIn'])->name('admin.hrm.attendance.checkin');
            Route::post('attendance/check-out', [AttendanceController::class, 'checkOut'])->name('admin.hrm.attendance.checkout');
        });
        Route::middleware('permission:hrm.attendance')->group(function () {
            Route::post('attendance', [AttendanceController::class, 'store'])->name('admin.hrm.attendance.store');
            Route::get('attendance/report', [AttendanceController::class, 'report'])->name('admin.hrm.attendance.report');
        });

        // Leave Management
        Route::middleware('permission:hrm.view')->group(function () {
            Route::get('leaves', [LeaveController::class, 'index'])->name('admin.hrm.leaves.index');
            Route::get('leaves/create', [LeaveController::class, 'create'])->name('admin.hrm.leaves.create');
            Route::post('leaves', [LeaveController::class, 'store'])->name('admin.hrm.leaves.store');
            Route::get('leaves/{leave}', [LeaveController::class, 'show'])->name('admin.hrm.leaves.show');
            Route::post('leaves/{leave}/cancel', [LeaveController::class, 'cancel'])->name('admin.hrm.leaves.cancel');
        });
        Route::middleware('permission:hrm.leaves')->group(function () {
            Route::post('leaves/{leave}/approve', [LeaveController::class, 'approve'])->name('admin.hrm.leaves.approve');
            Route::post('leaves/{leave}/reject', [LeaveController::class, 'reject'])->name('admin.hrm.leaves.reject');

            // Leave Types (Admin only)
            Route::get('leave-types', [LeaveController::class, 'types'])->name('admin.hrm.leave-types.index');
            Route::post('leave-types', [LeaveController::class, 'storeType'])->name('admin.hrm.leave-types.store');
            Route::put('leave-types/{leaveType}', [LeaveController::class, 'updateType'])->name('admin.hrm.leave-types.update');
            Route::delete('leave-types/{leaveType}', [LeaveController::class, 'destroyType'])->name('admin.hrm.leave-types.destroy');
        });

        // Salary (Admin only)
        Route::middleware('permission:hrm.salary')->group(function () {
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
    // Lead Management - with permission checks
    Route::prefix('leads')->group(function () {
        Route::middleware('permission:leads.create')->group(function () {
            Route::get('create', [LeadController::class, 'create'])->name('admin.leads.create');
            Route::post('/', [LeadController::class, 'store'])->name('admin.leads.store');
        });
        Route::middleware('permission:leads.view')->group(function () {
            Route::get('/', [LeadController::class, 'index'])->name('admin.leads.index');
            Route::get('{lead}', [LeadController::class, 'show'])->name('admin.leads.show');
        });

        Route::middleware('permission:leads.edit')->group(function () {
            Route::get('{lead}/edit', [LeadController::class, 'edit'])->name('admin.leads.edit');
            Route::put('{lead}', [LeadController::class, 'update'])->name('admin.leads.update');
            Route::post('{lead}/status', [LeadController::class, 'updateStatus'])->name('admin.leads.status');
            Route::post('{lead}/followup', [LeadController::class, 'addFollowup'])->name('admin.leads.followup.store');
            Route::post('followup/{followup}/complete', [LeadController::class, 'completeFollowup'])->name('admin.leads.followup.complete');
        });
        Route::middleware('permission:leads.delete')->group(function () {
            Route::delete('{lead}', [LeadController::class, 'destroy'])->name('admin.leads.destroy');
        });
        Route::middleware('permission:leads.assign')->group(function () {
            Route::post('{lead}/assign', [LeadController::class, 'assign'])->name('admin.leads.assign');
            Route::post('bulk-assign', [LeadController::class, 'bulkAssign'])->name('admin.leads.bulk-assign');
        });
        Route::middleware('permission:leads.import')->group(function () {
            Route::get('import/form', [LeadController::class, 'showImport'])->name('admin.leads.import.form');
            Route::post('import', [LeadController::class, 'import'])->name('admin.leads.import');
        });
        Route::middleware('permission:leads.export')->group(function () {
            Route::get('export', [LeadController::class, 'export'])->name('admin.leads.export');
        });
    });

    // Email Marketing - with permission checks
    Route::prefix('email')->group(function () {
        Route::middleware('permission:email.campaigns')->group(function () {
            Route::get('campaigns/create', [EmailCampaignController::class, 'create'])->name('admin.email.campaigns.create');
            Route::post('campaigns', [EmailCampaignController::class, 'store'])->name('admin.email.campaigns.store');
            Route::get('campaigns/{campaign}/edit', [EmailCampaignController::class, 'edit'])->name('admin.email.campaigns.edit');
            Route::put('campaigns/{campaign}', [EmailCampaignController::class, 'update'])->name('admin.email.campaigns.update');
            Route::delete('campaigns/{campaign}', [EmailCampaignController::class, 'destroy'])->name('admin.email.campaigns.destroy');
        });
        Route::middleware('permission:email.view')->group(function () {
            Route::get('campaigns', [EmailCampaignController::class, 'index'])->name('admin.email.campaigns.index');
            Route::get('campaigns/{campaign}', [EmailCampaignController::class, 'show'])->name('admin.email.campaigns.show');
        });

        Route::middleware('permission:email.send')->group(function () {
            Route::post('campaigns/{campaign}/send', [EmailCampaignController::class, 'send'])->name('admin.email.campaigns.send');
            Route::post('campaigns/{campaign}/schedule', [EmailCampaignController::class, 'schedule'])->name('admin.email.campaigns.schedule');
        });

        // Templates
        Route::middleware('permission:email.templates')->group(function () {
            Route::get('templates', [EmailCampaignController::class, 'templates'])->name('admin.email.templates.index');
            Route::get('templates/create', [EmailCampaignController::class, 'createTemplate'])->name('admin.email.templates.create');
            Route::post('templates', [EmailCampaignController::class, 'storeTemplate'])->name('admin.email.templates.store');
            Route::get('templates/{template}/edit', [EmailCampaignController::class, 'editTemplate'])->name('admin.email.templates.edit');
            Route::put('templates/{template}', [EmailCampaignController::class, 'updateTemplate'])->name('admin.email.templates.update');
            Route::delete('templates/{template}', [EmailCampaignController::class, 'destroyTemplate'])->name('admin.email.templates.destroy');
        });
    });

    // User Management - with permission checks
    Route::middleware('permission:users.create')->group(function () {
        Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
    });
    Route::middleware('permission:users.view')->group(function () {
        Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    });

    Route::middleware('permission:users.edit')->group(function () {
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::post('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('admin.users.toggle-status');
    });
    Route::middleware('permission:users.delete')->group(function () {
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
    // Permissions management - Super Admin only
    Route::middleware('role:super_admin')->group(function () {
        Route::put('users/{user}/permissions', [UserController::class, 'updatePermissions'])->name('admin.users.permissions');
        Route::post('users/{user}/reset-permissions', [UserController::class, 'resetPermissions'])->name('admin.users.reset-permissions');
        Route::post('users/reset-all-permissions', [UserController::class, 'resetAllPermissions'])->name('admin.users.reset-all-permissions');
    });

    // Role Management (Super Admin only)
    Route::middleware('role:super_admin')->group(function () {
        Route::get('roles', [RoleController::class, 'index'])->name('admin.roles.index');
        Route::put('roles/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('admin.roles.permissions');
        Route::post('roles/{role}/apply-to-all', [RoleController::class, 'applyToAllUsers'])->name('admin.roles.apply-to-all');
    });
});

// Email Tracking Routes (no authentication required - used in emails)
Route::prefix('email')->group(function () {
    Route::get('track/open/{token}', [EmailTrackingController::class, 'trackOpen'])->name('admin.email.track-open');
    Route::get('track/click/{token}', [EmailTrackingController::class, 'trackClick'])->name('admin.email.track-click');
    Route::post('track/bounce', [EmailTrackingController::class, 'trackBounce'])->name('admin.email.track-bounce');
    Route::get('campaigns/{campaign}/stats', [EmailTrackingController::class, 'campaignStats'])->name('admin.email.campaign-stats');
});
