<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'display_name',
        'module',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_permissions')
            ->withPivot('granted')
            ->withTimestamps();
    }

    /**
     * Get all available permissions grouped by module
     */
    public static function getDefaultPermissions(): array
    {
        return [
            // Users module
            ['name' => 'users.view', 'display_name' => 'View Users', 'module' => 'users'],
            ['name' => 'users.create', 'display_name' => 'Create Users', 'module' => 'users'],
            ['name' => 'users.edit', 'display_name' => 'Edit Users', 'module' => 'users'],
            ['name' => 'users.delete', 'display_name' => 'Delete Users', 'module' => 'users'],
            
            // Blogs module
            ['name' => 'blogs.view', 'display_name' => 'View Blogs', 'module' => 'blogs'],
            ['name' => 'blogs.create', 'display_name' => 'Create Blogs', 'module' => 'blogs'],
            ['name' => 'blogs.edit', 'display_name' => 'Edit Blogs', 'module' => 'blogs'],
            ['name' => 'blogs.delete', 'display_name' => 'Delete Blogs', 'module' => 'blogs'],
            ['name' => 'blogs.publish', 'display_name' => 'Publish Blogs', 'module' => 'blogs'],
            
            // Categories module
            ['name' => 'categories.view', 'display_name' => 'View Categories', 'module' => 'categories'],
            ['name' => 'categories.manage', 'display_name' => 'Manage Categories', 'module' => 'categories'],
            
            // Analytics module
            ['name' => 'analytics.view', 'display_name' => 'View Analytics', 'module' => 'analytics'],
            ['name' => 'analytics.export', 'display_name' => 'Export Analytics', 'module' => 'analytics'],
            
            // Settings module
            ['name' => 'settings.view', 'display_name' => 'View Settings', 'module' => 'settings'],
            ['name' => 'settings.manage', 'display_name' => 'Manage Settings', 'module' => 'settings'],
            
            // HRM module
            ['name' => 'hrm.view', 'display_name' => 'View HRM', 'module' => 'hrm'],
            ['name' => 'hrm.attendance', 'display_name' => 'Manage Attendance', 'module' => 'hrm'],
            ['name' => 'hrm.leaves', 'display_name' => 'Manage Leaves', 'module' => 'hrm'],
            ['name' => 'hrm.salary', 'display_name' => 'Manage Salary', 'module' => 'hrm'],
            
            // CRM/Leads module
            ['name' => 'leads.view', 'display_name' => 'View Leads', 'module' => 'leads'],
            ['name' => 'leads.create', 'display_name' => 'Create Leads', 'module' => 'leads'],
            ['name' => 'leads.edit', 'display_name' => 'Edit Leads', 'module' => 'leads'],
            ['name' => 'leads.delete', 'display_name' => 'Delete Leads', 'module' => 'leads'],
            ['name' => 'leads.import', 'display_name' => 'Import Leads', 'module' => 'leads'],
            ['name' => 'leads.export', 'display_name' => 'Export Leads', 'module' => 'leads'],
            ['name' => 'leads.assign', 'display_name' => 'Assign Leads', 'module' => 'leads'],
            
            // Email module
            ['name' => 'email.view', 'display_name' => 'View Emails', 'module' => 'email'],
            ['name' => 'email.send', 'display_name' => 'Send Emails', 'module' => 'email'],
            ['name' => 'email.campaigns', 'display_name' => 'Manage Campaigns', 'module' => 'email'],
            ['name' => 'email.templates', 'display_name' => 'Manage Templates', 'module' => 'email'],
        ];
    }

    /**
     * Get role default permissions - stored in JSON file
     * Returns array of permission names for each role
     */
    public static function getRoleDefaults(): array
    {
        $configPath = storage_path('app/role_permissions.json');
        
        // Default permissions if no config exists
        $defaults = [
            'super_admin' => ['*'], // All permissions
            'admin' => [
                'users.view', 'users.create', 'users.edit',
                'blogs.view', 'blogs.create', 'blogs.edit', 'blogs.delete', 'blogs.publish',
                'categories.view', 'categories.manage',
                'analytics.view', 'analytics.export',
                'hrm.view', 'hrm.attendance', 'hrm.leaves', 'hrm.salary',
                'leads.view', 'leads.create', 'leads.edit', 'leads.delete', 'leads.import', 'leads.export', 'leads.assign',
                'email.view', 'email.send', 'email.campaigns', 'email.templates',
            ],
            'employee' => [
                'blogs.view', 'blogs.create', 'blogs.edit',
                'categories.view',
                'analytics.view',
                'hrm.view', 'hrm.attendance',
                'leads.view', 'leads.create', 'leads.edit',
                'email.view', 'email.send',
            ],
        ];
        
        if (file_exists($configPath)) {
            $customConfig = json_decode(file_get_contents($configPath), true);
            if (is_array($customConfig)) {
                foreach (['admin', 'employee'] as $role) {
                    if (isset($customConfig[$role]) && is_array($customConfig[$role])) {
                        $defaults[$role] = $customConfig[$role];
                    }
                }
            }
        }
        
        return $defaults;
    }

    /**
     * Save role default permissions to JSON file
     */
    public static function saveRoleDefaults(string $role, array $permissions): bool
    {
        if (!in_array($role, ['admin', 'employee'])) {
            return false;
        }

        $configPath = storage_path('app/role_permissions.json');
        $config = [];
        
        if (file_exists($configPath)) {
            $config = json_decode(file_get_contents($configPath), true) ?? [];
        }
        
        $config[$role] = $permissions;
        
        // Clear any cached permissions
        Cache::forget('role_permissions');
        
        return file_put_contents($configPath, json_encode($config, JSON_PRETTY_PRINT)) !== false;
    }

    /**
     * Check if a permission is in role defaults
     */
    public static function isInRoleDefaults(string $role, string $permission): bool
    {
        $defaults = self::getRoleDefaults();
        $rolePerms = $defaults[$role] ?? [];
        
        if (in_array('*', $rolePerms)) {
            return true;
        }
        
        return in_array($permission, $rolePerms);
    }

    /**
     * Get all modules
     */
    public static function getModules(): array
    {
        return ['users', 'blogs', 'categories', 'analytics', 'settings', 'hrm', 'leads', 'email'];
    }
}
