<!-- Sidebar -->
<aside class="admin-sidebar" id="adminSidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">
            <i class="fas fa-bolt"></i>
        </div>
        <h4>FusionCentrix</h4>
    </div>
    
    <nav class="sidebar-nav">
        <!-- Main Menu -->
        <div class="nav-section">
            <div class="nav-section-title">Main Menu</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </div>
        
        <!-- Content Management -->
        @if(auth()->user()->hasModuleAccess('blogs') || auth()->user()->hasModuleAccess('categories'))
        <div class="nav-section">
            <div class="nav-section-title">Content Management</div>
            @if(auth()->user()->hasModuleAccess('blogs'))
            <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i>
                <span>Blog Posts</span>
                @php
                    $draftCount = \App\Models\Blog::where('is_published', false)->count();
                @endphp
                @if($draftCount > 0)
                    <span class="badge bg-warning text-dark">{{ $draftCount }}</span>
                @endif
            </a>
            @endif
            @if(auth()->user()->hasModuleAccess('categories'))
            <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="fas fa-tags"></i>
                <span>Categories</span>
            </a>
            @endif
        </div>
        @endif
        
        <!-- Marketing / CRM -->
        @if(auth()->user()->hasModuleAccess('leads') || auth()->user()->hasModuleAccess('email'))
        <div class="nav-section">
            <div class="nav-section-title">Marketing & CRM</div>
            @if(auth()->user()->hasModuleAccess('leads'))
            <a href="{{ route('admin.leads.index') }}" class="nav-link {{ request()->routeIs('admin.leads.*') && !request()->routeIs('admin.leads.import.*') ? 'active' : '' }}">
                <i class="fas fa-user-plus"></i>
                <span>Leads</span>
                @php
                    $newLeadsCount = \App\Models\Lead::where('lead_status_id', 1)->count();
                @endphp
                @if($newLeadsCount > 0)
                    <span class="badge bg-success">{{ $newLeadsCount }}</span>
                @endif
            </a>
            @if(auth()->user()->hasPermission('leads.import'))
            <a href="{{ route('admin.leads.import.form') }}" class="nav-link {{ request()->routeIs('admin.leads.import.*') ? 'active' : '' }}">
                <i class="fas fa-upload"></i>
                <span>Import Leads</span>
            </a>
            @endif
            @endif
            @if(auth()->user()->hasModuleAccess('email'))
            <a href="{{ route('admin.email.campaigns.index') }}" class="nav-link {{ request()->routeIs('admin.email.campaigns.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i>
                <span>Email Campaigns</span>
            </a>
            @if(auth()->user()->hasPermission('email.templates'))
            <a href="{{ route('admin.email.templates.index') }}" class="nav-link {{ request()->routeIs('admin.email.templates.*') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i>
                <span>Email Templates</span>
            </a>
            @endif
            @endif
        </div>
        @endif

        <!-- Client module  -->
        <div class="nav-section">
            <div class="nav-section-title">Core Section</div>
            <a href="{{ route('admin.clients.index') }}" class="nav-link {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                <i class="fas fa-user-plus"></i>
                <span>Clients</span>
            </a>
            <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <i class="fas fa-user-plus"></i>
                <span>Services</span>
            </a>
           
        </div>

        
        <!-- HRM Module -->
        @if(auth()->user()->hasModuleAccess('hrm'))
        <div class="nav-section">
            <div class="nav-section-title">HRM</div>
            <a href="{{ route('admin.hrm.attendance.index') }}" class="nav-link {{ request()->routeIs('admin.hrm.attendance.*') ? 'active' : '' }}">
                <i class="fas fa-clock"></i>
                <span>Attendance</span>
            </a>
            <a href="{{ route('admin.hrm.leaves.index') }}" class="nav-link {{ request()->routeIs('admin.hrm.leaves.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-times"></i>
                <span>Leaves</span>
                @if(auth()->user()->hasPermission('hrm.leaves'))
                @php
                    $pendingLeaves = \App\Models\LeaveRequest::where('status', 'pending')->count();
                @endphp
                @if($pendingLeaves > 0)
                    <span class="badge bg-warning text-dark">{{ $pendingLeaves }}</span>
                @endif
                @endif
            </a>
            @if(auth()->user()->hasPermission('hrm.salary'))
            <a href="{{ route('admin.hrm.salary.index') }}" class="nav-link {{ request()->routeIs('admin.hrm.salary.*') ? 'active' : '' }}">
                <i class="fas fa-money-bill-wave"></i>
                <span>Salary</span>
            </a>
            @endif
            @if(auth()->user()->hasPermission('hrm.leaves'))
            <a href="{{ route('admin.hrm.leave-types.index') }}" class="nav-link {{ request()->routeIs('admin.hrm.leave-types.*') ? 'active' : '' }}">
                <i class="fas fa-list-alt"></i>
                <span>Leave Types</span>
            </a>
            @endif
        </div>
        @endif
        
        <!-- User Management -->
        @if(auth()->user()->hasModuleAccess('users'))
        <div class="nav-section">
            <div class="nav-section-title">User Management</div>
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
            @if(auth()->user()->isSuperAdmin())
            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                <i class="fas fa-user-shield"></i>
                <span>Roles & Permissions</span>
            </a>
            @endif
        </div>
        @endif
        
        <!-- Analytics -->
        @if(auth()->user()->hasModuleAccess('analytics'))
        <div class="nav-section">
            <div class="nav-section-title">Analytics</div>
            <a href="{{ route('admin.analytics.overview') }}" class="nav-link {{ request()->routeIs('admin.analytics.overview') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i>
                <span>Overview</span>
            </a>
            <a href="{{ route('admin.analytics.realtime') }}" class="nav-link {{ request()->routeIs('admin.analytics.realtime') ? 'active' : '' }}">
                <i class="fas fa-broadcast-tower"></i>
                <span>Real-time</span>
            </a>
            <a href="{{ route('admin.analytics.pages') }}" class="nav-link {{ request()->routeIs('admin.analytics.pages') ? 'active' : '' }}">
                <i class="fas fa-file"></i>
                <span>Pages</span>
            </a>
            <a href="{{ route('admin.analytics.locations') }}" class="nav-link {{ request()->routeIs('admin.analytics.locations') ? 'active' : '' }}">
                <i class="fas fa-globe"></i>
                <span>Locations</span>
            </a>
        </div>
        @endif
        
        <!-- Settings -->
        <div class="nav-section">
            <div class="nav-section-title">Settings</div>
            @if(auth()->user()->hasModuleAccess('settings'))
            <a href="{{ route('admin.settings.general') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
            @endif
            <a href="{{ route('admin.profile') }}" class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                <i class="fas fa-user-circle"></i>
                <span>My Profile</span>
            </a>
        </div>
        
        <!-- Quick Links -->
        <div class="nav-section">
            <div class="nav-section-title">Quick Links</div>
            <a href="{{ route('home') }}" class="nav-link" target="_blank">
                <i class="fas fa-external-link-alt"></i>
                <span>View Website</span>
            </a>
            <a href="{{ route('admin.logout') }}" class="nav-link text-danger" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </nav>
    
    <!-- Sidebar Footer -->
    <div class="p-3 border-top border-secondary mt-auto">
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <span class="text-white fw-bold">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</span>
                </div>
            </div>
            <div class="flex-grow-1 ms-3">
                <p class="mb-0 text-white small fw-semibold">{{ auth()->user()->name ?? 'Admin' }}</p>
                <p class="mb-0 text-muted small">{{ ucwords(str_replace('_', ' ', auth()->user()->user_type ?? 'Admin')) }}</p>
            </div>
        </div>
    </div>
</aside>
