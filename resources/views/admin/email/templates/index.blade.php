@extends('admin.layouts.app')

@section('title', 'Email Templates')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Email Templates</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Email Templates</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.email.campaigns.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-paper-plane me-1"></i>Campaigns
        </a>
        <a href="{{ route('admin.email.templates.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>New Template
        </a>
    </div>
</div>

<div class="row">
    @forelse($templates as $template)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="card-title mb-0">{{ $template->name }}</h6>
                <span class="badge bg-{{ $template->type === 'marketing' ? 'primary' : ($template->type === 'transactional' ? 'info' : 'secondary') }}">
                    {{ ucfirst($template->type) }}
                </span>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-3">{{ Str::limit($template->subject, 100) }}</p>
                
                <div class="bg-light rounded p-2 mb-3" style="height: 120px; overflow: hidden;">
                    <small class="text-muted">
                        {!! Str::limit(strip_tags($template->body), 200) !!}
                    </small>
                </div>
                
                <small class="text-muted">
                    <i class="fas fa-clock me-1"></i>Updated {{ $template->updated_at->diffForHumans() }}
                </small>
            </div>
            <div class="card-footer bg-transparent d-flex gap-2">
                <a href="{{ route('admin.email.templates.edit', $template) }}" class="btn btn-sm btn-outline-primary flex-fill">
                    <i class="fas fa-edit me-1"></i>Edit
                </a>
                <button type="button" class="btn btn-sm btn-outline-info preview-btn" data-template-name="{{ $template->name }}" data-template-body="{!! htmlspecialchars($template->body) !!}">
                    <i class="fas fa-eye"></i>
                </button>
                <form action="{{ route('admin.email.templates.destroy', $template) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this template?')">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
        
    <!-- Single Preview Modal -->
    @if($loop->first)
    <div class="modal fade" id="previewModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <iframe id="previewModalIframe" class="w-100 border rounded" style="height: 500px;"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endif
    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var modalEl = document.getElementById('previewModal');
        var modal = new bootstrap.Modal(modalEl);
        var iframe = document.getElementById('previewModalIframe');
        var title = document.getElementById('previewModalTitle');
        document.querySelectorAll('.preview-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                title.textContent = btn.getAttribute('data-template-name');
                var doc = iframe.contentWindow.document;
                doc.open();
                doc.write(btn.getAttribute('data-template-body'));
                doc.close();
                modal.show();
            });
        });
        modalEl.addEventListener('hidden.bs.modal', function() {
            // Clear iframe content to avoid overlay/black effect
            iframe.src = 'about:blank';
            // Remove lingering Bootstrap modal backdrops
            document.querySelectorAll('.modal-backdrop').forEach(function(el) {
                el.parentNode.removeChild(el);
            });
        });
    });
    </script>
    @endpush
    </div>
    @empty
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="fas fa-file-alt text-muted mb-3" style="font-size: 3rem;"></i>
                <h5>No templates yet</h5>
                <p class="text-muted">Create your first email template to speed up campaign creation.</p>
                <a href="{{ route('admin.email.templates.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>Create Template
                </a>
            </div>
        </div>
    </div>
    @endforelse
</div>

@if($templates->hasPages())
<div class="d-flex justify-content-center">
    {{ $templates->links() }}
</div>
@endif
@endsection
