<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Admin Panel</title>
    
    <!-- Load theme immediately to prevent flash -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('admin-theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', savedTheme);
        })();
    </script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Custom Admin Styles -->
    <style>
        :root {
            --sidebar-width: 260px;
            --header-height: 60px;
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --sidebar-bg: #1e1e2d;
            --sidebar-text: #9899ac;
            --sidebar-hover: #2a2b3d;
            --sidebar-active: #4f46e5;
        }
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background-color: #f5f5f9;
        }
        
        /* Sidebar */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
        }
        
        .admin-sidebar::-webkit-scrollbar {
            width: 5px;
        }
        
        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.1);
            border-radius: 5px;
        }
        
        .sidebar-brand {
            height: var(--header-height);
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-brand h4 {
            color: #fff;
            margin: 0;
            font-weight: 700;
            font-size: 1.25rem;
        }
        
        .sidebar-brand .brand-icon {
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, var(--primary-color), #7c3aed);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
        }
        
        .sidebar-brand .brand-icon i {
            color: #fff;
            font-size: 1rem;
        }
        
        .sidebar-nav {
            padding: 1rem 0;
        }
        
        .nav-section {
            padding: 0 1rem;
            margin-bottom: 1rem;
        }
        
        .nav-section-title {
            color: rgba(255,255,255,0.3);
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.5rem 0.75rem;
        }
        
        .sidebar-nav .nav-link {
            color: var(--sidebar-text);
            padding: 0.65rem 0.75rem;
            border-radius: 8px;
            margin-bottom: 2px;
            display: flex;
            align-items: center;
            transition: all 0.2s ease;
        }
        
        .sidebar-nav .nav-link:hover {
            color: #fff;
            background: var(--sidebar-hover);
        }
        
        .sidebar-nav .nav-link.active {
            color: #fff;
            background: var(--sidebar-active);
        }
        
        .sidebar-nav .nav-link i {
            width: 20px;
            margin-right: 0.75rem;
            font-size: 0.9rem;
        }
        
        .sidebar-nav .nav-link .badge {
            margin-left: auto;
            font-size: 0.65rem;
        }
        
        /* Main Content */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
        }
        
        /* Header */
        .admin-header {
            height: var(--header-height);
            background: #fff;
            border-bottom: 1px solid #e5e5e5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            position: sticky;
            top: 0;
            z-index: 999;
        }
        
        .header-search {
            position: relative;
            width: 300px;
        }
        
        .header-search input {
            padding-left: 2.5rem;
            border-radius: 8px;
            border: 1px solid #e5e5e5;
            background: #f5f5f9;
        }
        
        .header-search i {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .header-actions .btn-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            background: transparent;
            border: none;
            position: relative;
        }
        
        .header-actions .btn-icon:hover {
            background: #f5f5f9;
        }
        
        .header-actions .btn-icon .badge {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 0.6rem;
            padding: 0.2rem 0.35rem;
        }
        
        .user-dropdown .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.35rem 0.75rem;
            border-radius: 8px;
            background: #f5f5f9;
            border: none;
        }
        
        .user-dropdown .dropdown-toggle::after {
            display: none;
        }
        
        .user-dropdown .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            object-fit: cover;
        }
        
        .user-dropdown .user-info {
            text-align: left;
            line-height: 1.2;
        }
        
        .user-dropdown .user-name {
            font-weight: 600;
            font-size: 0.85rem;
            color: #333;
        }
        
        .user-dropdown .user-role {
            font-size: 0.7rem;
            color: #999;
        }
        
        /* Content Area */
        .admin-content {
            padding: 1.5rem;
        }
        
        /* Page Header */
        .page-header {
            margin-bottom: 1.5rem;
        }
        
        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 0.25rem;
        }
        
        .page-breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: #999;
        }
        
        .page-breadcrumb a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        
        .card-header {
            background: transparent;
            border-bottom: 1px solid #f0f0f0;
            padding: 1rem 1.25rem;
        }
        
        .card-title {
            font-size: 1rem;
            font-weight: 600;
            margin: 0;
        }
        
        /* Stats Cards */
        .stat-card {
            padding: 1.25rem;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        
        .stat-card .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
        
        .stat-card .stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: #333;
        }
        
        .stat-card .stat-label {
            font-size: 0.85rem;
            color: #999;
        }
        
        .stat-card .stat-change {
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .stat-card .stat-change.positive {
            color: #22c55e;
        }
        
        .stat-card .stat-change.negative {
            color: #ef4444;
        }
        
        /* Tables */
        .table {
            margin: 0;
        }
        
        .table th {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #999;
            border-bottom: 1px solid #f0f0f0;
            padding: 0.75rem 1rem;
        }
        
        .table td {
            padding: 0.85rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f8f8f8;
        }
        
        /* Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
        }
        
        .btn-primary {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background: var(--primary-hover);
            border-color: var(--primary-hover);
        }
        
        /* Forms */
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #e5e5e5;
            padding: 0.6rem 0.85rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
        
        .form-label {
            font-weight: 500;
            font-size: 0.875rem;
            margin-bottom: 0.35rem;
        }
        
        /* Badges */
        .badge {
            font-weight: 500;
            padding: 0.35rem 0.65rem;
            border-radius: 6px;
        }
        
        /* Alerts */
        .alert {
            border: none;
            border-radius: 10px;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            
            .admin-sidebar.show {
                transform: translateX(0);
            }
            
            .admin-main {
                margin-left: 0;
            }
            
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.5);
                z-index: 999;
            }
            
            .sidebar-overlay.show {
                display: block;
            }
        }
        
        /* Dark Mode Support */
        [data-bs-theme="dark"] {
            --sidebar-bg: #151521;
            --sidebar-hover: #1e1e2d;
        }
        
        [data-bs-theme="dark"] body {
            background-color: #1e1e2d;
        }
        
        [data-bs-theme="dark"] .admin-header,
        [data-bs-theme="dark"] .card,
        [data-bs-theme="dark"] .stat-card {
            background: #1e1e2d;
            border-color: rgba(255,255,255,0.05);
        }
        
        [data-bs-theme="dark"] .table th,
        [data-bs-theme="dark"] .table td {
            border-color: rgba(255,255,255,0.05);
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Sidebar Overlay (Mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <!-- Sidebar -->
    @include('admin.components.sidebar')
    
    <!-- Main Content -->
    <div class="admin-main">
        <!-- Header -->
        @include('admin.components.header')
        
        <!-- Content -->
        <div class="admin-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @yield('content')
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Mobile Sidebar Toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.querySelector('.admin-sidebar').classList.toggle('show');
            document.getElementById('sidebarOverlay').classList.toggle('show');
        });
        
        document.getElementById('sidebarOverlay')?.addEventListener('click', function() {
            document.querySelector('.admin-sidebar').classList.remove('show');
            this.classList.remove('show');
        });
        
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // CSRF Token for AJAX
        window.csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        
        // Theme Toggle
        document.getElementById('themeToggle')?.addEventListener('click', function() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('admin-theme', newTheme);
            
            const icon = this.querySelector('i');
            icon.className = newTheme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
        });
        
        // Update theme icon on load
        (function() {
            const savedTheme = localStorage.getItem('admin-theme') || 'light';
            const icon = document.querySelector('#themeToggle i');
            if (icon) {
                icon.className = savedTheme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
            }
        })();
    </script>
    
    @stack('scripts')
</body>
</html>
