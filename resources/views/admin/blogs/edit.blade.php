@extends('admin.layouts.app')

@section('title', 'Edit Blog Post')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<style>
    #editor-container {
        height: 400px;
        background: white;
        border-radius: 0 0 8px 8px;
    }
    .ql-toolbar {
        border-radius: 8px 8px 0 0 !important;
    }
    .ql-container {
        border-radius: 0 0 8px 8px !important;
        font-size: 1rem;
    }
    .image-preview {
        max-height: 150px;
        border-radius: 8px;
        object-fit: cover;
    }
    .current-image {
        max-height: 120px;
        border-radius: 8px;
        object-fit: cover;
    }
</style>
@endpush

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Edit Blog Post</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.blogs.index') }}">Blog Posts</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Edit</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-outline-secondary" target="_blank">
            <i class="fas fa-eye me-2"></i>Preview
        </a>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
    </div>
</div>

<!-- Blog Info Card -->
<div class="card mb-4 border-0 bg-light">
    <div class="card-body py-3">
        <div class="row align-items-center">
            <div class="col-auto">
                @if($blog->thumbnail_image)
                    <img src="{{ $blog->thumbnail_image }}" alt="" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                @else
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="fas fa-image text-white"></i>
                    </div>
                @endif
            </div>
            <div class="col">
                <h5 class="mb-1">{{ Str::limit($blog->title, 60) }}</h5>
                <div class="text-muted small">
                    <span class="me-3"><i class="fas fa-eye me-1"></i>{{ number_format($blog->views) }} views</span>
                    <span class="me-3"><i class="fas fa-share me-1"></i>{{ number_format($blog->shares) }} shares</span>
                    <span><i class="fas fa-clock me-1"></i>{{ $blog->reading_time }} min read</span>
                </div>
            </div>
            <div class="col-auto">
                @if($blog->is_published)
                    <span class="badge bg-success fs-6"><i class="fas fa-check me-1"></i>Published</span>
                @elseif($blog->scheduled_at)
                    <span class="badge bg-warning text-dark fs-6"><i class="fas fa-clock me-1"></i>Scheduled</span>
                @else
                    <span class="badge bg-secondary fs-6"><i class="fas fa-file me-1"></i>Draft</span>
                @endif
            </div>
        </div>
    </div>
</div>

<form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" id="blogForm">
    @csrf
    @method('PUT')
    
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-edit me-2"></i>Content</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" 
                               class="form-control form-control-lg @error('title') is-invalid @enderror" 
                               value="{{ old('title', $blog->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Slug: {{ $blog->slug }}</small>
                    </div>
                    
                    <div class="mb-4">
                        <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                        <div id="editor-container"></div>
                        <textarea name="content" id="content" class="d-none">{{ old('content', $blog->content) }}</textarea>
                        @error('content')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- SEO Settings -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-search me-2"></i>SEO Settings</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" 
                               class="form-control @error('meta_title') is-invalid @enderror" 
                               value="{{ old('meta_title', $blog->meta_title) }}"
                               placeholder="Leave blank to use main title">
                        <small class="text-muted">Recommended: 50-60 characters</small>
                        @error('meta_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" 
                                  class="form-control @error('meta_description') is-invalid @enderror" 
                                  rows="3">{{ old('meta_description', $blog->meta_description) }}</textarea>
                        <small class="text-muted">Recommended: 150-160 characters</small>
                        @error('meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-0">
                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" id="meta_keywords" 
                               class="form-control @error('meta_keywords') is-invalid @enderror" 
                               value="{{ old('meta_keywords', $blog->meta_keywords) }}"
                               placeholder="keyword1, keyword2, keyword3">
                        @error('meta_keywords')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Publish Settings -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-cog me-2"></i>Publish</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="is_published" class="form-select" id="publishStatus">
                            <option value="0" {{ !$blog->is_published ? 'selected' : '' }}>Draft</option>
                            <option value="1" {{ $blog->is_published ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>
                    
                    <div class="mb-3" id="scheduleField" style="{{ $blog->is_published ? 'display:none;' : '' }}">
                        <label for="scheduled_at" class="form-label">Schedule Publication</label>
                        <input type="datetime-local" name="scheduled_at" id="scheduled_at" 
                               class="form-control @error('scheduled_at') is-invalid @enderror"
                               value="{{ old('scheduled_at', $blog->scheduled_at ? $blog->scheduled_at->format('Y-m-d\TH:i') : '') }}">
                        <small class="text-muted">Leave empty for draft, or set date to schedule</small>
                        @error('scheduled_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    @if($blog->published_at)
                    <div class="mb-3">
                        <small class="text-muted">
                            <i class="fas fa-calendar me-1"></i>Published: {{ $blog->published_at->format('M d, Y h:i A') }}
                        </small>
                    </div>
                    @endif
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Blog
                        </button>
                        @if(!$blog->is_published)
                        <button type="submit" name="is_published" value="1" class="btn btn-success">
                            <i class="fas fa-globe me-2"></i>Publish Now
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Categories -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-tags me-2"></i>Categories</h5>
                </div>
                <div class="card-body">
                    @if($categories->count() > 0)
                        <div class="category-list" style="max-height: 200px; overflow-y: auto;">
                            @foreach($categories as $category)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" 
                                       name="categories[]" value="{{ $category->id }}" 
                                       id="cat_{{ $category->id }}"
                                       {{ in_array($category->id, old('categories', $blog->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                                <label class="form-check-label" for="cat_{{ $category->id }}">
                                    <span class="badge rounded-pill me-1" 
                                          style="background-color: {{ $category->color ?? '#6c757d' }}20; color: {{ $category->color ?? '#6c757d' }};">
                                        {{ $category->icon ?? '' }}
                                    </span>
                                    {{ $category->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mb-2">No categories available.</p>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus me-1"></i>Add Category
                        </a>
                    @endif
                </div>
            </div>
            
            <!-- Featured Image -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-image me-2"></i>Featured Image</h5>
                </div>
                <div class="card-body">
                    @if($blog->featured_image)
                    <div class="mb-3 text-center">
                        <img src="{{ $blog->featured_image }}" alt="Current featured image" class="current-image w-100 mb-2">
                        <small class="text-muted d-block">Current image</small>
                    </div>
                    @endif
                    
                    <div class="mb-3">
                        <input type="file" name="featured_image" id="featured_image" 
                               class="form-control @error('featured_image') is-invalid @enderror" 
                               accept="image/jpeg,image/jpg,image/png,image/gif,image/webp"
                               onchange="previewImage(this, 'featuredPreview')">
                        <small class="text-muted">Upload new to replace. Max 5MB</small>
                        @error('featured_image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <img id="featuredPreview" src="" alt="Preview" class="image-preview d-none w-100">
                    </div>
                </div>
            </div>
            
            <!-- Thumbnail Image -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-image me-2"></i>Thumbnail Image</h5>
                </div>
                <div class="card-body">
                    @if($blog->thumbnail_image)
                    <div class="mb-3 text-center">
                        <img src="{{ $blog->thumbnail_image }}" alt="Current thumbnail" class="current-image w-100 mb-2">
                        <small class="text-muted d-block">Current thumbnail</small>
                    </div>
                    @endif
                    
                    <div class="mb-3">
                        <input type="file" name="thumbnail_image" id="thumbnail_image" 
                               class="form-control @error('thumbnail_image') is-invalid @enderror" 
                               accept="image/jpeg,image/jpg,image/png,image/gif,image/webp"
                               onchange="previewImage(this, 'thumbnailPreview')">
                        <small class="text-muted">Optional. Upload new to replace</small>
                        @error('thumbnail_image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <img id="thumbnailPreview" src="" alt="Preview" class="image-preview d-none w-100">
                    </div>
                </div>
            </div>
            
            <!-- Danger Zone -->
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">
                    <h5 class="card-title mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Danger Zone</h5>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-3">Once you delete this blog, there is no going back. Please be certain.</p>
                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this blog? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Blog
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
    // Initialize Quill editor
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        placeholder: 'Write your blog content here...',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['blockquote', 'code-block'],
                ['link', 'image', 'video'],
                ['clean']
            ]
        }
    });
    
    // Set initial content
    var content = document.getElementById('content').value;
    if (content) {
        quill.root.innerHTML = content;
    }
    
    // Update hidden textarea before form submit
    document.getElementById('blogForm').addEventListener('submit', function() {
        document.getElementById('content').value = quill.root.innerHTML;
    });
    
    // Image preview
    function previewImage(input, previewId) {
        var preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.classList.add('d-none');
        }
    }
    
    // Toggle schedule field based on status
    document.getElementById('publishStatus').addEventListener('change', function() {
        var scheduleField = document.getElementById('scheduleField');
        if (this.value === '1') {
            scheduleField.style.display = 'none';
        } else {
            scheduleField.style.display = 'block';
        }
    });
</script>
@endpush
