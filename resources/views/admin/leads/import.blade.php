@extends('admin.layouts.app')

@section('title', 'Import Leads')

@section('content')
    <div class="page-header mb-4">
        <h1 class="page-title">Import Leads</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.leads.index') }}">Leads</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Import</span>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-upload me-2"></i>Upload Lead File</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.leads.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label">Select File <span class="text-danger">*</span></label>
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror"
                                accept=".xlsx,.xls,.csv" required>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Supported formats: Excel (.xlsx, .xls) or CSV (.csv)</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Default Status</label>
                                <select name="lead_status_id" class="form-select">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ $status->is_default ? 'selected' : '' }}>
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Default Source</label>
                                <select name="lead_source_id" class="form-select">
                                    <option value="">None</option>
                                    @foreach ($sources as $source)
                                        <option value="{{ $source->id }}">{{ $source->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Assign To</label>
                            <select name="assigned_to" class="form-select">
                                <option value="">Unassigned</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ auth()->id() == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" name="skip_duplicates" class="form-check-input" id="skipDuplicates"
                                checked>
                            <label class="form-check-label" for="skipDuplicates">Skip duplicate emails</label>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload me-1"></i>Import Leads
                        </button>
                    </form>
                </div>
            </div>

            <!-- Import History -->
            @if (isset($imports) && $imports->count() > 0)
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="fas fa-history me-2"></i>Import History</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>File</th>
                                        <th>Imported</th>
                                        <th>Failed</th>
                                        <th>Duplicates</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($imports as $import)
                                        <tr>
                                            <td>{{ $import->filename }}</td>
                                            <td class="text-success">{{ $import->imported_rows }}</td>
                                            <td class="text-danger">{{ $import->failed_rows }}</td>
                                            <td class="text-warning">{{ $import->duplicate_rows }}</td>
                                            <td>
                                                @if ($import->status === 'completed')
                                                    <span class="badge bg-success">Completed</span>
                                                @elseif($import->status === 'processing')
                                                    <span class="badge bg-info">Processing</span>
                                                @else
                                                    <span class="badge bg-danger">Failed</span>
                                                @endif
                                            </td>
                                            <td>{{ $import->created_at->format('M d, Y h:i A') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-info-circle me-2"></i>File Format Guide</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Your file should contain the following columns:</p>

                    <table class="table table-sm align-middle">
                        <thead>
                            <tr>
                                <th>Column</th>
                                <th>Required</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td><code>name</code></td>
                                <td><span class="badge bg-danger">Yes</span></td>
                            </tr>

                            <tr>
                                <td><code>email</code></td>
                                <td><span class="badge bg-secondary">Optional</span></td>
                            </tr>

                            <tr>
                                <td><code>phone</code></td>
                                <td><span class="badge bg-secondary">Optional</span></td>
                            </tr>

                            <tr>
                                <td><code>company</code></td>
                                <td><span class="badge bg-secondary">Optional</span></td>
                            </tr>

                            <tr>
                                <td><code>designation</code></td>
                                <td><span class="badge bg-secondary">Optional</span></td>
                            </tr>

                            <tr>
                                <td><code>website</code></td>
                                <td><span class="badge bg-secondary">Optional</span></td>
                            </tr>

                            <tr>
                                <td><code>industry</code></td>
                                <td><span class="badge bg-secondary">Optional</span></td>
                            </tr>

                            <tr>
                                <td><code>country</code></td>
                                <td><span class="badge bg-secondary">Optional</span></td>
                            </tr>

                            <tr>
                                <td><code>state</code></td>
                                <td><span class="badge bg-secondary">Optional</span></td>
                            </tr>

                            <tr>
                                <td><code>city</code></td>
                                <td><span class="badge bg-secondary">Optional</span></td>
                            </tr>

                            <tr>
                                <td><code>postal_code</code></td>
                                <td><span class="badge bg-secondary">Optional</span></td>
                            </tr>

                            <tr>
                                <td><code>address</code></td>
                                <td><span class="badge bg-secondary">Optional</span></td>
                            </tr>

                            <tr>
                                <td><code>description</code></td>
                                <td><span class="badge bg-secondary">Optional</span></td>
                            </tr>

                        </tbody>

                    </table>

                    <hr>
                    <hr>

                    <div class="alert alert-info">

                        <h6 class="alert-heading mb-2">
                            <i class="fas fa-info-circle me-1"></i>
                            Import Notes
                        </h6>

                        <ul class="small mb-0 ps-3">
                            <li>Only <strong>Name</strong> is required.</li>
                            <li>Email and Phone are used to detect duplicate leads.</li>
                            <li>Lead Status, Lead Source and Assigned To will be applied from the selections on this page.
                            </li>
                            <li>Do not include ID columns like <code>lead_status_id</code>, <code>lead_source_id</code> or
                                <code>assigned_to</code>.</li>
                            <li>The first row must contain column headers.</li>
                            <li>Maximum upload size: <strong>10 MB</strong>.</li>
                        </ul>

                    </div>
                    <p class="mb-2"><strong>Sample CSV Format:</strong></p>

                    <a href="{{ asset('assets/download/sample-lead-import.csv') }}" class="btn btn-outline-primary btn-sm mt-3">
                        <i class="fas fa-download me-1"></i>Download Sample Template
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
