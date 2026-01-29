<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    // Default permissions by module
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
            ['name' => 'blogs.edit_others', 'display_name' => 'Edit Others Blogs', 'module' => 'blogs'],
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
            ['name' => 'hrm.employees', 'display_name' => 'Manage Employees', 'module' => 'hrm'],
            
            // CRM/Leads module
            ['name' => 'leads.view', 'display_name' => 'View Leads', 'module' => 'leads'],
            ['name' => 'leads.view_all', 'display_name' => 'View All Leads', 'module' => 'leads'],
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

    // Default role permissions
    public static function getRoleDefaults(): array
    {
        return [
            'super_admin' => '*', // All permissions
            'admin' => [
                'users.view', 'users.create', 'users.edit',
                'blogs.*', 'categories.*', 'analytics.*',
                'hrm.*', 'leads.*', 'email.*',
            ],
            'employee' => [
                'blogs.view', 'blogs.create', 'blogs.edit',
                'categories.view', 'analytics.view',
                'hrm.view', 'hrm.attendance',
                'leads.view', 'leads.create', 'leads.edit',
                'email.view', 'email.send',
            ],
        ];
    }
}
