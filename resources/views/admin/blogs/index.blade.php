<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Management - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.blogs.index') }}">
                <i class="fas fa-newspaper me-2"></i>Blog Admin
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('home') }}" target="_blank">
                    <i class="fas fa-eye me-1"></i>View Site
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-md-6">
                <h2 class="mb-0"><i class="fas fa-list me-2"></i>All Blog Posts</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create New Blog
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 40%">Title</th>
                                <th style="width: 15%">Categories</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 10%">Views</th>
                                <th style="width: 15%">Published</th>
                                <th style="width: 10%" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($blogs as $blog)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($blog->thumbnail_image)
                                                <img src="{{ $blog->thumbnail_image }}" alt="{{ $blog->title }}" 
                                                     class="rounded me-2" style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <div class="bg-secondary rounded me-2 d-flex align-items-center justify-content-center" 
                                                     style="width: 50px; height: 50px;">
                                                    <i class="fas fa-image text-white"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <strong>{{ Str::limit($blog->title, 50) }}</strong>
                                                <br>
                                                <small class="text-muted">{{ $blog->slug }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @forelse($blog->categories as $category)
                                            <span class="badge rounded-pill" style="background-color: {{ $category->color }}20; color: {{ $category->color }}; border: 1px solid {{ $category->color }};">
                                                {{ $category->name }}
                                            </span>
                                        @empty
                                            <span class="text-muted">No categories</span>
                                        @endforelse
                                    </td>
                                    <td>
                                        @if($blog->is_published)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Published
                                            </span>
                                        @else
                                            <span class="badge bg-warning text-dark">
                                                <i class="fas fa-clock me-1"></i>Draft
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
                                                Not published
                                            @endif
                                        </small>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('blog.show', $blog->slug) }}" 
                                               class="btn btn-outline-secondary" target="_blank" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.blogs.edit', $blog) }}" 
                                               class="btn btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.blogs.destroy', $blog) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">No blog posts yet. Create your first one!</p>
                                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus me-2"></i>Create New Blog
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
            {{ $blogs->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
