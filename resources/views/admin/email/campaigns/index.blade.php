@extends('admin.layouts.app')

@section('title', 'Email Campaigns')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Email Campaigns</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Email Campaigns</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.email.templates.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-file-alt me-1"></i>Templates
        </a>
        <a href="{{ route('admin.email.campaigns.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>New Campaign
        </a>
    </div>
</div>

<!-- Stats -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            <div class="card-body text-center py-3">
                <h3 class="mb-1 text-primary">{{ $stats['total'] ?? 0 }}</h3>
                <small class="text-muted">Total Campaigns</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            <div class="card-body text-center py-3">
                <h3 class="mb-1 text-success">{{ $stats['sent'] ?? 0 }}</h3>
                <small class="text-muted">Emails Sent</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            <div class="card-body text-center py-3">
                <h3 class="mb-1 text-info">{{ number_format($stats['open_rate'] ?? 0, 1) }}%</h3>
                <small class="text-muted">Avg. Open Rate</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            <div class="card-body text-center py-3">
                <h3 class="mb-1 text-warning">{{ number_format($stats['click_rate'] ?? 0, 1) }}%</h3>
                <small class="text-muted">Avg. Click Rate</small>
            </div>
        </div>
    </div>
</div>

<!-- Campaigns List -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0"><i class="fas fa-paper-plane me-2"></i>All Campaigns</h5>
        <div class="d-flex gap-2">
            <select class="form-select form-select-sm" onchange="filterStatus(this.value)" style="width: auto;">
                <option value="">All Status</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="scheduled" {{ request('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                <option value="sending" {{ request('status') == 'sending' ? 'selected' : '' }}>Sending</option>
                <option value="sent" {{ request('status') == 'sent' ? 'selected' : '' }}>Sent</option>
            </select>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Campaign</th>
                        <th>Recipients</th>
                        <th>Sent</th>
                        <th>Opens</th>
                        <th>Clicks</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($campaigns as $campaign)
                    <tr>
                        <td>
                            <a href="{{ route('admin.email.campaigns.show', $campaign) }}" class="text-decoration-none">
                                <strong>{{ $campaign->name }}</strong>
                            </a>
                            <small class="text-muted d-block">{{ $campaign->subject }}</small>
                        </td>
                        <td>{{ number_format($campaign->total_recipients) }}</td>
                        <td>{{ number_format($campaign->sent_count) }}</td>
                        <td>
                            <span class="text-success">{{ number_format($campaign->open_rate, 1) }}%</span>
                            <small class="text-muted">({{ $campaign->opened_count }})</small>
                        </td>
                        <td>
                            <span class="text-primary">{{ number_format($campaign->click_rate, 1) }}%</span>
                            <small class="text-muted">({{ $campaign->clicked_count }})</small>
                        </td>
                        <td>
                            @if($campaign->status === 'draft')
                                <span class="badge bg-secondary">Draft</span>
                            @elseif($campaign->status === 'scheduled')
                                <span class="badge bg-info">Scheduled</span>
                                <small class="d-block text-muted">{{ $campaign->scheduled_at?->format('M d, h:i A') }}</small>
                            @elseif($campaign->status === 'sending')
                                <span class="badge bg-warning text-dark">Sending</span>
                            @elseif($campaign->status === 'sent')
                                <span class="badge bg-success">Sent</span>
                            @else
                                <span class="badge bg-danger">{{ ucfirst($campaign->status) }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.email.campaigns.show', $campaign) }}" class="btn btn-sm btn-outline-primary" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if($campaign->status === 'draft')
                                <a href="{{ route('admin.email.campaigns.edit', $campaign) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.email.campaigns.send', $campaign) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-success" title="Send Now" onclick="return confirm('Send this campaign now?')">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </form>
                                @endif
                                @if(in_array($campaign->status, ['draft', 'scheduled']))
                                <form action="{{ route('admin.email.campaigns.destroy', $campaign) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Delete this campaign?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            No campaigns yet. <a href="{{ route('admin.email.campaigns.create') }}">Create your first campaign</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($campaigns->hasPages())
    <div class="card-footer">
        {{ $campaigns->links() }}
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
function filterStatus(status) {
    const url = new URL(window.location.href);
    if (status) {
        url.searchParams.set('status', status);
    } else {
        url.searchParams.delete('status');
    }
    window.location.href = url.toString();
}
</script>
@endpush
