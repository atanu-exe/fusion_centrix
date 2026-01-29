@extends('admin.layouts.app')

@section('title', 'Real-time Analytics')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">
            <span class="pulse-dot bg-success me-2"></span>
            Real-time Analytics
        </h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.analytics.overview') }}">Analytics</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Real-time</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.analytics.overview') }}" class="btn btn-outline-secondary">
            <i class="fas fa-chart-line me-1"></i>Overview
        </a>
        <button class="btn btn-success" onclick="location.reload()">
            <i class="fas fa-sync-alt me-1"></i>Refresh
        </button>
    </div>
</div>

<style>
    .pulse-dot {
        display: inline-block;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(25, 135, 84, 0.7); }
        70% { box-shadow: 0 0 0 10px rgba(25, 135, 84, 0); }
        100% { box-shadow: 0 0 0 0 rgba(25, 135, 84, 0); }
    }
    .visitor-row {
        transition: background-color 0.3s ease;
    }
    .visitor-row:hover {
        background-color: rgba(var(--bs-primary-rgb), 0.05);
    }
</style>

<!-- Active Visitors Count -->
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card bg-success text-white h-100">
            <div class="card-body text-center py-4">
                <div class="display-1 fw-bold mb-2">{{ $activeCount }}</div>
                <h5 class="mb-0">
                    <i class="fas fa-users me-2"></i>
                    Active Visitors
                </h5>
                <small class="opacity-75">Last 5 minutes</small>
            </div>
        </div>
    </div>
    <div class="col-md-8 mb-3">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-chart-bar me-2"></i>Active Pages</h5>
            </div>
            <div class="card-body">
                @forelse($currentPages as $page)
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="text-truncate me-3" style="max-width: 70%;">
                        <i class="fas fa-file-alt text-muted me-2"></i>
                        <a href="{{ $page->url }}" target="_blank" class="text-decoration-none">
                            {{ Str::limit($page->url, 50) }}
                        </a>
                    </div>
                    <span class="badge bg-primary">{{ $page->visitors }} {{ Str::plural('visitor', $page->visitors) }}</span>
                </div>
                @if(!$loop->last)
                <hr class="my-2">
                @endif
                @empty
                <div class="text-center text-muted py-3">
                    <i class="fas fa-chart-line fa-2x mb-2"></i>
                    <p class="mb-0">No active pages at the moment</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Active Visitors List -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">
            <i class="fas fa-broadcast-tower me-2"></i>
            Active Visitors
        </h5>
        <small class="text-muted">Auto-refreshes every 30 seconds</small>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Visitor</th>
                        <th>Location</th>
                        <th>Current Page</th>
                        <th>Device</th>
                        <th>Browser</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activeVisitors as $visitor)
                    <tr class="visitor-row">
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 10px; height: 10px;"></div>
                                <code class="small">{{ Str::limit($visitor->visitor_id, 12) }}</code>
                            </div>
                        </td>
                        <td>
                            @if($visitor->country)
                                <img src="https://flagcdn.com/16x12/{{ strtolower($visitor->country_code ?? 'in') }}.png" 
                                     alt="{{ $visitor->country }}" 
                                     class="me-1"
                                     onerror="this.style.display='none'">
                                {{ $visitor->city ?? 'Unknown' }}, {{ $visitor->country }}
                            @else
                                <span class="text-muted">Unknown</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ $visitor->url }}" target="_blank" class="text-decoration-none">
                                {{ Str::limit($visitor->url, 40) }}
                            </a>
                        </td>
                        <td>
                            @php
                                $deviceIcon = match($visitor->device_type) {
                                    'mobile' => 'fa-mobile-alt',
                                    'tablet' => 'fa-tablet-alt',
                                    default => 'fa-desktop'
                                };
                            @endphp
                            <i class="fas {{ $deviceIcon }} me-1"></i>
                            {{ ucfirst($visitor->device_type ?? 'Desktop') }}
                        </td>
                        <td>
                            @php
                                $browserIcon = match(strtolower($visitor->browser ?? '')) {
                                    'chrome' => 'fa-chrome',
                                    'firefox' => 'fa-firefox',
                                    'safari' => 'fa-safari',
                                    'edge' => 'fa-edge',
                                    'opera' => 'fa-opera',
                                    default => 'fa-globe'
                                };
                            @endphp
                            <i class="fab {{ $browserIcon }} me-1"></i>
                            {{ $visitor->browser ?? 'Unknown' }}
                        </td>
                        <td>
                            <span class="text-muted" title="{{ $visitor->created_at }}">
                                {{ $visitor->created_at->diffForHumans() }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="text-muted">
                                <i class="fas fa-users-slash fa-3x mb-3"></i>
                                <h5>No Active Visitors</h5>
                                <p class="mb-0">There are no visitors on your site in the last 5 minutes.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- World Map placeholder -->
<div class="card mt-4">
    <div class="card-header">
        <h5 class="card-title mb-0"><i class="fas fa-globe me-2"></i>Visitor Locations</h5>
    </div>
    <div class="card-body">
        <div class="row">
            @php
                $countries = $activeVisitors->groupBy('country')->map->count()->sortDesc()->take(5);
            @endphp
            @forelse($countries as $country => $count)
            <div class="col-md-4 col-lg-2 mb-3">
                <div class="card bg-light h-100">
                    <div class="card-body text-center py-3">
                        <h3 class="mb-1">{{ $count }}</h3>
                        <small class="text-muted">{{ $country ?: 'Unknown' }}</small>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-4">
                <p class="text-muted mb-0">No location data available</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-refresh every 30 seconds
    setTimeout(function() {
        location.reload();
    }, 30000);
</script>
@endpush
