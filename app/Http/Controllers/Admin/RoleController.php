<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display roles and permissions page
     */
    public function index()
    {
        $roles = [
            User::TYPE_SUPER_ADMIN => [
                'name' => 'Super Admin',
                'description' => 'Full access to all features and settings',
                'user_count' => User::where('user_type', User::TYPE_SUPER_ADMIN)->count(),
                'icon' => 'fas fa-crown',
                'color' => '#dc3545',
            ],
            User::TYPE_ADMIN => [
                'name' => 'Admin',
                'description' => 'Can manage users and content',
                'user_count' => User::where('user_type', User::TYPE_ADMIN)->count(),
                'icon' => 'fas fa-user-shield',
                'color' => '#0d6efd',
            ],
            User::TYPE_EMPLOYEE => [
                'name' => 'Employee',
                'description' => 'Can create and manage own content',
                'user_count' => User::where('user_type', User::TYPE_EMPLOYEE)->count(),
                'icon' => 'fas fa-user',
                'color' => '#198754',
            ],
        ];

        $permissions = Permission::all()->groupBy('module');
        $roleDefaults = Permission::getRoleDefaults();

        return view('admin.roles.index', compact('roles', 'permissions', 'roleDefaults'));
    }

    /**
     * Update role default permissions
     */
    public function updatePermissions(Request $request, string $role)
    {
        if (!in_array($role, [User::TYPE_ADMIN, User::TYPE_EMPLOYEE])) {
            return back()->with('error', 'Cannot modify permissions for this role.');
        }

        $permissions = $request->input('permissions', []);
        
        if (Permission::saveRoleDefaults($role, $permissions)) {
            return redirect()->route('admin.roles.index')->with('success', ucfirst($role) . ' permissions updated successfully.');
        }

        return back()->with('error', 'Failed to save role permissions.');
    }

    /**
     * Apply role permissions to all users of that role (reset their overrides)
     */
    public function applyToAllUsers(Request $request, string $role)
    {
        if (!in_array($role, [User::TYPE_ADMIN, User::TYPE_EMPLOYEE])) {
            return back()->with('error', 'Cannot apply permissions for this role.');
        }

        // Get all users of this role
        $users = User::where('user_type', $role)->get();
        
        // Clear all permission overrides for these users
        foreach ($users as $user) {
            $user->clearPermissionOverrides();
        }

        return redirect()->route('admin.roles.index')
            ->with('success', 'All ' . ucfirst(str_replace('_', ' ', $role)) . ' users have been reset to role defaults.');
    }
}
