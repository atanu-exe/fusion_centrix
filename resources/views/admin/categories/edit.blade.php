@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Edit Category</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.categories.index') }}">Categories</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Edit</span>
        </div>
    </div>
    <div>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-tag me-2"></i>Category Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $category->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Slug: {{ $category->slug }}</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="color" class="form-label">Color</label>
                            <div class="input-group">
                                <input type="color" class="form-control form-control-color" 
                                       id="colorPicker" value="{{ old('color', $category->color ?? '#4f46e5') }}"
                                       onchange="document.getElementById('color').value = this.value">
                                <input type="text" class="form-control @error('color') is-invalid @enderror" 
                                       id="color" name="color" value="{{ old('color', $category->color) }}" 
                                       pattern="^#[0-9A-Fa-f]{6}$" placeholder="#4f46e5">
                            </div>
                            @error('color')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="icon" class="form-label">Icon (Font Awesome class)</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                   id="icon" name="icon" value="{{ old('icon', $category->icon) }}" placeholder="fas fa-folder">
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Category
                        </button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        
        @if($category->blogs()->count() == 0)
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <h5 class="card-title mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Danger Zone</h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Delete this category permanently. This cannot be undone.</p>
                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this category?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fas fa-trash me-2"></i>Delete Category
                    </button>
                </form>
            </div>
        </div>
        @endif
    </div>
    
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-eye me-2"></i>Preview</h5>
            </div>
            <div class="card-body text-center">
                <div class="mb-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded" 
                         id="iconPreview"
                         style="width: 60px; height: 60px; background-color: {{ $category->color ?? '#4f46e5' }}20;">
                        <i class="{{ $category->icon ?? 'fas fa-folder' }} fs-4" style="color: {{ $category->color ?? '#4f46e5' }};"></i>
                    </div>
                </div>
                <h5 id="namePreview">{{ $category->name }}</h5>
                <p class="text-muted small" id="descPreview">{{ $category->description ?? 'No description' }}</p>
                <span class="badge rounded-pill" id="badgePreview" style="background-color: {{ $category->color ?? '#4f46e5' }}20; color: {{ $category->color ?? '#4f46e5' }};">
                    {{ $category->name }}
                </span>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-chart-bar me-2"></i>Statistics</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Total Blogs</span>
                    <span class="fw-bold">{{ $category->blogs()->count() }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Published Blogs</span>
                    <span class="fw-bold">{{ $category->blogs()->where('is_published', true)->count() }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Created</span>
                    <span class="fw-bold">{{ $category->created_at->format('M d, Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('name').addEventListener('input', function() {
        document.getElementById('namePreview').textContent = this.value || 'Category Name';
        document.getElementById('badgePreview').textContent = this.value || 'Sample Category';
    });
    
    document.getElementById('description').addEventListener('input', function() {
        document.getElementById('descPreview').textContent = this.value || 'No description';
    });
    
    document.getElementById('color').addEventListener('input', function() {
        updateColorPreview(this.value);
        document.getElementById('colorPicker').value = this.value;
    });
    
    function updateColorPreview(color) {
        document.getElementById('iconPreview').style.backgroundColor = color + '20';
        document.getElementById('iconPreview').querySelector('i').style.color = color;
        document.getElementById('badgePreview').style.backgroundColor = color + '20';
        document.getElementById('badgePreview').style.color = color;
    }
    
    document.getElementById('icon').addEventListener('input', function() {
        var iconEl = document.getElementById('iconPreview').querySelector('i');
        iconEl.className = this.value || 'fas fa-folder';
        iconEl.classList.add('fs-4');
    });
</script>
@endpush
