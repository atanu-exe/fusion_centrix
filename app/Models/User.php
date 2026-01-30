<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * User types/roles
     */
    const TYPE_SUPER_ADMIN = 'super_admin';
    const TYPE_ADMIN = 'admin';
    const TYPE_EMPLOYEE = 'employee';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'avatar',
        'phone',
        'is_active',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
            'last_login_at' => 'datetime',
        ];
    }

    /**
     * Check if user is super admin
     */
    public function isSuperAdmin(): bool
    {
        return $this->user_type === self::TYPE_SUPER_ADMIN;
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return in_array($this->user_type, [self::TYPE_SUPER_ADMIN, self::TYPE_ADMIN]);
    }

    /**
     * Check if user is employee
     */
    public function isEmployee(): bool
    {
        return $this->user_type === self::TYPE_EMPLOYEE;
    }

    /**
     * Check if user can manage users
     */
    public function canManageUsers(): bool
    {
        return in_array($this->user_type, [self::TYPE_SUPER_ADMIN, self::TYPE_ADMIN]);
    }

    /**
     * Check if user can manage roles
     */
    public function canManageRoles(): bool
    {
        return $this->user_type === self::TYPE_SUPER_ADMIN;
    }

    /**
     * Get blogs created by this user
     */
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'created_by');
    }

    /**
     * User permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions')
            ->withPivot('granted')
            ->withTimestamps();
    }

    /**
     * Employee details
     */
    public function employeeDetail()
    {
        return $this->hasOne(EmployeeDetail::class);
    }

    /**
     * Attendance records
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Leave requests
     */
    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }

    /**
     * Salary records
     */
    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    /**
     * Assigned leads
     */
    public function leads()
    {
        return $this->hasMany(Lead::class, 'assigned_to');
    }

    /**
     * Call logs
     */
    public function callLogs()
    {
        return $this->hasMany(CallLog::class);
    }

    /**
     * Check if user has a specific permission
     * Priority: 1. Super Admin = all, 2. User override, 3. Role default
     */
    public function hasPermission(string $permission): bool
    {
        // Super admin has all permissions
        if ($this->isSuperAdmin()) {
            return true;
        }

        // Check for user-specific override in user_permissions table
        $override = $this->permissions()->where('name', $permission)->first();
        if ($override) {
            return (bool) $override->pivot->granted;
        }

        // Fall back to role defaults
        return Permission::isInRoleDefaults($this->user_type, $permission);
    }

    /**
     * Check if user has ANY permission in a module (for menu visibility)
     */
    public function hasModuleAccess(string $module): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        // Get all permissions for this module
        $modulePermissions = Permission::where('module', $module)->pluck('name')->toArray();
        
        foreach ($modulePermissions as $permission) {
            if ($this->hasPermission($permission)) {
                return true;
            }
        }
        
        return false;
    }

    /**
     * Get all effective permissions for this user
     */
    public function getEffectivePermissions(): array
    {
        if ($this->isSuperAdmin()) {
            return Permission::pluck('name')->toArray();
        }

        $permissions = [];
        $allPermissions = Permission::all();
        
        foreach ($allPermissions as $perm) {
            if ($this->hasPermission($perm->name)) {
                $permissions[] = $perm->name;
            }
        }
        
        return $permissions;
    }

    /**
     * Get user's custom overrides (permissions that differ from role default)
     */
    public function getPermissionOverrides(): array
    {
        return $this->permissions()->get()->mapWithKeys(function ($perm) {
            return [$perm->name => (bool) $perm->pivot->granted];
        })->toArray();
    }

    /**
     * Set a permission override for this user
     */
    public function setPermissionOverride(int $permissionId, bool $granted): void
    {
        $this->permissions()->syncWithoutDetaching([
            $permissionId => ['granted' => $granted]
        ]);
    }

    /**
     * Clear all permission overrides (reset to role defaults)
     */
    public function clearPermissionOverrides(): void
    {
        $this->permissions()->detach();
    }

    /**
     * Get role label
     */
    public function getRoleLabelAttribute(): string
    {
        return match($this->user_type) {
            self::TYPE_SUPER_ADMIN => 'Super Admin',
            self::TYPE_ADMIN => 'Admin',
            self::TYPE_EMPLOYEE => 'Employee',
            default => 'Unknown',
        };
    }

    /**
     * Get role badge color
     */
    public function getRoleBadgeColorAttribute(): string
    {
        return match($this->user_type) {
            self::TYPE_SUPER_ADMIN => 'danger',
            self::TYPE_ADMIN => 'primary',
            self::TYPE_EMPLOYEE => 'secondary',
            default => 'secondary',
        };
    }
}
