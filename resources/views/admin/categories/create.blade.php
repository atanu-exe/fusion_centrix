@extends('admin.layouts.app')

@section('title', 'Add Category')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Add Category</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.categories.index') }}">Categories</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Add</span>
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
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-tag me-2"></i>Category Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="color" class="form-label">Color</label>
                            <div class="input-group">
                                <input type="color" class="form-control form-control-color" 
                                       id="colorPicker" value="{{ old('color', '#4f46e5') }}"
                                       onchange="document.getElementById('color').value = this.value">
                                <input type="text" class="form-control @error('color') is-invalid @enderror" 
                                       id="color" name="color" value="{{ old('color', '#4f46e5') }}" 
                                       pattern="^#[0-9A-Fa-f]{6}$" placeholder="#4f46e5">
                            </div>
                            @error('color')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="icon" class="form-label">Icon (Font Awesome class)</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                   id="icon" name="icon" value="{{ old('icon') }}" placeholder="fas fa-folder">
                            <small class="text-muted">Example: fas fa-code, fas fa-globe, fas fa-chart-line</small>
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Create Category
                        </button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-eye me-2"></i>Preview</h5>
            </div>
            <div class="card-body text-center">
                <div class="mb-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded" 
                         id="iconPreview"
                         style="width: 60px; height: 60px; background-color: #4f46e520;">
                        <i class="fas fa-folder fs-4" style="color: #4f46e5;"></i>
                    </div>
                </div>
                <h5 id="namePreview">Category Name</h5>
                <p class="text-muted small" id="descPreview">Category description will appear here</p>
                <span class="badge rounded-pill" id="badgePreview" style="background-color: #4f46e520; color: #4f46e5;">
                    Sample Category
                </span>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-icons me-2"></i>Popular Icons</h5>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2">
                    @foreach(['fas fa-code', 'fas fa-globe', 'fas fa-chart-line', 'fas fa-laptop', 'fas fa-mobile-alt', 'fas fa-paint-brush', 'fas fa-bullhorn', 'fas fa-shopping-cart', 'fas fa-cog', 'fas fa-lightbulb', 'fas fa-rocket', 'fas fa-users'] as $icon)
                    <button type="button" class="btn btn-sm btn-outline-secondary icon-btn" 
                            onclick="document.getElementById('icon').value = '{{ $icon }}'">
                        <i class="{{ $icon }}"></i>
                    </button>
                    @endforeach
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
        document.getElementById('descPreview').textContent = this.value || 'Category description will appear here';
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
