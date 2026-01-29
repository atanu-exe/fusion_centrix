<!-- Header -->
<header class="admin-header">
    <div class="d-flex align-items-center">
        <!-- Mobile Toggle -->
        <button class="btn btn-icon d-lg-none me-2" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Search -->
        <div class="header-search d-none d-md-block">
            <i class="fas fa-search"></i>
            <input type="text" class="form-control" placeholder="Search..." id="globalSearch">
        </div>
    </div>
    
    <div class="header-actions">
        <!-- Theme Toggle -->
        <button class="btn-icon" id="themeToggle" data-bs-toggle="tooltip" title="Toggle Theme">
            <i class="fas fa-moon"></i>
        </button>
        
        <!-- Notifications -->
        <div class="dropdown">
            <button class="btn-icon" data-bs-toggle="dropdown">
                <i class="fas fa-bell"></i>
                @php
                    $scheduledBlogs = \App\Models\Blog::whereNotNull('scheduled_at')
                        ->where('scheduled_at', '<=', now())
                        ->where('is_published', false)
                        ->count();
                @endphp
                @if($scheduledBlogs > 0)
                    <span class="badge bg-danger">{{ $scheduledBlogs }}</span>
                @endif
            </button>
            <div class="dropdown-menu dropdown-menu-end" style="width: 320px;">
                <h6 class="dropdown-header">Notifications</h6>
                @if($scheduledBlogs > 0)
                    <a class="dropdown-item" href="{{ route('admin.blogs.index') }}?filter=scheduled">
                        <i class="fas fa-clock text-warning me-2"></i>
                        {{ $scheduledBlogs }} blog(s) ready to publish
                    </a>
                @else
                    <div class="dropdown-item text-muted text-center py-3">
                        <i class="fas fa-check-circle mb-2 d-block"></i>
                        No new notifications
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Quick Add -->
        <div class="dropdown">
            <button class="btn btn-primary btn-sm" data-bs-toggle="dropdown">
                <i class="fas fa-plus me-1"></i> New
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="{{ route('admin.blogs.create') }}">
                    <i class="fas fa-newspaper me-2"></i>New Blog Post
                </a>
                @if(auth()->user() && in_array(auth()->user()->user_type, ['super_admin', 'admin']))
                <a class="dropdown-item" href="{{ route('admin.users.create') }}">
                    <i class="fas fa-user-plus me-2"></i>New User
                </a>
                @endif
                <a class="dropdown-item" href="{{ route('admin.categories.create') }}">
                    <i class="fas fa-tag me-2"></i>New Category
                </a>
            </div>
        </div>
        
        <!-- User Dropdown -->
        <div class="dropdown user-dropdown ms-2">
            <button class="dropdown-toggle" data-bs-toggle="dropdown">
                @if(auth()->user() && auth()->user()->avatar)
                    <img src="{{ auth()->user()->avatar }}" alt="Avatar" class="user-avatar">
                @else
                    <div class="user-avatar bg-primary d-flex align-items-center justify-content-center text-white fw-bold" style="font-size: 0.75rem;">
                        {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                    </div>
                @endif
                <div class="user-info d-none d-sm-block">
                    <div class="user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <div class="user-role">{{ ucwords(str_replace('_', ' ', auth()->user()->user_type ?? 'Admin')) }}</div>
                </div>
                <i class="fas fa-chevron-down ms-2 text-muted" style="font-size: 0.7rem;"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                    <i class="fas fa-user me-2"></i>My Profile
                </a>
                <a class="dropdown-item" href="{{ route('admin.settings.general') }}">
                    <i class="fas fa-cog me-2"></i>Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                </a>
                <form id="logout-form-header" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</header>
