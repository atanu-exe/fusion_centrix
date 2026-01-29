@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Dashboard</h1>
        <div class="page-breadcrumb">
            <i class="fas fa-home"></i>
            <span>Dashboard Overview</span>
        </div>
    </div>
    <div>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>New Blog Post
        </a>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div>
                    <div class="stat-value">{{ number_format($totalBlogs) }}</div>
                    <div class="stat-label">Total Blogs</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="stat-icon bg-success bg-opacity-10 text-success me-3">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <div class="stat-value">{{ number_format($publishedBlogs) }}</div>
                    <div class="stat-label">Published</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <div class="stat-value">{{ number_format($scheduledBlogs) }}</div>
                    <div class="stat-label">Scheduled</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="stat-icon bg-info bg-opacity-10 text-info me-3">
                    <i class="fas fa-eye"></i>
                </div>
                <div>
                    <div class="stat-value">{{ number_format($totalViews) }}</div>
                    <div class="stat-label">Total Views</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Publish Alert -->
@if($pendingPublish->count() > 0)
<div class="alert alert-warning d-flex align-items-center mb-4" role="alert">
    <i class="fas fa-exclamation-triangle me-3 fs-4"></i>
    <div>
        <strong>{{ $pendingPublish->count() }} blog(s) ready to publish!</strong>
        <br>
        <small>These blogs were scheduled and are ready to go live.</small>
    </div>
    <a href="{{ route('admin.blogs.index') }}?filter=scheduled" class="btn btn-warning btn-sm ms-auto">
        Review Now
    </a>
</div>
@endif

<div class="row g-4">
    <!-- Recent Blogs -->
    <div class="col-12 col-xl-8">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Recent Blog Posts</h5>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Views</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentBlogs as $blog)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($blog->thumbnail_image)
                                        <img src="{{ $blog->thumbnail_image }}" alt="" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                        @else
                                        <div class="bg-light rounded me-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                        @endif
                                        <div>
                                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-dark text-decoration-none fw-semibold">
                                                {{ Str::limit($blog->title, 40) }}
                                            </a>
                                            <br>
                                            <small class="text-muted">by {{ $blog->creator->name ?? 'Unknown' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($blog->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @elseif($blog->scheduled_at)
                                        <span class="badge bg-warning text-dark">Scheduled</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td>{{ number_format($blog->views) }}</td>
                                <td><small class="text-muted">{{ $blog->created_at->format('M d, Y') }}</small></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    No blog posts yet
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Top Performing Blogs -->
    <div class="col-12 col-xl-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title"><i class="fas fa-fire text-danger me-2"></i>Top Performing</h5>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @forelse($topBlogs as $index => $blog)
                    <li class="list-group-item d-flex align-items-center">
                        <span class="badge bg-{{ $index < 3 ? 'primary' : 'secondary' }} me-3">{{ $index + 1 }}</span>
                        <div class="flex-grow-1">
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-dark text-decoration-none">
                                {{ Str::limit($blog->title, 30) }}
                            </a>
                        </div>
                        <span class="text-muted small">
                            <i class="fas fa-eye me-1"></i>{{ number_format($blog->views) }}
                        </span>
                    </li>
                    @empty
                    <li class="list-group-item text-center text-muted py-4">
                        No published blogs yet
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Second Row -->
<div class="row g-4 mt-0">
    <!-- Categories -->
    <div class="col-12 col-md-6 col-xl-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fas fa-tags me-2"></i>Categories</h5>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-outline-primary">Manage</a>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @forelse($blogsByCategory as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>
                            <span class="badge rounded-pill me-2" style="background-color: {{ $category->color ?? '#6c757d' }}20; color: {{ $category->color ?? '#6c757d' }};">
                                <i class="{{ $category->icon ?? 'fas fa-folder' }}"></i>
                            </span>
                            {{ $category->name }}
                        </span>
                        <span class="badge bg-secondary rounded-pill">{{ $category->blogs_count }}</span>
                    </li>
                    @empty
                    <li class="list-group-item text-center text-muted py-4">
                        No categories yet
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    
    <!-- User Stats -->
    @if(auth()->user()->canManageUsers())
    <div class="col-12 col-md-6 col-xl-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fas fa-users me-2"></i>Users</h5>
                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-primary">Manage</a>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Total Users</span>
                    <span class="fw-bold">{{ $totalUsers }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Active Users</span>
                    <span class="fw-bold text-success">{{ $activeUsers }}</span>
                </div>
                <hr>
                <h6 class="mb-3">Recent Users</h6>
                @forelse($recentUsers->take(3) as $user)
                <div class="d-flex align-items-center mb-2">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                        <span class="text-primary fw-bold small">{{ substr($user->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <div class="small fw-semibold">{{ $user->name }}</div>
                        <div class="text-muted" style="font-size: 0.7rem;">{{ ucwords(str_replace('_', ' ', $user->user_type)) }}</div>
                    </div>
                </div>
                @empty
                <p class="text-muted small">No users yet</p>
                @endforelse
            </div>
        </div>
    </div>
    @endif
    
    <!-- Quick Stats -->
    <div class="col-12 col-md-6 col-xl-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title"><i class="fas fa-chart-pie me-2"></i>Blog Stats</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small">Published</span>
                        <span class="small fw-bold">{{ $publishedBlogs }}</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: {{ $totalBlogs > 0 ? ($publishedBlogs / $totalBlogs) * 100 : 0 }}%"></div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small">Draft</span>
                        <span class="small fw-bold">{{ $draftBlogs }}</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-secondary" style="width: {{ $totalBlogs > 0 ? ($draftBlogs / $totalBlogs) * 100 : 0 }}%"></div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small">Scheduled</span>
                        <span class="small fw-bold">{{ $scheduledBlogs }}</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-warning" style="width: {{ $totalBlogs > 0 ? ($scheduledBlogs / $totalBlogs) * 100 : 0 }}%"></div>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-6">
                        <div class="fs-4 fw-bold text-primary">{{ number_format($totalViews) }}</div>
                        <div class="small text-muted">Total Views</div>
                    </div>
                    <div class="col-6">
                        <div class="fs-4 fw-bold text-info">{{ number_format($totalShares) }}</div>
                        <div class="small text-muted">Total Shares</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
