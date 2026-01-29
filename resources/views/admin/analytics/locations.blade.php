@extends('admin.layouts.app')

@section('title', 'Location Analytics')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Location Analytics</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.analytics.overview') }}">Analytics</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Locations</span>
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

<div class="row">
    <!-- Countries -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-globe me-2"></i>Countries</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Country</th>
                                <th class="text-center">Visitors</th>
                                <th class="text-center">Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($countries as $country)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                        <span class="fw-medium">{{ $country->country }}</span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-primary">{{ number_format($country->visitors) }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text-muted">{{ number_format($country->views) }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-globe fa-2x mb-2"></i>
                                        <p class="mb-0">No location data available</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($countries->hasPages())
            <div class="card-footer">
                {{ $countries->appends(['period' => $period])->links() }}
            </div>
            @endif
        </div>
    </div>

    <!-- Cities -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-city me-2"></i>Top Cities</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                    <table class="table table-hover mb-0">
                        <thead class="table-light sticky-top">
                            <tr>
                                <th>City</th>
                                <th>Country</th>
                                <th class="text-center">Visitors</th>
                                <th class="text-center">Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cities as $city)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-building text-info me-2"></i>
                                        <span class="fw-medium">{{ $city->city }}</span>
                                    </div>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $city->country }}</small>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">{{ number_format($city->visitors) }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text-muted">{{ number_format($city->views) }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-city fa-2x mb-2"></i>
                                        <p class="mb-0">No city data available</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Location Summary Cards -->
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card bg-primary text-white h-100">
            <div class="card-body text-center py-4">
                <i class="fas fa-globe fa-2x mb-2"></i>
                <h3 class="mb-1">{{ $countries->total() }}</h3>
                <p class="mb-0 opacity-75">Countries</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-success text-white h-100">
            <div class="card-body text-center py-4">
                <i class="fas fa-city fa-2x mb-2"></i>
                <h3 class="mb-1">{{ $cities->count() }}</h3>
                <p class="mb-0 opacity-75">Cities</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-info text-white h-100">
            <div class="card-body text-center py-4">
                <i class="fas fa-users fa-2x mb-2"></i>
                <h3 class="mb-1">{{ number_format($countries->sum('visitors')) }}</h3>
                <p class="mb-0 opacity-75">Total Visitors</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function changePeriod(period) {
    window.location.href = '{{ route('admin.analytics.locations') }}?period=' + period;
}
</script>
@endpush
