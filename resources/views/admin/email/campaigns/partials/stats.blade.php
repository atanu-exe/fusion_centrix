<!-- Campaign Tracking Stats Widget -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title mb-0"><i class="fas fa-chart-line me-2"></i>Campaign Performance</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="text-center">
                    <h6 class="text-muted mb-1">Total Sent</h6>
                    <h4 class="mb-0">{{ $campaign->sent_count }}</h4>
                    <small class="text-muted">of {{ $campaign->total_recipients }}</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <h6 class="text-muted mb-1">Opened</h6>
                    <h4 class="mb-0"><span class="text-success">{{ $campaign->opened_count }}</span></h4>
                    <small class="text-success">{{ $campaign->sent_count > 0 ? round(($campaign->opened_count / $campaign->sent_count) * 100, 1) : '0' }}%</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <h6 class="text-muted mb-1">Clicked</h6>
                    <h4 class="mb-0"><span class="text-info">{{ $campaign->clicked_count }}</span></h4>
                    <small class="text-info">{{ $campaign->sent_count > 0 ? round(($campaign->clicked_count / $campaign->sent_count) * 100, 1) : '0' }}%</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <h6 class="text-muted mb-1">Bounced</h6>
                    <h4 class="mb-0"><span class="text-danger">{{ $campaign->bounced_count }}</span></h4>
                    <small class="text-danger">{{ $campaign->sent_count > 0 ? round(($campaign->bounced_count / $campaign->sent_count) * 100, 1) : '0' }}%</small>
                </div>
            </div>
        </div>

        <!-- Progress bars -->
        <div class="mt-4">
            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <small class="text-muted">Open Rate</small>
                    <small class="fw-bold">{{ $campaign->sent_count > 0 ? round(($campaign->opened_count / $campaign->sent_count) * 100, 1) : '0' }}%</small>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: {{ $campaign->sent_count > 0 ? ($campaign->opened_count / $campaign->sent_count) * 100 : 0 }}%"></div>
                </div>
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <small class="text-muted">Click Rate</small>
                    <small class="fw-bold">{{ $campaign->sent_count > 0 ? round(($campaign->clicked_count / $campaign->sent_count) * 100, 1) : '0' }}%</small>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-info" style="width: {{ $campaign->sent_count > 0 ? ($campaign->clicked_count / $campaign->sent_count) * 100 : 0 }}%"></div>
                </div>
            </div>
            <div class="mb-0">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <small class="text-muted">Bounce Rate</small>
                    <small class="fw-bold">{{ $campaign->sent_count > 0 ? round(($campaign->bounced_count / $campaign->sent_count) * 100, 1) : '0' }}%</small>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-danger" style="width: {{ $campaign->sent_count > 0 ? ($campaign->bounced_count / $campaign->sent_count) * 100 : 0 }}%"></div>
                </div>
            </div>
        </div>
    </div>
</div>
