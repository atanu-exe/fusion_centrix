@extends('admin.layouts.app')

@section('title', 'Roles & Permissions')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Roles & Permissions</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Roles</span>
        </div>
    </div>
</div>

<!-- Role Cards -->
<div class="row mb-4">
    @foreach($roles as $roleKey => $role)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center">
                <div class="rounded-circle d-flex align-items-center justify-content-center me-3" 
                     style="width: 40px; height: 40px; background-color: {{ $role['color'] }}20;">
                    <i class="{{ $role['icon'] }}" style="color: {{ $role['color'] }};"></i>
                </div>
                <div>
                    <h5 class="card-title mb-0">{{ $role['name'] }}</h5>
                    <small class="text-muted">{{ $role['user_count'] }} users</small>
                </div>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">{{ $role['description'] }}</p>
                
                @if($roleKey === 'super_admin')
                <div class="alert alert-warning mb-0">
                    <i class="fas fa-crown me-2"></i>
                    <strong>Full Access</strong> - All permissions granted
                </div>
                @else
                <span class="badge bg-primary">
                    @php
                        $perms = $roleDefaults[$roleKey] ?? [];
                        $count = is_array($perms) ? count($perms) : 0;
                    @endphp
                    {{ $count }} default permissions
                </span>
                @endif
            </div>
            <div class="card-footer bg-transparent border-top-0">
                <a href="{{ route('admin.users.index', ['role' => $roleKey]) }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-users me-1"></i>View Users
                </a>
                @if($roleKey !== 'super_admin')
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editRole{{ ucfirst(str_replace('_', '', $roleKey)) }}Modal">
                    <i class="fas fa-edit me-1"></i>Edit Permissions
                </button>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Permissions Matrix -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0"><i class="fas fa-table me-2"></i>Permissions Matrix</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="min-width: 200px;">Module / Permission</th>
                        @foreach($roles as $roleKey => $role)
                        <th class="text-center" style="min-width: 120px;">
                            <i class="{{ $role['icon'] }} me-1" style="color: {{ $role['color'] }};"></i>
                            {{ $role['name'] }}
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $module => $modulePermissions)
                    <tr class="table-secondary">
                        <td colspan="{{ count($roles) + 1 }}">
                            <strong><i class="fas fa-folder me-2"></i>{{ ucfirst($module) }}</strong>
                        </td>
                    </tr>
                    @foreach($modulePermissions as $permission)
                    <tr>
                        <td class="ps-4">{{ $permission->display_name }}</td>
                        @foreach($roles as $roleKey => $role)
                        <td class="text-center">
                            @if($roleKey === 'super_admin')
                                <i class="fas fa-check text-success"></i>
                            @else
                                @php
                                    $rolePerms = $roleDefaults[$roleKey] ?? [];
                                    $hasPermission = false;
                                    if (is_array($rolePerms)) {
                                        foreach ($rolePerms as $perm) {
                                            if ($perm === $permission->name || 
                                                (str_ends_with($perm, '.*') && str_starts_with($permission->name, str_replace('.*', '.', $perm)))) {
                                                $hasPermission = true;
                                                break;
                                            }
                                        }
                                    }
                                @endphp
                                @if($hasPermission)
                                    <i class="fas fa-check text-success"></i>
                                @else
                                    <i class="fas fa-times text-danger"></i>
                                @endif
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Role Permissions Modals -->
@foreach($roles as $roleKey => $role)
@if($roleKey !== 'super_admin')
<div class="modal fade" id="editRole{{ ucfirst(str_replace('_', '', $roleKey)) }}Modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.roles.permissions', $roleKey) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="{{ $role['icon'] }} me-2" style="color: {{ $role['color'] }};"></i>
                        Edit {{ $role['name'] }} Permissions
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                    @foreach($permissions as $module => $modulePermissions)
                    <div class="mb-4">
                        <h6 class="text-uppercase text-muted mb-3 border-bottom pb-2">
                            <i class="fas fa-folder me-2"></i>{{ ucfirst($module) }}
                        </h6>
                        <div class="row">
                            @foreach($modulePermissions as $permission)
                            @php
                                $rolePerms = $roleDefaults[$roleKey] ?? [];
                                $hasPermission = false;
                                if (is_array($rolePerms)) {
                                    foreach ($rolePerms as $perm) {
                                        if ($perm === $permission->name || 
                                            (str_ends_with($perm, '.*') && str_starts_with($permission->name, str_replace('.*', '.', $perm)))) {
                                            $hasPermission = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           name="permissions[]" 
                                           value="{{ $permission->name }}"
                                           id="{{ $roleKey }}_{{ $permission->id }}"
                                           {{ $hasPermission ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $roleKey }}_{{ $permission->id }}">
                                        {{ $permission->display_name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Permissions
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endforeach

<div class="alert alert-info mt-4">
    <i class="fas fa-info-circle me-2"></i>
    <strong>Note:</strong> Role permissions are defaults applied to all users with that role. 
    You can override permissions for individual users from the <a href="{{ route('admin.users.index') }}">User Management</a> page by editing a specific user.
</div>
@endsection
