@extends('admin.layouts.app')

@section('title', 'Add Lead')

@section('content')
    <div class="page-header mb-4">
        <h1 class="page-title">Add New Lead</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.leads.index') }}">Leads</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Add</span>
        </div>
    </div>

    <form action="{{ route('admin.leads.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-8">

                <!-- ========================= -->
                <!-- CONTACT INFORMATION -->
                <!-- ========================= -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-user me-2"></i>
                            Contact Information
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <!-- Contact Person -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Contact Person <span class="text-danger">*</span>
                                </label>

                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required>

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Job Title -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Job Title
                                </label>

                                <input type="text" name="job_title"
                                    class="form-control @error('job_title') is-invalid @enderror"
                                    value="{{ old('job_title') }}" placeholder="CEO, Founder, Manager">

                                @error('job_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Email
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    required>

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Phone
                                </label>

                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">

                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- WhatsApp -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    WhatsApp Number
                                </label>

                                <input type="text" name="whatsapp_number"
                                    class="form-control @error('whatsapp_number') is-invalid @enderror"
                                    value="{{ old('whatsapp_number') }}">

                                @error('whatsapp_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                    </div>
                </div>



                <!-- ========================= -->
                <!-- COMPANY INFORMATION -->
                <!-- ========================= -->

                <div class="card mb-4">

                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-building me-2"></i>
                            Company Information
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <!-- Company -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Company Name
                                </label>

                                <input type="text" name="company"
                                    class="form-control @error('company') is-invalid @enderror"
                                    value="{{ old('company') }}">

                                @error('company')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Website -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Website
                                </label>

                                <input type="url" name="website"
                                    class="form-control @error('website') is-invalid @enderror"
                                    value="{{ old('website') }}" placeholder="https://">

                                @error('website')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Industry -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Industry
                                </label>

                                <select name="industry" class="form-select @error('industry') is-invalid @enderror">

                                    <option value="">Select Industry</option>

                                    <option value="IT & Software">IT & Software</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Education">Education</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Real Estate">Real Estate</option>
                                    <option value="Manufacturing">Manufacturing</option>
                                    <option value="Logistics">Logistics</option>
                                    <option value="Other">Other</option>

                                </select>

                                @error('industry')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                    </div>

                </div>



                <!-- ========================= -->
                <!-- LOCATION -->
                <!-- ========================= -->

                <div class="card mb-4">

                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Location
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-4 mb-3">

                                <label class="form-label">
                                    Country
                                </label>

                                <input type="text" name="country"
                                    class="form-control @error('country') is-invalid @enderror"
                                    value="{{ old('country') }}">

                                @error('country')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <!-- State -->
                            <div class="col-md-4 mb-3">

                                <label class="form-label">
                                    State
                                </label>

                                <input type="text" name="state"
                                    class="form-control @error('state') is-invalid @enderror"
                                    value="{{ old('state') }}">

                                @error('state')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <!-- City -->
                            <div class="col-md-4 mb-3">

                                <label class="form-label">
                                    City
                                </label>

                                <input type="text" name="city"
                                    class="form-control @error('city') is-invalid @enderror"
                                    value="{{ old('city') }}">

                                @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                        <!-- Address -->

                        <div class="mb-0">

                            <label class="form-label">
                                Address
                            </label>

                            <textarea name="address" rows="3" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>

                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>



                <!-- ================================= -->
                <!-- PROJECT REQUIREMENT -->
                <!-- ================================= -->

                <div class="card mb-4">

                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-file-signature me-2"></i>
                            Project Requirement
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">

                            <label class="form-label">
                                Requirement / Notes
                                <span class="text-danger">*</span>
                            </label>

                            <textarea name="notes" rows="6" class="form-control @error('notes') is-invalid @enderror"
                                placeholder="Briefly describe the client's requirement, project scope, pain points, technologies needed, deadlines or any other important information...">{{ old('notes') }}</textarea>

                            @error('notes')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

            </div>



            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="fas fa-cog me-2"></i>Lead Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="lead_status_id"
                                class="form-select @error('lead_status_id') is-invalid @enderror" required>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}"
                                        {{ old('lead_status_id', $statuses->first()->id) == $status->id ? 'selected' : '' }}>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lead_status_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Source</label>
                            <select name="lead_source_id"
                                class="form-select @error('lead_source_id') is-invalid @enderror">
                                <option value="">Select Source</option>
                                @foreach ($sources as $source)
                                    <option value="{{ $source->id }}"
                                        {{ old('lead_source_id') == $source->id ? 'selected' : '' }}>
                                        {{ $source->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lead_source_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Priority</label>
                            <select name="priority" class="form-select @error('priority') is-invalid @enderror">
                                <option value="low" {{ old('priority', 'medium') == 'low' ? 'selected' : '' }}>Low
                                </option>
                                <option value="medium" {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>
                                    Medium</option>
                                <option value="high" {{ old('priority', 'medium') == 'high' ? 'selected' : '' }}>High
                                </option>
                                <option value="urgent" {{ old('priority', 'medium') == 'urgent' ? 'selected' : '' }}>
                                    Urgent</option>
                            </select>
                            @error('priority')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Assign To</label>
                            <select name="assigned_to" class="form-select @error('assigned_to') is-invalid @enderror">
                                <option value="">Unassigned</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('assigned_to', auth()->id()) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('assigned_to')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tags</label>
                            <input type="text" name="tags"
                                class="form-control @error('tags') is-invalid @enderror" value="{{ old('tags') }}"
                                placeholder="tag1, tag2, tag3">
                            <small class="text-muted">Separate tags with commas</small>
                            @error('tags')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Save Lead
                    </button>
                    <a href="{{ route('admin.leads.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
@endsection
