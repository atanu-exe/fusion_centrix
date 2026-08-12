@extends('admin.layouts.app')

@section('title', $project->name)

@section('content')
    <div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="page-title">{{ $project->name }}</h1>
            <div class="page-breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
                <a href="{{ route('admin.projects.index') }}">Projects</a>
                <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
                <span>{{ $project->name }}</span>
            </div>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-outline-primary">
                <i class="fas fa-edit me-1"></i>Edit
            </a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <strong>Project Overview</strong>
                    <span class="badge bg-{{ $project->status_color }}">{{ $project->status_label }}</span>
                </div>
                <div class="card-body">
                    @if ($project->description)
                        <p>{{ $project->description }}</p>
                    @else
                        <p class="text-muted mb-0">No description added.</p>
                    @endif
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <small class="text-muted d-block">Start Date</small>
                            {{ $project->start_date?->format('M d, Y') ?? '—' }}
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block">End Date</small>
                            {{ $project->end_date?->format('M d, Y') ?? '—' }}
                            @if ($project->is_overdue)
                                <span
                                    class="badge bg-danger bg-opacity-10 text-danger border border-danger-subtle ms-1">Overdue</span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block">Budget</small>
                            {{ $project->budget ? $project->currency . ' ' . number_format($project->budget, 2) : '—' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attached Services -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <strong>Services</strong>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addServiceModal">
                        <i class="fas fa-plus me-1"></i>Add Service
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Service</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($project->services as $service)
                                    <tr>
                                        <td>
                                            <strong>{{ $service->name }}</strong>
                                            @if ($service->pivot->notes)
                                                <small class="text-muted d-block">{{ $service->pivot->notes }}</small>
                                            @endif
                                        </td>
                                        <td>{{ $service->pivot->quantity }}</td>
                                        <td>{{ $project->currency }} {{ number_format($service->pivot->price, 2) }}</td>
                                        <td><strong>{{ $project->currency }}
                                                {{ number_format($service->pivot->price * $service->pivot->quantity, 2) }}</strong>
                                        </td>
                                        <td class="text-end">
                                            <form
                                                action="{{ route('admin.projects.services.detach', [$project, $service]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Remove this service from the project?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">
                                            No services added to this project yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            @if ($project->services->isNotEmpty())
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Total</strong></td>
                                        <td colspan="2"><strong>{{ $project->currency }}
                                                {{ number_format($project->services_total, 2) }}</strong></td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white"><strong>Invoices</strong></div>
                <div class="card-body text-muted text-center py-4">
                    Invoices module coming next — this section will list invoices for this project.
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><strong>Client</strong></div>
                <div class="card-body">
                    <a href="{{ route('admin.clients.show', $project->client) }}" class="text-decoration-none">
                        <strong>{{ $project->client->name }}</strong>
                    </a>
                    @if ($project->client->company)
                        <small class="text-muted d-block">{{ $project->client->company }}</small>
                    @endif
                    @if ($project->client->email)
                        <small class="d-block mt-2"><a
                                href="mailto:{{ $project->client->email }}">{{ $project->client->email }}</a></small>
                    @endif
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><strong>Ownership</strong></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Project Manager</span>
                        <strong>{{ $project->manager->name ?? 'Unassigned' }}</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Created by</span>
                        <strong>{{ $project->creator->name ?? '—' }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Service Modal -->
    <div class="modal fade" id="addServiceModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.projects.services.attach', $project) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Service to Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Service</label>
                            <select name="service_id" class="form-select" id="serviceSelect" required>
                                <option value="">Select a service</option>
                                @foreach ($availableServices as $service)
                                    <option value="{{ $service->id }}" data-price="{{ $service->default_price }}">
                                        {{ $service->name }} ({{ $service->currency }}
                                        {{ number_format($service->default_price, 2) }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <label class="form-label">Price</label>
                                <input type="number" step="0.01" min="0" name="price" id="priceInput"
                                    class="form-control" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Quantity</label>
                                <input type="number" min="1" name="quantity" class="form-control"
                                    value="1" required>
                            </div>
                        </div>
                        <div class="mb-0 mt-3">
                            <label class="form-label">Notes</label>
                            <input type="text" name="notes" class="form-control" placeholder="Optional">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Service</button>
                    </div>
                </form>
            </div>
        </div>
        <a href="{{ route('admin.invoices.create', ['project_id' => $project->id]) }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus me-1"></i>Generate Invoice
        </a>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('serviceSelect').addEventListener('change', function() {
            const price = this.selectedOptions[0]?.dataset.price || 0;
            document.getElementById('priceInput').value = price;
        });
    </script>
@endpush
