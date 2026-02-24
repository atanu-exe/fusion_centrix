@extends('admin.layouts.app')

@section('title', 'Create Campaign')

@section('content')
<div class="page-header mb-4">
    <h1 class="page-title">Create Email Campaign</h1>
    <div class="page-breadcrumb">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
        <a href="{{ route('admin.email.campaigns.index') }}">Campaigns</a>
        <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
        <span>Create</span>
    </div>
</div>

<form action="{{ route('admin.email.campaigns.store') }}" method="POST">
    @csrf
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-envelope me-2"></i>Campaign Details</h5>
                </div>
                <div class="card-body">
                    <!-- Choose Template First - At the Top -->
                    <div class="mb-4 p-3 rounded" style="background-color: #f8f9fa; border-left: 4px solid #5f63f1;">
                        <label class="form-label mb-2" style="font-weight: 600;"><i class="fas fa-file-alt me-2"></i>Start With Template</label>
                        <select name="template_id" class="form-select" id="templateSelect" style="border-color: #5f63f1;">
                            <option value="">✏️ Start from scratch</option>
                            @foreach($templates as $template)
                                <option value="{{ $template->id }}" data-template-body="{!! htmlspecialchars($template->body) !!}" data-template-subject="{{ $template->subject }}" {{ old('template_id') == $template->id ? 'selected' : '' }}>
                                    📋 {{ $template->name }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted d-block mt-2">Choose a template to auto-fill the email content, or start from scratch</small>
                    </div>

                    <hr class="my-4">
                    
                    <div class="mb-3">
                        <label class="form-label">Campaign Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name') }}" required placeholder="e.g., Summer Sale Announcement">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Email Subject - Required when scratch, overwrites when template selected -->
                    <div class="mb-3">
                        <label class="form-label">Email Subject <span class="text-danger" id="subjectRequiredMark">*</span></label>
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" 
                               value="{{ old('subject') }}" id="emailSubject" required placeholder="e.g., 🎉 Exclusive Offer Just For You!">
                        @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">You can use variables: {name}, {email}, {company}</small>
                    </div>
                    <div class="mb-3" id="emailContentContainer">
                        <label class="form-label">Email Content <span class="text-danger">*</span></label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" 
                                  rows="15" id="emailContent" required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">HTML supported. Variables: {name}, {email}, {company}, {unsubscribe_link}</small>
                    </div>
                    <div class="mb-3" id="templatePreviewContainer" style="display:none;">
                        <label class="form-label">Template Preview</label>
                        <div class="border rounded p-3 bg-light" id="templatePreviewHtml"></div>
                    </div>
                    @push('scripts')
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var templateSelect = document.getElementById('templateSelect');
                        var emailContent = document.getElementById('emailContent');
                        var emailContentContainer = document.getElementById('emailContentContainer');
                        var templatePreviewContainer = document.getElementById('templatePreviewContainer');
                        var templatePreviewHtml = document.getElementById('templatePreviewHtml');
                        var emailSubject = document.getElementById('emailSubject');
                        var subjectRequiredMark = document.getElementById('subjectRequiredMark');
                        
                        function updateContentView() {
                            var selected = templateSelect.options[templateSelect.selectedIndex];
                            var body = selected.getAttribute('data-template-body');
                            var subject = selected.getAttribute('data-template-subject');
                            
                            if (!selected.value) {
                                // Start from scratch
                                emailContentContainer.style.display = '';
                                templatePreviewContainer.style.display = 'none';
                                emailContent.value = '';
                                emailContent.required = true;
                                emailSubject.value = '';
                                emailSubject.required = true;
                                emailSubject.setAttribute('required', 'required');
                                subjectRequiredMark.style.display = '';
                                templateSelect.style.borderColor = '#ccc';
                            } else {
                                // Template selected - overwrite subject and show preview
                                emailContentContainer.style.display = 'none';
                                templatePreviewContainer.style.display = '';
                                templatePreviewHtml.innerHTML = body;
                                emailContent.value = body || '';
                                emailContent.required = false;
                                emailSubject.value = subject || '';
                                emailSubject.required = false;
                                emailSubject.removeAttribute('required');
                                subjectRequiredMark.style.display = 'none';
                                templateSelect.style.borderColor = '#5f63f1';
                            }
                        }
                        
                        templateSelect.addEventListener('change', updateContentView);
                        updateContentView(); // Initial state
                    });
                    </script>
                    @endpush
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-users me-2"></i>Recipients</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Send To <span class="text-danger">*</span></label>
                        <select name="recipient_type" class="form-select" id="recipientType" required>
                            <option value="all_leads">All Leads ({{ $leadCount }})</option>
                            <option value="by_status">Leads by Status</option>
                            <option value="by_source">Leads by Source</option>
                            <option value="selected">Selected Leads</option>
                        </select>
                    </div>
                    
                    <div class="mb-3" id="statusSelect" style="display: none;">
                        <label class="form-label">Select Status</label>
                        <select name="status_ids[]" class="form-select" multiple>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }} ({{ $status->leads_count ?? 0 }})</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3" id="sourceSelect" style="display: none;">
                        <label class="form-label">Select Source</label>
                        <select name="source_ids[]" class="form-select" multiple>
                            @foreach($sources as $source)
                                <option value="{{ $source->id }}">{{ $source->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3" id="leadSelect" style="display: none;">
                        <label class="form-label">Select Leads</label>
                        <select name="lead_ids[]" class="form-select" multiple size="10">
                            @foreach($leads as $lead)
                                <option value="{{ $lead->id }}">{{ $lead->name }} ({{ $lead->email }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-cog me-2"></i>Settings</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">From Name</label>
                        <input type="text" name="from_name" class="form-control" 
                               value="{{ old('from_name', config('mail.from.name')) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Reply To</label>
                        <input type="email" name="reply_to" class="form-control" 
                               value="{{ old('reply_to', config('mail.from.address')) }}">
                    </div>
                </div>
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" name="action" value="draft" class="btn btn-secondary">
                    <i class="fas fa-save me-1"></i>Save as Draft
                </button>
                <button type="submit" name="action" value="send" class="btn btn-success" onclick="return confirm('Send this campaign immediately?')">
                    <i class="fas fa-paper-plane me-1"></i>Send Now
                </button>
                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#scheduleModal">
                    <i class="fas fa-clock me-1"></i>Schedule
                </button>
                <a href="{{ route('admin.email.campaigns.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </div>
    </div>
    
    <!-- Schedule Modal -->
    <div class="modal fade" id="scheduleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Schedule Campaign</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Schedule Date & Time</label>
                        <input type="datetime-local" name="scheduled_at" class="form-control" 
                               min="{{ now()->format('Y-m-d\TH:i') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="action" value="schedule" class="btn btn-info">Schedule Campaign</button>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
// Recipient type toggle
document.getElementById('recipientType').addEventListener('change', function() {
    document.getElementById('statusSelect').style.display = this.value === 'by_status' ? '' : 'none';
    document.getElementById('sourceSelect').style.display = this.value === 'by_source' ? '' : 'none';
    document.getElementById('leadSelect').style.display = this.value === 'selected' ? '' : 'none';
});

// Template selection
document.getElementById('templateSelect').addEventListener('change', function() {
    if (this.value) {
        // Fetch template content via AJAX (simplified for now)
        fetch('/admin/email/templates/' + this.value + '/content')
            .then(r => r.json())
            .then(data => {
                document.getElementById('emailContent').value = data.content;
            })
            .catch(() => {});
    }
});
</script>
@endpush
@endsection
