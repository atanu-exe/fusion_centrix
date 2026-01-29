@extends('admin.layouts.app')

@section('title', 'Page Analytics')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Page Analytics</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.analytics.overview') }}">Analytics</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Pages</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.analytics.overview') }}" class="btn btn-outline-secondary">
            <i class="fas fa-chart-line me-1"></i>Overview
        </a>
        <a href="{{ route('admin.analytics.realtime') }}" class="btn btn-outline-success">
            <i class="fas fa-broadcast-tower me-1"></i>Real-time
        </a>
        <select class="form-select" id="dateRange" onchange="changePeriod(this.value)">
            <option value="7" {{ $period == 7 ? 'selected' : '' }}>Last 7 days</option>
            <option value="30" {{ $period == 30 ? 'selected' : '' }}>Last 30 days</option>
            <option value="90" {{ $period == 90 ? 'selected' : '' }}>Last 90 days</option>
            <option value="365" {{ $period == 365 ? 'selected' : '' }}>Last year</option>
        </select>
    </div>
</div>

<!-- Page Analytics Table -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0"><i class="fas fa-file-alt me-2"></i>All Pages</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Page URL</th>
                        <th class="text-center">Views</th>
                        <th class="text-center">Unique Visitors</th>
                        <th class="text-center">Avg. Time</th>
                        <th class="text-center">Bounce Rate</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages as $page)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-file-alt text-muted me-2"></i>
                                <div>
                                    <a href="{{ $page->url }}" target="_blank" class="text-decoration-none fw-medium">
                                        {{ Str::limit($page->url, 60) }}
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-primary">{{ number_format($page->views) }}</span>
                        </td>
                        <td class="text-center">
                            <span class="text-muted">{{ number_format($page->unique_visitors) }}</span>
                        </td>
                        <td class="text-center">
                            @php
                                $avgTime = $page->avg_time ?? 0;
                                $minutes = floor($avgTime / 60);
                                $seconds = $avgTime % 60;
                            @endphp
                            <span class="text-muted">
                                @if($minutes > 0)
                                    {{ $minutes }}m {{ $seconds }}s
                                @else
                                    {{ $seconds }}s
                                @endif
                            </span>
                        </td>
                        <td class="text-center">
                            @php
                                $bounceRate = $page->views > 0 ? round(($page->bounces / $page->views) * 100, 1) : 0;
                            @endphp
                            <span class="badge {{ $bounceRate > 70 ? 'bg-danger' : ($bounceRate > 50 ? 'bg-warning text-dark' : 'bg-success') }}">
                                {{ $bounceRate }}%
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="text-muted">
                                <i class="fas fa-chart-line fa-3x mb-3"></i>
                                <h5>No Page Data</h5>
                                <p class="mb-0">No page analytics data available for this period.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($pages->hasPages())
    <div class="card-footer">
        {{ $pages->appends(['period' => $period])->links() }}
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
function changePeriod(period) {
    window.location.href = '{{ route('admin.analytics.pages') }}?period=' + period;
}
</script>
@endpush
