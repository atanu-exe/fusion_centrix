@extends('admin.layouts.app')

@section('title', 'Categories')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Categories</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Categories</span>
        </div>
    </div>
    <div>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Category
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Blogs</th>
                        <th>Slug</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="me-3 d-flex align-items-center justify-content-center rounded" 
                                     style="width: 40px; height: 40px; background-color: {{ $category->color ?? '#6c757d' }}20;">
                                    @if($category->icon)
                                        <i class="{{ $category->icon }}" style="color: {{ $category->color ?? '#6c757d' }};"></i>
                                    @else
                                        <i class="fas fa-folder" style="color: {{ $category->color ?? '#6c757d' }};"></i>
                                    @endif
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $category->name }}</div>
                                    @if($category->color)
                                        <div class="d-flex align-items-center">
                                            <span class="me-1" style="width: 12px; height: 12px; background: {{ $category->color }}; border-radius: 3px; display: inline-block;"></span>
                                            <small class="text-muted">{{ $category->color }}</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <small class="text-muted">{{ Str::limit($category->description, 50) ?? 'No description' }}</small>
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ $category->blogs_count }} blogs</span>
                        </td>
                        <td>
                            <code class="small">{{ $category->slug }}</code>
                        </td>
                        <td class="text-end">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure? Categories with blogs cannot be deleted.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <i class="fas fa-tags fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted mb-3">No categories yet</p>
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add Category
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($categories->hasPages())
<div class="d-flex justify-content-center mt-4">
    {{ $categories->links() }}
</div>
@endif
@endsection
