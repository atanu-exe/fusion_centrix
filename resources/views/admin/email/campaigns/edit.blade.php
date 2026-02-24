@extends('admin.layouts.app')

@section('title', 'Edit Email Campaign')

@section('content')
<div class="page-header mb-4">
    <h1 class="page-title">Edit Campaign: {{ $campaign->name }}</h1>
    <div class="page-breadcrumb">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
        <a href="{{ route('admin.email.campaigns.index') }}">Campaigns</a>
        <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
        <span>Edit</span>
    </div>
</div>

<form action="{{ route('admin.email.campaigns.update', $campaign) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-file-alt me-2"></i>Campaign Content</h5>
                </div>
                <div class="card-body">
                    <!-- Choose Template First - At the Top -->
                    <div class="mb-4 p-3 rounded" style="background-color: #f8f9fa; border-left: 4px solid #5f63f1;" @if($campaign->status==='sent') onclick="return false;" @endif>
                        <label class="form-label mb-2" style="font-weight: 600;"><i class="fas fa-file-alt me-2"></i>Template</label>
                        <select name="template_id" class="form-select" id="templateSelect" style="border-color: #5f63f1;" @if($campaign->status==='sent') disabled @endif>
                            <option value="">✏️ Start from scratch</option>
                            @foreach($templates as $template)
                                <option value="{{ $template->id }}" data-template-body="{!! htmlspecialchars($template->body) !!}" data-template-subject="{{ htmlspecialchars($template->subject) }}" @if(old('template_id', $campaign->template_id)==$template->id) selected @endif>
                                    📋 {{ $template->name }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted d-block mt-2">Selecting a template will update the email content. You can edit it further.</small>
                    </div>

                    <hr class="my-4">
                    
                    <div class="mb-3">
                        <label class="form-label">Campaign Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $campaign->name) }}" required @if($campaign->status==='sent') disabled @endif>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Subject <span class="text-danger" id="subjectRequiredMark">*</span></label>
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject', $campaign->subject) }}" id="emailSubject" required @if($campaign->status==='sent') disabled @endif>
                        @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3" id="emailContentContainer">
                        <label class="form-label">Email Content <span class="text-danger">*</span></label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="20" id="emailContent" required @if($campaign->status==='sent') disabled @endif>{{ old('content', $campaign->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">HTML supported. Variables: {name}, {email}, {company}, {unsubscribe_link}</small>
                    </div>
                    <div class="mb-3" id="templatePreviewContainer" style="display:none;">
                        <label class="form-label">Template Preview</label>
                        <div class="border rounded p-3 bg-light" id="templatePreviewHtml"></div>
                    </div>
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
                        <select name="recipient_type" class="form-select" id="recipientType" required @if($campaign->status==='sent') disabled @endif>
                            <option value="all_leads" @if(old('recipient_type', $campaign->recipient_type)==='all_leads') selected @endif>All Leads ({{ $leadCount }})</option>
                            <option value="by_status" @if(old('recipient_type', $campaign->recipient_type)==='by_status') selected @endif>Leads by Status</option>
                            <option value="by_source" @if(old('recipient_type', $campaign->recipient_type)==='by_source') selected @endif>Leads by Source</option>
                            <option value="selected" @if(old('recipient_type', $campaign->recipient_type)==='selected') selected @endif>Selected Leads</option>
                        </select>
                    </div>
                    
                    <div class="mb-3" id="statusSelect" style="display: none;">
                        <label class="form-label">Select Status</label>
                        <select name="status_ids[]" class="form-select" multiple @if($campaign->status==='sent') disabled @endif>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}" @if(in_array($status->id, old('status_ids', $campaign->recipient_filter['status_ids'] ?? []))) selected @endif>{{ $status->name }} ({{ $status->leads_count ?? 0 }})</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3" id="sourceSelect" style="display: none;">
                        <label class="form-label">Select Source</label>
                        <select name="source_ids[]" class="form-select" multiple @if($campaign->status==='sent') disabled @endif>
                            @foreach($sources as $source)
                                <option value="{{ $source->id }}" @if(in_array($source->id, old('source_ids', $campaign->recipient_filter['source_ids'] ?? []))) selected @endif>{{ $source->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3" id="leadSelect" style="display: none;">
                        <label class="form-label">Select Leads</label>
                        <select name="lead_ids[]" class="form-select" multiple size="10" @if($campaign->status==='sent') disabled @endif>
                            @foreach($leads as $lead)
                                <option value="{{ $lead->id }}" @if(in_array($lead->id, old('lead_ids', $campaign->recipient_filter['lead_ids'] ?? []))) selected @endif>{{ $lead->name }} ({{ $lead->email }})</option>
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
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" @if($campaign->status==='sent') disabled @endif>
                            <option value="draft" @if(old('status', $campaign->status)==='draft') selected @endif>Draft</option>
                            <option value="sent" @if(old('status', $campaign->status)==='sent') selected @endif>Sent</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" @if($campaign->status==='sent') disabled @endif>
                    <i class="fas fa-save me-1"></i>Update Campaign
                </button>
                <a href="{{ route('admin.email.campaigns.show', $campaign) }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </div>
    </div>
</form>
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
            emailSubject.required = true;
            subjectRequiredMark.style.display = '';
            templateSelect.style.borderColor = '#ccc';
        } else {
            // Template selected
            emailContentContainer.style.display = 'none';
            templatePreviewContainer.style.display = '';
            templatePreviewHtml.innerHTML = body;
            emailContent.value = body || '';
            emailSubject.value = subject || '';
            emailSubject.required = false;
            subjectRequiredMark.style.display = 'none';
            templateSelect.style.borderColor = '#5f63f1';
        }
    }
    
    templateSelect.addEventListener('change', updateContentView);
    updateContentView(); // Initial state
    
    // Handle recipient type toggling
    var recipientType = document.getElementById('recipientType');
    if (recipientType) {
        function updateRecipientView() {
            var selected = recipientType.value;
            document.getElementById('statusSelect').style.display = selected === 'by_status' ? '' : 'none';
            document.getElementById('sourceSelect').style.display = selected === 'by_source' ? '' : 'none';
            document.getElementById('leadSelect').style.display = selected === 'selected' ? '' : 'none';
        }
        recipientType.addEventListener('change', updateRecipientView);
        updateRecipientView(); // Initial state
    }
});
</script>
@endpush
@endsection
