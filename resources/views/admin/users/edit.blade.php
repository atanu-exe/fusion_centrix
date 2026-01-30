@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Edit User</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.users.index') }}">Users</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Edit</span>
        </div>
    </div>
    <div>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-user-edit me-2"></i>User Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password">
                            <small class="text-muted">Leave blank to keep current password</small>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="user_type" class="form-label">Role <span class="text-danger">*</span></label>
                            <select class="form-select @error('user_type') is-invalid @enderror" 
                                    id="user_type" name="user_type" required
                                    {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                @foreach($roles as $key => $label)
                                    <option value="{{ $key }}" {{ old('user_type', $user->user_type) == $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @if($user->id === auth()->id())
                                <input type="hidden" name="user_type" value="{{ $user->user_type }}">
                                <small class="text-muted">You cannot change your own role</small>
                            @endif
                            @error('user_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                                   {{ old('is_active', $user->is_active) ? 'checked' : '' }}
                                   {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active Account
                            </label>
                            @if($user->id === auth()->id())
                                <input type="hidden" name="is_active" value="1">
                                <small class="text-muted d-block">You cannot deactivate your own account</small>
                            @else
                                <small class="text-muted d-block">Inactive users cannot log in</small>
                            @endif
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update User
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Permissions Section -->
        @if($user->id !== auth()->id() && !$user->isSuperAdmin() && auth()->user()->isSuperAdmin())
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h5 class="card-title mb-0"><i class="fas fa-shield-alt me-2"></i>User Permissions</h5>
                <div class="d-flex gap-2">
                    <form action="{{ route('admin.users.reset-permissions', $user) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-warning" 
                                onclick="return confirm('Reset this user\'s permissions to role defaults?')">
                            <i class="fas fa-undo me-1"></i>Reset User
                        </button>
                    </form>
                    <form action="{{ route('admin.users.reset-all-permissions') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="user_type" value="{{ $user->user_type }}">
                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                onclick="return confirm('Reset ALL {{ $user->role_label }} users to default permissions? This cannot be undone.')">
                            <i class="fas fa-users me-1"></i>Reset All {{ $user->role_label }}s
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="alert alert-info mb-4">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>How it works:</strong><br>
                    • <strong>Default:</strong> Uses the {{ $user->role_label }} role's default permission<br>
                    • <strong class="text-success">✓ Grant:</strong> Override to explicitly allow (even if role default denies)<br>
                    • <strong class="text-danger">✗ Deny:</strong> Override to explicitly deny (even if role default allows)
                </div>
                
                <form action="{{ route('admin.users.permissions', $user) }}" method="POST" id="permissionsForm">
                    @csrf
                    @method('PUT')
                    
                    @foreach($permissions as $module => $modulePermissions)
                    <div class="mb-4">
                        <h6 class="text-uppercase text-muted mb-3 border-bottom pb-2">
                            <i class="fas fa-folder me-2"></i>{{ ucfirst($module) }} Module
                        </h6>
                        <div class="row">
                            @foreach($modulePermissions as $permission)
                            @php
                                $userPerm = $userPermissions->get($permission->id);
                                $currentStatus = 'default';
                                if ($userPerm && $userPerm->pivot) {
                                    $currentStatus = $userPerm->pivot->granted ? 'granted' : 'denied';
                                }
                                
                                // Check if default role has this permission
                                $hasDefault = \App\Models\Permission::isInRoleDefaults($user->user_type, $permission->name);
                                
                                // Determine effective permission
                                $effectivePermission = ($currentStatus === 'default') ? $hasDefault : ($currentStatus === 'granted');
                                $isOverridden = $currentStatus !== 'default';
                            @endphp
                            <div class="col-md-6 mb-3">
                                <div class="card {{ $isOverridden ? 'border-warning' : 'bg-light' }}">
                                    <div class="card-body py-2 px-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>{{ $permission->display_name }}</strong>
                                                @if($isOverridden)
                                                    <span class="badge bg-warning text-dark ms-1" style="font-size: 0.65rem;">Overridden</span>
                                                @endif
                                                <br>
                                                <small class="text-muted">
                                                    Role Default: 
                                                    @if($hasDefault)
                                                        <span class="text-success"><i class="fas fa-check"></i> Allowed</span>
                                                    @else
                                                        <span class="text-danger"><i class="fas fa-times"></i> Denied</span>
                                                    @endif
                                                    @if($isOverridden)
                                                        → <strong class="{{ $effectivePermission ? 'text-success' : 'text-danger' }}">
                                                            {{ $effectivePermission ? 'Allowed' : 'Denied' }}
                                                        </strong>
                                                    @endif
                                                </small>
                                            </div>
                                            <div>
                                                <select name="permissions[{{ $permission->id }}]" class="form-select form-select-sm {{ $isOverridden ? 'border-warning' : '' }}" style="width: 120px;">
                                                    <option value="default" {{ $currentStatus === 'default' ? 'selected' : '' }}>Default</option>
                                                    <option value="granted" {{ $currentStatus === 'granted' ? 'selected' : '' }}>✓ Grant</option>
                                                    <option value="denied" {{ $currentStatus === 'denied' ? 'selected' : '' }}>✗ Deny</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-2"></i>Save Permissions
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @elseif($user->isSuperAdmin())
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-shield-alt me-2"></i>User Permissions</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-warning mb-0">
                    <i class="fas fa-crown me-2"></i>
                    <strong>Super Admin</strong> has full access to all permissions. Individual permissions cannot be modified.
                </div>
            </div>
        </div>
        @endif
        
        @if($user->id !== auth()->id())
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <h5 class="card-title mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Danger Zone</h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Deleting this user will remove all their data permanently.</p>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this user? This cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fas fa-trash me-2"></i>Delete User
                    </button>
                </form>
            </div>
        </div>
        @endif
    </div>
    
    <div class="col-lg-4">
        <!-- User Info Card -->
        <div class="card mb-4">
            <div class="card-body text-center">
                @if($user->avatar)
                    <img src="{{ $user->avatar }}" alt="" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                @else
                    <div class="bg-primary bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                        <span class="text-primary fw-bold fs-1">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    </div>
                @endif
                <h5 class="mb-1">{{ $user->name }}</h5>
                <p class="text-muted mb-2">{{ $user->email }}</p>
                <span class="badge bg-{{ $user->role_badge_color }}">{{ $user->role_label }}</span>
            </div>
        </div>
        
        <!-- User Stats -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-chart-bar me-2"></i>User Stats</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Blogs Created</span>
                    <span class="fw-bold">{{ $user->blogs()->count() }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Last Login</span>
                    <span class="fw-bold">{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Account Created</span>
                    <span class="fw-bold">{{ $user->created_at->format('M d, Y') }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Status</span>
                    @if($user->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Custom Permissions Summary -->
        @if($userPermissions->count() > 0)
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-key me-2"></i>Custom Permissions</h5>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach($userPermissions as $perm)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <small>{{ $perm->display_name }}</small>
                        @if($perm->pivot->granted)
                            <span class="badge bg-success"><i class="fas fa-check"></i></span>
                        @else
                            <span class="badge bg-danger"><i class="fas fa-times"></i></span>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
