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
    public function updateRolePermissions(Request $request, string $role)
    {
        if (!in_array($role, [User::TYPE_ADMIN, User::TYPE_EMPLOYEE])) {
            return back()->with('error', 'Cannot modify permissions for this role.');
        }

        // Store role permissions in a settings/config table or JSON file
        // For now, we'll use a JSON file approach
        $permissions = $request->input('permissions', []);
        
        $configPath = storage_path('app/role_permissions.json');
        $currentConfig = [];
        
        if (file_exists($configPath)) {
            $currentConfig = json_decode(file_get_contents($configPath), true) ?? [];
        }
        
        $currentConfig[$role] = $permissions;
        file_put_contents($configPath, json_encode($currentConfig, JSON_PRETTY_PRINT));

        return back()->with('success', 'Role permissions updated successfully.');
    }
}
