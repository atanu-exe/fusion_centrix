@extends('admin.layouts.app')

@section('title', 'Edit Email Template')

@section('content')
<div class="page-header mb-4">
    <h1 class="page-title">Edit Email Template</h1>
    <div class="page-breadcrumb">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
        <a href="{{ route('admin.email.templates.index') }}">Templates</a>
        <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
        <span>Edit</span>
    </div>
</div>

<form action="{{ route('admin.email.templates.update', $template) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-file-alt me-2"></i>Template Content</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Template Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $template->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $template->description) }}">
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subject <span class="text-danger">*</span></label>
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject', $template->subject) }}" required>
                        @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Body <span class="text-danger">*</span></label>
                        <textarea name="body" class="form-control @error('body') is-invalid @enderror" rows="20" required>{{ old('body', $template->body) }}</textarea>
                        @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-cog me-2"></i>Settings</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="marketing" @if(old('category', $template->category)==='marketing') selected @endif>Marketing</option>
                            <option value="transactional" @if(old('category', $template->category)==='transactional') selected @endif>Transactional</option>
                            <option value="notification" @if(old('category', $template->category)==='notification') selected @endif>Notification</option>
                        </select>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_active" class="form-check-input" id="isActive" value="1" @if(old('is_active', $template->is_active)) checked @endif>
                        <label class="form-check-label" for="isActive">Active</label>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-code me-2"></i>Available Variables</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted small mb-2">Click to copy:</p>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($template->variables ?? [] as $var)
                            <code class="bg-light p-1 rounded cursor-pointer" onclick="copyVariable('{{ '{' . $var . '}' }}')">{{ '{' . $var . '}' }}</code>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>Update Template
                </button>
                <a href="{{ route('admin.email.templates.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
function copyVariable(text) {
    navigator.clipboard.writeText(text);
    alert('Copied: ' + text);
}
</script>
@endpush
