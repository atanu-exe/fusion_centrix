@extends('admin.layouts.app')

@section('title', 'Blog Posts')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Blog Posts</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Blog Posts</span>
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
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-value">{{ number_format($stats['total']) }}</div>
            <div class="stat-label">Total</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-value text-success">{{ number_format($stats['published']) }}</div>
            <div class="stat-label">Published</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-value text-secondary">{{ number_format($stats['draft']) }}</div>
            <div class="stat-label">Drafts</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-value text-warning">{{ number_format($stats['scheduled']) }}</div>
            <div class="stat-label">Scheduled</div>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.blogs.index') }}" class="row g-3">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" name="search" placeholder="Search blogs..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <select name="filter" class="form-select">
                    <option value="">All Status</option>
                    <option value="published" {{ request('filter') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('filter') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="scheduled" {{ request('filter') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-primary w-100">
                    <i class="fas fa-filter me-1"></i>Filter
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Blog Table -->
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width: 40%">Title</th>
                        <th>Categories</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($blog->thumbnail_image)
                                    <img src="{{ $blog->thumbnail_image_url }}" alt="{{ $blog->title }}" 
                                         class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" 
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                                <div>
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="fw-semibold text-dark text-decoration-none">
                                        {{ Str::limit($blog->title, 50) }}
                                    </a>
                                    <br>
                                    <small class="text-muted">
                                        by {{ $blog->creator->name ?? 'Unknown' }}
                                        @if($blog->scheduled_at && !$blog->is_published)
                                            · <i class="fas fa-clock"></i> {{ $blog->scheduled_at->format('M d, Y h:i A') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td>
                            @forelse($blog->categories->take(2) as $category)
                                <span class="badge rounded-pill" 
                                      style="background-color: {{ $category->color ?? '#6c757d' }}20; color: {{ $category->color ?? '#6c757d' }}; border: 1px solid {{ $category->color ?? '#6c757d' }}40;">
                                    {{ $category->name }}
                                </span>
                            @empty
                                <span class="text-muted small">No categories</span>
                            @endforelse
                            @if($blog->categories->count() > 2)
                                <span class="badge bg-light text-dark">+{{ $blog->categories->count() - 2 }}</span>
                            @endif
                        </td>
                        <td>
                            @if($blog->is_published)
                                <span class="badge bg-success">
                                    <i class="fas fa-check me-1"></i>Published
                                </span>
                            @elseif($blog->scheduled_at)
                                <span class="badge bg-warning text-dark">
                                    <i class="fas fa-clock me-1"></i>Scheduled
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    <i class="fas fa-file me-1"></i>Draft
                                </span>
                            @endif
                        </td>
                        <td>
                            <i class="fas fa-eye text-muted me-1"></i>{{ number_format($blog->views) }}
                        </td>
                        <td>
                            <small class="text-muted">
                                @if($blog->published_at)
                                    {{ $blog->published_at->format('M d, Y') }}
                                @else
                                    {{ $blog->created_at->format('M d, Y') }}
                                @endif
                            </small>
                        </td>
                        <td class="text-end">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('blog.show', $blog->slug) }}" target="_blank">
                                            <i class="fas fa-eye me-2"></i>View
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.blogs.edit', $blog) }}">
                                            <i class="fas fa-edit me-2"></i>Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('admin.blogs.duplicate', $blog) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="fas fa-copy me-2"></i>Duplicate
                                            </button>
                                        </form>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    @if(!$blog->is_published)
                                        <li>
                                            <form action="{{ route('admin.blogs.publish', $blog) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item text-success">
                                                    <i class="fas fa-check me-2"></i>Publish Now
                                                </button>
                                            </form>
                                        </li>
                                    @else
                                        <li>
                                            <form action="{{ route('admin.blogs.unpublish', $blog) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item text-warning">
                                                    <i class="fas fa-eye-slash me-2"></i>Unpublish
                                                </button>
                                            </form>
                                        </li>
                                    @endif
                                    <li>
                                        <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-trash me-2"></i>Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted mb-3">No blog posts found</p>
                            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Create Your First Blog
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pagination -->
@if($blogs->hasPages())
<div class="d-flex justify-content-center mt-4">
    {{ $blogs->links() }}
</div>
@endif
@endsection
