@php
    $project = $project ?? null;
    $preselectedClient = $preselectedClient ?? null;
@endphp

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white"><strong>Project Details</strong></div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label">Project Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $project->name ?? '') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Client *</label>
                        <select name="client_id" class="form-select @error('client_id') is-invalid @enderror" required>
                            <option value="">Select client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}"
                                    {{ old('client_id', $project->client_id ?? $preselectedClient) == $client->id ? 'selected' : '' }}>
                                    {{ $client->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('client_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4"
                                  placeholder="Scope of work, deliverables...">{{ old('description', $project->description ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white"><strong>Timeline</strong></div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control"
                              value="{{ old('start_date', optional($project)->start_date?->format('Y-m-d') ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror"
                              value="{{ old('end_date', optional($project)->end_date?->format('Y-m-d')) }}">
                        @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white"><strong>Status</strong></div>
            <div class="card-body">
                <select name="status" class="form-select" required>
                    <option value="planning" {{ old('status', $project->status ?? 'planning') == 'planning' ? 'selected' : '' }}>Planning</option>
                    <option value="in_progress" {{ old('status', $project->status ?? '') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="on_hold" {{ old('status', $project->status ?? '') == 'on_hold' ? 'selected' : '' }}>On Hold</option>
                    <option value="completed" {{ old('status', $project->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ old('status', $project->status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white"><strong>Budget</strong></div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-7">
                        <label class="form-label">Budget</label>
                        <input type="number" step="0.01" min="0" name="budget" class="form-control"
                               value="{{ old('budget', $project->budget ?? '') }}">
                    </div>
                    <div class="col-5">
                        <label class="form-label">Currency</label>
                        <select name="currency" class="form-select">
                            @foreach(['USD', 'EUR', 'GBP', 'INR', 'AUD', 'CAD'] as $currency)
                                <option value="{{ $currency }}" {{ old('currency', $project->currency ?? 'USD') == $currency ? 'selected' : '' }}>{{ $currency }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white"><strong>Ownership</strong></div>
            <div class="card-body">
                <label class="form-label">Project Manager</label>
                <select name="manager_id" class="form-select">
                    <option value="">Unassigned</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('manager_id', $project->manager_id ?? '') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i>{{ $project ? 'Update Project' : 'Save Project' }}
            </button>
            <a href="{{ $project ? route('admin.projects.show', $project) : route('admin.projects.index') }}" class="btn btn-outline-secondary">
                Cancel
            </a>
        </div>
    </div>
</div>