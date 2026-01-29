<?php

namespace Database\Seeders;

use App\Models\LeadSource;
use App\Models\LeadStatus;
use App\Models\LeaveType;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class HrmCrmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lead Statuses
        $statuses = [
            ['name' => 'New', 'color' => '#17a2b8', 'order' => 1],
            ['name' => 'Contacted', 'color' => '#6c757d', 'order' => 2],
            ['name' => 'Qualified', 'color' => '#007bff', 'order' => 3],
            ['name' => 'Proposal Sent', 'color' => '#fd7e14', 'order' => 4],
            ['name' => 'Negotiation', 'color' => '#ffc107', 'order' => 5],
            ['name' => 'Won', 'color' => '#28a745', 'order' => 6],
            ['name' => 'Lost', 'color' => '#dc3545', 'order' => 7],
        ];

        foreach ($statuses as $status) {
            LeadStatus::firstOrCreate(['name' => $status['name']], $status);
        }

        // Lead Sources
        $sources = [
            ['name' => 'Website', 'color' => '#007bff'],
            ['name' => 'Referral', 'color' => '#28a745'],
            ['name' => 'Social Media', 'color' => '#e83e8c'],
            ['name' => 'Google Ads', 'color' => '#ffc107'],
            ['name' => 'Facebook Ads', 'color' => '#3b5998'],
            ['name' => 'LinkedIn', 'color' => '#0077b5'],
            ['name' => 'Cold Call', 'color' => '#6c757d'],
            ['name' => 'Trade Show', 'color' => '#fd7e14'],
            ['name' => 'Email Campaign', 'color' => '#17a2b8'],
            ['name' => 'Other', 'color' => '#6c757d'],
        ];

        foreach ($sources as $source) {
            LeadSource::firstOrCreate(['name' => $source['name']], $source);
        }

        // Leave Types
        $leaveTypes = [
            ['name' => 'Casual Leave', 'days_per_year' => 12, 'is_paid' => true],
            ['name' => 'Sick Leave', 'days_per_year' => 10, 'is_paid' => true],
            ['name' => 'Earned Leave', 'days_per_year' => 15, 'is_paid' => true],
            ['name' => 'Maternity Leave', 'days_per_year' => 180, 'is_paid' => true],
            ['name' => 'Paternity Leave', 'days_per_year' => 15, 'is_paid' => true],
            ['name' => 'Leave Without Pay', 'days_per_year' => 30, 'is_paid' => false],
        ];

        foreach ($leaveTypes as $type) {
            LeaveType::firstOrCreate(['name' => $type['name']], $type);
        }

        // Permissions
        $permissions = [
            // Blog permissions
            ['name' => 'blogs.view', 'display_name' => 'View Blogs', 'module' => 'blogs', 'description' => 'Can view blog posts'],
            ['name' => 'blogs.create', 'display_name' => 'Create Blogs', 'module' => 'blogs', 'description' => 'Can create new blog posts'],
            ['name' => 'blogs.edit', 'display_name' => 'Edit Blogs', 'module' => 'blogs', 'description' => 'Can edit blog posts'],
            ['name' => 'blogs.delete', 'display_name' => 'Delete Blogs', 'module' => 'blogs', 'description' => 'Can delete blog posts'],
            ['name' => 'blogs.publish', 'display_name' => 'Publish Blogs', 'module' => 'blogs', 'description' => 'Can publish/unpublish blog posts'],
            
            // User permissions
            ['name' => 'users.view', 'display_name' => 'View Users', 'module' => 'users', 'description' => 'Can view users'],
            ['name' => 'users.create', 'display_name' => 'Create Users', 'module' => 'users', 'description' => 'Can create new users'],
            ['name' => 'users.edit', 'display_name' => 'Edit Users', 'module' => 'users', 'description' => 'Can edit users'],
            ['name' => 'users.delete', 'display_name' => 'Delete Users', 'module' => 'users', 'description' => 'Can delete users'],
            
            // Lead permissions
            ['name' => 'leads.view', 'display_name' => 'View Leads', 'module' => 'leads', 'description' => 'Can view leads'],
            ['name' => 'leads.create', 'display_name' => 'Create Leads', 'module' => 'leads', 'description' => 'Can create leads'],
            ['name' => 'leads.edit', 'display_name' => 'Edit Leads', 'module' => 'leads', 'description' => 'Can edit leads'],
            ['name' => 'leads.delete', 'display_name' => 'Delete Leads', 'module' => 'leads', 'description' => 'Can delete leads'],
            ['name' => 'leads.import', 'display_name' => 'Import Leads', 'module' => 'leads', 'description' => 'Can import leads'],
            ['name' => 'leads.export', 'display_name' => 'Export Leads', 'module' => 'leads', 'description' => 'Can export leads'],
            
            // Email Campaign permissions
            ['name' => 'campaigns.view', 'display_name' => 'View Campaigns', 'module' => 'campaigns', 'description' => 'Can view email campaigns'],
            ['name' => 'campaigns.create', 'display_name' => 'Create Campaigns', 'module' => 'campaigns', 'description' => 'Can create email campaigns'],
            ['name' => 'campaigns.send', 'display_name' => 'Send Campaigns', 'module' => 'campaigns', 'description' => 'Can send email campaigns'],
            
            // HRM permissions
            ['name' => 'attendance.view', 'display_name' => 'View Attendance', 'module' => 'hrm', 'description' => 'Can view attendance'],
            ['name' => 'attendance.manage', 'display_name' => 'Manage Attendance', 'module' => 'hrm', 'description' => 'Can manage team attendance'],
            ['name' => 'leaves.view', 'display_name' => 'View Leaves', 'module' => 'hrm', 'description' => 'Can view leave requests'],
            ['name' => 'leaves.approve', 'display_name' => 'Approve Leaves', 'module' => 'hrm', 'description' => 'Can approve/reject leaves'],
            ['name' => 'salary.manage', 'display_name' => 'Manage Salary', 'module' => 'hrm', 'description' => 'Can manage salaries'],
            
            // Analytics
            ['name' => 'analytics.view', 'display_name' => 'View Analytics', 'module' => 'analytics', 'description' => 'Can view analytics'],
            
            // Settings
            ['name' => 'settings.manage', 'display_name' => 'Manage Settings', 'module' => 'settings', 'description' => 'Can manage system settings'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission['name']], $permission);
        }

        $this->command->info('HRM & CRM default data seeded successfully!');
    }
}
