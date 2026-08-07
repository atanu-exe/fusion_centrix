@extends('admin.layouts.app')

@section('title', $blog->title)

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">{{ $blog->title }}</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.blogs.index') }}">Blogs</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>View</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
        @if(auth()->user()->hasPermission('blogs.edit'))
        <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-primary">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <!-- Blog Content -->
        <div class="card mb-4">
            <div class="card-body">
                @if($blog->featured_image)
                <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}" 
                     class="img-fluid rounded mb-4" style="max-height: 400px; width: 100%; object-fit: cover;">
                @endif
                
                <div class="blog-content">
                    {!! $blog->content !!}
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <!-- Blog Meta -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-info-circle me-2"></i>Blog Details</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm mb-0">
                    <tr>
                        <th style="width: 40%;">Status</th>
                        <td>
                            @if($blog->is_published)
                                <span class="badge bg-success">Published</span>
                            @elseif($blog->scheduled_at)
                                <span class="badge bg-info">Scheduled</span>
                            @else
                                <span class="badge bg-warning text-dark">Draft</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Author</th>
                        <td>{{ $blog->creator->name ?? 'Unknown' }}</td>
                    </tr>
                    <tr>
                        <th>Created</th>
                        <td>{{ $blog->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Updated</th>
                        <td>{{ $blog->updated_at->format('M d, Y H:i') }}</td>
                    </tr>
                    @if($blog->published_at)
                    <tr>
                        <th>Published</th>
                        <td>{{ $blog->published_at->format('M d, Y H:i') }}</td>
                    </tr>
                    @endif
                    @if($blog->scheduled_at)
                    <tr>
                        <th>Scheduled For</th>
                        <td>{{ $blog->scheduled_at->format('M d, Y H:i') }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Slug</th>
                        <td><code>{{ $blog->slug }}</code></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Categories -->
        @if($blog->categories->count() > 0)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-tags me-2"></i>Categories</h5>
            </div>
            <div class="card-body">
                @foreach($blog->categories as $category)
                    <span class="badge bg-secondary me-1 mb-1">{{ $category->name }}</span>
                @endforeach
            </div>
        </div>
        @endif

        <!-- SEO Meta -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-search me-2"></i>SEO Meta</h5>
            </div>
            <div class="card-body">
                <p class="mb-2"><strong>Meta Title:</strong><br>
                    <small class="text-muted">{{ $blog->meta_title ?: 'Not set' }}</small>
                </p>
                <p class="mb-2"><strong>Meta Description:</strong><br>
                    <small class="text-muted">{{ $blog->meta_description ?: 'Not set' }}</small>
                </p>
                <p class="mb-0"><strong>Meta Keywords:</strong><br>
                    <small class="text-muted">{{ $blog->meta_keywords ?: 'Not set' }}</small>
                </p>
            </div>
        </div>

        <!-- Actions -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-cog me-2"></i>Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="btn btn-outline-primary">
                        <i class="fas fa-external-link-alt me-2"></i>View on Site
                    </a>
                    
                    @if(auth()->user()->hasPermission('blogs.publish'))
                        @if($blog->is_published)
                        <form action="{{ route('admin.blogs.unpublish', $blog) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-warning w-100">
                                <i class="fas fa-eye-slash me-2"></i>Unpublish
                            </button>
                        </form>
                        @else
                        <form action="{{ route('admin.blogs.publish', $blog) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-success w-100">
                                <i class="fas fa-check me-2"></i>Publish Now
                            </button>
                        </form>
                        @endif
                    @endif
                    
                    @if(auth()->user()->hasPermission('blogs.create'))
                    <form action="{{ route('admin.blogs.duplicate', $blog) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary w-100">
                            <i class="fas fa-copy me-2"></i>Duplicate
                        </button>
                    </form>
                    @endif
                    
                    @if(auth()->user()->hasPermission('blogs.delete'))
                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this blog?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
