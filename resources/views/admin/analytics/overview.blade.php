@extends('admin.layouts.app')

@section('title', 'Analytics')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Analytics Overview</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Analytics</span>
        </div>
    </div>
    <div class="d-flex gap-2">
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

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-circle bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="fas fa-eye fa-lg"></i>
                    </div>
                    @if($stats['views_growth'] >= 0)
                        <span class="badge bg-success">+{{ $stats['views_growth'] }}%</span>
                    @else
                        <span class="badge bg-danger">{{ $stats['views_growth'] }}%</span>
                    @endif
                </div>
                <h3 class="mb-1">{{ number_format($stats['total_views']) }}</h3>
                <p class="text-muted mb-0">Page Views</p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-circle bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                    @if($stats['visitors_growth'] >= 0)
                        <span class="badge bg-success">+{{ $stats['visitors_growth'] }}%</span>
                    @else
                        <span class="badge bg-danger">{{ $stats['visitors_growth'] }}%</span>
                    @endif
                </div>
                <h3 class="mb-1">{{ number_format($stats['unique_visitors']) }}</h3>
                <p class="text-muted mb-0">Unique Visitors</p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-circle bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="fas fa-clock fa-lg"></i>
                    </div>
                </div>
                <h3 class="mb-1">{{ $stats['avg_time'] }}</h3>
                <p class="text-muted mb-0">Avg. Time on Site</p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-circle bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="fas fa-chart-line fa-lg"></i>
                    </div>
                </div>
                <h3 class="mb-1">{{ $stats['bounce_rate'] }}%</h3>
                <p class="text-muted mb-0">Bounce Rate</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Traffic Chart -->
    <div class="col-lg-8 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"><i class="fas fa-chart-area me-2"></i>Traffic Overview</h5>
            </div>
            <div class="card-body">
                <canvas id="trafficChart" height="300"></canvas>
            </div>
        </div>
    </div>
    
    <!-- Traffic Sources -->
    <div class="col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-pie-chart me-2"></i>Traffic Sources</h5>
            </div>
            <div class="card-body">
                <div style="height: 250px; position: relative;">
                    <canvas id="sourcesChart"></canvas>
                </div>
                <div class="mt-3">
                    @foreach($trafficSources as $source)
                    <div class="d-flex align-items-center mb-2">
                        <div class="rounded-circle me-2" style="width: 12px; height: 12px; background-color: {{ $source['color'] }};"></div>
                        <span class="me-auto">{{ $source['name'] }}</span>
                        <span class="fw-bold">{{ $source['value'] }}%</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Top Pages -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"><i class="fas fa-file-alt me-2"></i>Top Pages</h5>
                <a href="{{ route('admin.analytics.pages') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Page</th>
                                <th class="text-end">Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($topPages as $page)
                            <tr>
                                <td>
                                    <span class="text-truncate d-inline-block" style="max-width: 300px;" title="{{ $page->url }}">
                                        {{ parse_url($page->url, PHP_URL_PATH) ?: '/' }}
                                    </span>
                                </td>
                                <td class="text-end">{{ number_format($page->visits) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted py-4">No data available yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Top Locations -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"><i class="fas fa-globe me-2"></i>Top Locations</h5>
                <a href="{{ route('admin.analytics.locations') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Country</th>
                                <th class="text-end">Visitors</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($topCountries as $country)
                            <tr>
                                <td>{{ $country->country }}</td>
                                <td class="text-end">{{ number_format($country->visits) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted py-4">No data available yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Device Distribution -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-mobile-alt me-2"></i>Device Distribution</h5>
            </div>
            <div class="card-body">
                @php
                    $deviceIcons = ['desktop' => 'fa-desktop', 'mobile' => 'fa-mobile-alt', 'tablet' => 'fa-tablet-alt'];
                @endphp
                @forelse($devices as $device => $percentage)
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                        <i class="fas {{ $deviceIcons[$device] ?? 'fa-question' }} text-primary"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between mb-1">
                            <span>{{ ucfirst($device) }}</span>
                            <span class="fw-bold">{{ $percentage }}%</span>
                        </div>
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-muted text-center">No device data yet</p>
                @endforelse
            </div>
        </div>
    </div>
    
    <!-- Popular Blog Posts -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-fire me-2"></i>Popular Blog Posts</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Post</th>
                                <th class="text-end">Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($popularPosts as $post)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $post->id) }}" class="text-decoration-none">
                                        {{ Str::limit($post->title, 40) }}
                                    </a>
                                </td>
                                <td class="text-end">{{ number_format($post->views ?? 0) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted py-4">No posts yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
function changePeriod(days) {
    window.location.href = '{{ route("admin.analytics.overview") }}?period=' + days;
}

document.addEventListener('DOMContentLoaded', function() {
    // Traffic Chart with real data
    const dailyStats = @json($dailyStats);
    const trafficCtx = document.getElementById('trafficChart').getContext('2d');
    new Chart(trafficCtx, {
        type: 'line',
        data: {
            labels: dailyStats.map(d => d.date),
            datasets: [{
                label: 'Page Views',
                data: dailyStats.map(d => d.views),
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                fill: true,
                tension: 0.4
            }, {
                label: 'Visitors',
                data: dailyStats.map(d => d.visitors),
                borderColor: '#198754',
                backgroundColor: 'transparent',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    // Sources Chart with real data
    const trafficSources = @json($trafficSources);
    const sourcesCtx = document.getElementById('sourcesChart').getContext('2d');
    new Chart(sourcesCtx, {
        type: 'doughnut',
        data: {
            labels: trafficSources.map(s => s.name),
            datasets: [{
                data: trafficSources.map(s => s.value),
                backgroundColor: trafficSources.map(s => s.color)
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
});
</script>
@endpush
