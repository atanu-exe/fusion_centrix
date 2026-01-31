@extends('admin.layouts.app')

@section('title', 'Settings')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Settings</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Settings</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <!-- Settings Navigation -->
        <div class="card">
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <a href="#general" class="list-group-item list-group-item-action active" data-bs-toggle="list">
                        <i class="fas fa-cog me-2"></i>General
                    </a>
                    <a href="#site" class="list-group-item list-group-item-action" data-bs-toggle="list">
                        <i class="fas fa-globe me-2"></i>Site Info
                    </a>
                    <a href="#blog" class="list-group-item list-group-item-action" data-bs-toggle="list">
                        <i class="fas fa-newspaper me-2"></i>Blog Settings
                    </a>
                    <a href="#email" class="list-group-item list-group-item-action" data-bs-toggle="list">
                        <i class="fas fa-envelope me-2"></i>Email
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-9">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="tab-content">
                <!-- General Settings -->
                <div class="tab-pane fade show active" id="general">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"><i class="fas fa-cog me-2"></i>General Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Admin Theme</label>
                                <select class="form-select" name="admin_theme">
                                    <option value="light" {{ ($settings['admin_theme'] ?? 'light') == 'light' ? 'selected' : '' }}>Light</option>
                                    <option value="dark" {{ ($settings['admin_theme'] ?? '') == 'dark' ? 'selected' : '' }}>Dark</option>
                                    <option value="auto" {{ ($settings['admin_theme'] ?? '') == 'auto' ? 'selected' : '' }}>Auto (System)</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Items Per Page</label>
                                <select class="form-select" name="items_per_page">
                                    <option value="10" {{ ($settings['items_per_page'] ?? 15) == 10 ? 'selected' : '' }}>10</option>
                                    <option value="15" {{ ($settings['items_per_page'] ?? 15) == 15 ? 'selected' : '' }}>15</option>
                                    <option value="20" {{ ($settings['items_per_page'] ?? 15) == 20 ? 'selected' : '' }}>20</option>
                                    <option value="50" {{ ($settings['items_per_page'] ?? 15) == 50 ? 'selected' : '' }}>50</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Timezone</label>
                                <select class="form-select" name="timezone">
                                    @foreach($timezones as $region => $zones)
                                        <optgroup label="{{ $region }}">
                                            @foreach($zones as $zoneValue => $zoneName)
                                                <option value="{{ $zoneValue }}" {{ ($settings['timezone'] ?? 'UTC') == $zoneValue ? 'selected' : '' }}>
                                                    {{ $zoneName }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                <small class="text-muted">Current server time: {{ now()->format('Y-m-d H:i:s') }} ({{ config('app.timezone') }})</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Site Info -->
                <div class="tab-pane fade" id="site">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"><i class="fas fa-globe me-2"></i>Site Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Site Name</label>
                                <input type="text" class="form-control" name="site_name" value="{{ $settings['site_name'] ?? 'FusionCentrix' }}">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Site Description</label>
                                <textarea class="form-control" name="site_description" rows="3">{{ $settings['site_description'] ?? 'Your trusted digital partner' }}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Contact Email</label>
                                <input type="email" class="form-control" name="contact_email" value="{{ $settings['contact_email'] ?? 'info@fusioncentrix.com' }}">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Contact Phone</label>
                                <input type="text" class="form-control" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Blog Settings -->
                <div class="tab-pane fade" id="blog">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"><i class="fas fa-newspaper me-2"></i>Blog Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Posts Per Page</label>
                                <input type="number" class="form-control" name="posts_per_page" value="{{ $settings['posts_per_page'] ?? 10 }}" min="1" max="50">
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="allow_comments" name="allow_comments" {{ ($settings['allow_comments'] ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="allow_comments">
                                        Allow comments on blog posts
                                    </label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="auto_publish_scheduled" name="auto_publish_scheduled" {{ ($settings['auto_publish_scheduled'] ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="auto_publish_scheduled">
                                        Auto-publish scheduled posts
                                    </label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Default Featured Image</label>
                                <input type="file" class="form-control" name="default_featured_image" accept="image/*">
                                <small class="text-muted">Used when no featured image is uploaded</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Email Settings -->
                <div class="tab-pane fade" id="email">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"><i class="fas fa-envelope me-2"></i>Email Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Email settings are configured in your <code>.env</code> file for security.
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">From Name</label>
                                <input type="text" class="form-control" name="mail_from_name" value="{{ $settings['mail_from_name'] ?? 'FusionCentrix' }}">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">From Email</label>
                                <input type="email" class="form-control" name="mail_from_address" value="{{ $settings['mail_from_address'] ?? 'noreply@fusioncentrix.com' }}">
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="notify_new_user" name="notify_new_user" {{ ($settings['notify_new_user'] ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="notify_new_user">
                                        Send email notification when new user is created
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Save Settings
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
