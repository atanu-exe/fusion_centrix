@extends('admin.layouts.app')

@section('title', 'Create Email Template')

@section('content')
<div class="page-header mb-4">
    <h1 class="page-title">Create Email Template</h1>
    <div class="page-breadcrumb">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
        <a href="{{ route('admin.email.templates.index') }}">Templates</a>
        <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
        <span>Create</span>
    </div>
</div>

<form action="{{ route('admin.email.templates.store') }}" method="POST">
    @csrf
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-file-alt me-2"></i>Template Content</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Template Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name') }}" required placeholder="e.g., Welcome Email">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" 
                               value="{{ old('description') }}" placeholder="Brief description of this template">
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Default Subject</label>
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" 
                               value="{{ old('subject') }}" placeholder="Default email subject line">
                        @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Email Content <span class="text-danger">*</span></label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" 
                                  rows="20" required>{{ old('content', $defaultContent ?? '') }}</textarea>
                        @error('content')
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
                        <label class="form-label">Template Type</label>
                        <select name="type" class="form-select">
                            <option value="marketing">Marketing</option>
                            <option value="transactional">Transactional</option>
                            <option value="notification">Notification</option>
                        </select>
                    </div>
                    
                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_active" class="form-check-input" id="isActive" checked>
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
                        <code class="bg-light p-1 rounded cursor-pointer" onclick="copyVariable('{name}')">{name}</code>
                        <code class="bg-light p-1 rounded cursor-pointer" onclick="copyVariable('{email}')">{email}</code>
                        <code class="bg-light p-1 rounded cursor-pointer" onclick="copyVariable('{company}')">{company}</code>
                        <code class="bg-light p-1 rounded cursor-pointer" onclick="copyVariable('{phone}')">{phone}</code>
                        <code class="bg-light p-1 rounded cursor-pointer" onclick="copyVariable('{unsubscribe_link}')">{unsubscribe_link}</code>
                    </div>
                </div>
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>Save Template
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
    // Show toast or feedback
    alert('Copied: ' + text);
}
</script>
@endpush

@php
$defaultContent = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff;">
        <tr>
            <td style="padding: 40px 30px;">
                <h1 style="color: #333333; margin-bottom: 20px;">Hello {name}!</h1>
                
                <p style="color: #666666; line-height: 1.6; margin-bottom: 20px;">
                    Your email content goes here. You can use HTML to format your message.
                </p>
                
                <p style="color: #666666; line-height: 1.6; margin-bottom: 30px;">
                    Best regards,<br>
                    Your Company Name
                </p>
                
                <hr style="border: none; border-top: 1px solid #eeeeee; margin: 30px 0;">
                
                <p style="color: #999999; font-size: 12px; text-align: center;">
                    <a href="{unsubscribe_link}" style="color: #999999;">Unsubscribe</a>
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
HTML;
@endphp
