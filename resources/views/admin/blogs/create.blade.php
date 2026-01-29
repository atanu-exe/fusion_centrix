<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Blog - Admin</title>
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
                <a class="nav-link" href="{{ route('admin.blogs.index') }}">
                    <i class="fas fa-arrow-left me-1"></i>Back to List
                </a>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Create New Blog Post</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <strong>Validation Error:</strong>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">
                                    <i class="fas fa-heading me-1"></i>Title *
                                </label>
                                <input type="text" name="title" id="title" 
                                       class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                       value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="featured_image" class="form-label fw-bold">
                                        <i class="fas fa-image me-1"></i>Featured Image (1200x630px)
                                    </label>
                                    <input type="file" name="featured_image" id="featured_image" 
                                           class="form-control @error('featured_image') is-invalid @enderror" 
                                           accept="image/jpeg,image/jpg,image/png,image/gif,image/webp"
                                           onchange="previewImage(this, 'featuredPreview')">
                                    <small class="text-muted">Max 5MB. Formats: JPG, PNG, GIF, WebP</small>
                                    @error('featured_image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <div class="mt-2">
                                        <img id="featuredPreview" src="" alt="Preview" class="img-thumbnail d-none" style="max-height: 150px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="thumbnail_image" class="form-label fw-bold">
                                        <i class="fas fa-image me-1"></i>Thumbnail Image (400x300px)
                                    </label>
                                    <input type="file" name="thumbnail_image" id="thumbnail_image" 
                                           class="form-control @error('thumbnail_image') is-invalid @enderror" 
                                           accept="image/jpeg,image/jpg,image/png,image/gif,image/webp"
                                           onchange="previewImage(this, 'thumbnailPreview')">
                                    <small class="text-muted">Optional. Uses featured image if not provided</small>
                                    @error('thumbnail_image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <div class="mt-2">
                                        <img id="thumbnailPreview" src="" alt="Preview" class="img-thumbnail d-none" style="max-height: 150px;">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="content" class="form-label fw-bold">
                                    <i class="fas fa-align-left me-1"></i>Content *
                                </label>
                                <div id="editor-container" style="height: 400px; background: white;"></div>
                                <textarea name="content" id="content" class="d-none">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">
                                    <i class="fas fa-tags me-1"></i>Categories
                                </label>
                                <div class="row">
                                    @foreach($categories as $category)
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                       name="categories[]" value="{{ $category->id }}" 
                                                       id="cat_{{ $category->id }}"
                                                       {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="cat_{{ $category->id }}">
                                                    <span style="color: {{ $category->color }}">{{ $category->icon ?? '📌' }}</span>
                                                    {{ $category->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <hr>

                            <h5 class="mb-3"><i class="fas fa-search me-2"></i>SEO Settings</h5>

                            <div class="mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" 
                                       class="form-control @error('meta_title') is-invalid @enderror" 
                                       value="{{ old('meta_title') }}"
                                       placeholder="Leave blank to use main title">
                                @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" 
                                          class="form-control @error('meta_description') is-invalid @enderror" 
                                          rows="2" 
                                          placeholder="Leave blank to auto-generate from content">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" 
                                       class="form-control @error('meta_keywords') is-invalid @enderror" 
                                       value="{{ old('meta_keywords') }}"
                                       placeholder="keyword1, keyword2, keyword3">
                                @error('meta_keywords')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>

                            <div class="mb-4">
                                <label class="form-label fw-bold">
                                    <i class="fas fa-eye me-1"></i>Publication Status *
                                </label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_published" 
                                               id="publish_true" value="1" {{ old('is_published', '0') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="publish_true">
                                            <i class="fas fa-globe text-success me-1"></i><strong>Published</strong>
                                            <small class="d-block text-muted">Visible to public immediately</small>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_published" 
                                               id="publish_false" value="0" {{ old('is_published', '0') == '0' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="publish_false">
                                            <i class="fas fa-file-alt text-warning me-1"></i><strong>Draft</strong>
                                            <small class="d-block text-muted">Save without publishing</small>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2 justify-content-between">
                                <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-1"></i>Cancel
                                </a>
                                <button type="submit" class="btn btn-primary px-5">
                                    <i class="fas fa-save me-2"></i>Create Blog
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'align': [] }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['blockquote', 'code-block'],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            },
            placeholder: 'Write your blog content here...'
        });

        // Sync Quill content to hidden textarea on form submit
        document.querySelector('form').onsubmit = function() {
            var content = document.querySelector('#content');
            content.value = quill.root.innerHTML;
        };
    </script>
</body>
</html>
