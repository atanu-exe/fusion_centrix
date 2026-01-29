<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of users
     */
    public function index(Request $request)
    {
        $query = User::query();
        
        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        
        // Role filter
        if ($request->filled('role')) {
            $query->where('user_type', $request->role);
        }
        
        // Status filter
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }
        
        $users = $query->latest()->paginate(15)->withQueryString();
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user
     */
    public function create()
    {
        $roles = $this->getAvailableRoles();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created user
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::defaults()],
            'user_type' => ['required', Rule::in(array_keys($this->getAvailableRoles()))],
            'phone' => 'nullable|string|max:20',
            'is_active' => 'boolean',
        ]);
        
        $validated['password'] = Hash::make($validated['password']);
        $validated['is_active'] = $request->boolean('is_active', true);
        
        // Prevent creating super admin unless you are one
        if ($validated['user_type'] === User::TYPE_SUPER_ADMIN && !auth()->user()->isSuperAdmin()) {
            return back()->with('error', 'You cannot create a Super Admin account.');
        }
        
        User::create($validated);
        
        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing a user
     */
    public function edit(User $user)
    {
        $roles = $this->getAvailableRoles();
        $permissions = Permission::all()->groupBy('module');
        $userPermissions = $user->permissions()->get()->keyBy('id');
        
        return view('admin.users.edit', compact('user', 'roles', 'permissions', 'userPermissions'));
    }

    /**
     * Update the specified user
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'user_type' => ['required', Rule::in(array_keys($this->getAvailableRoles()))],
            'phone' => 'nullable|string|max:20',
            'is_active' => 'boolean',
        ]);
        
        // Prevent demoting yourself
        if ($user->id === auth()->id() && $validated['user_type'] !== $user->user_type) {
            return back()->with('error', 'You cannot change your own role.');
        }
        
        // Prevent deactivating yourself
        if ($user->id === auth()->id() && !$request->boolean('is_active')) {
            return back()->with('error', 'You cannot deactivate your own account.');
        }
        
        // Prevent modifying super admin unless you are one
        if ($user->isSuperAdmin() && !auth()->user()->isSuperAdmin()) {
            return back()->with('error', 'You cannot modify a Super Admin account.');
        }
        
        if ($validated['password']) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }
        
        $validated['is_active'] = $request->boolean('is_active', true);
        
        $user->update($validated);
        
        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user
     */
    public function destroy(User $user)
    {
        // Prevent deleting yourself
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }
        
        // Prevent deleting super admin unless you are one
        if ($user->isSuperAdmin() && !auth()->user()->isSuperAdmin()) {
            return back()->with('error', 'You cannot delete a Super Admin account.');
        }
        
        $user->delete();
        
        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

    /**
     * Toggle user status
     */
    public function toggleStatus(User $user)
    {
        // Prevent toggling yourself
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot change your own status.');
        }
        
        $user->update(['is_active' => !$user->is_active]);
        
        $status = $user->is_active ? 'activated' : 'deactivated';
        
        return back()->with('success', "User {$status} successfully.");
    }

    /**
     * Update user permissions
     */
    public function updatePermissions(Request $request, User $user)
    {
        // Prevent modifying super admin permissions
        if ($user->isSuperAdmin()) {
            return back()->with('error', 'Super Admin has all permissions by default.');
        }

        // Prevent modifying your own permissions
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot modify your own permissions.');
        }

        // Only super admin and admin can modify permissions
        if (!auth()->user()->isAdmin()) {
            return back()->with('error', 'You do not have permission to modify user permissions.');
        }

        $permissions = $request->input('permissions', []);
        
        // Sync permissions with granted status
        $syncData = [];
        foreach ($permissions as $permissionId => $status) {
            // status can be: 'default', 'granted', 'denied'
            if ($status !== 'default') {
                $syncData[$permissionId] = ['granted' => $status === 'granted'];
            }
        }
        
        $user->permissions()->sync($syncData);

        return back()->with('success', 'User permissions updated successfully.');
    }

    /**
     * Reset user permissions to role defaults
     */
    public function resetPermissions(User $user)
    {
        // Prevent modifying super admin permissions
        if ($user->isSuperAdmin()) {
            return back()->with('error', 'Super Admin has all permissions by default.');
        }

        // Detach all custom permissions
        $user->permissions()->detach();

        return back()->with('success', 'User permissions reset to role defaults.');
    }

    /**
     * Get available roles based on current user
     */
    private function getAvailableRoles(): array
    {
        $roles = [
            User::TYPE_EMPLOYEE => 'Employee',
            User::TYPE_ADMIN => 'Admin',
        ];
        
        if (auth()->user()->isSuperAdmin()) {
            $roles[User::TYPE_SUPER_ADMIN] = 'Super Admin';
        }
        
        return $roles;
    }
}
