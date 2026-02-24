@extends('admin.layouts.app')

@section('title', 'Email Campaign Details')

@section('content')
<div class="page-header mb-4">
    <h1 class="page-title">Campaign: {{ $campaign->name }}</h1>
    <div class="page-breadcrumb">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
        <a href="{{ route('admin.email.campaigns.index') }}">Campaigns</a>
        <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
        <span>{{ $campaign->name }}</span>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h5 class="mb-3">Campaign Information</h5>
        <dl class="row mb-0">
            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9">{{ $campaign->name }}</dd>
            <dt class="col-sm-3">Subject</dt>
            <dd class="col-sm-9">{{ $campaign->subject }}</dd>
            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9"><span class="badge bg-{{ $campaign->status == 'sent' ? 'success' : ($campaign->status == 'draft' ? 'secondary' : 'info') }}">{{ ucfirst($campaign->status) }}</span></dd>
            <dt class="col-sm-3">Created By</dt>
            <dd class="col-sm-9">{{ $campaign->creator->name ?? 'N/A' }}</dd>
            <dt class="col-sm-3">Created At</dt>
            <dd class="col-sm-9">{{ $campaign->created_at->format('Y-m-d H:i') }}</dd>
            <dt class="col-sm-3">Total Recipients</dt>
            <dd class="col-sm-9">{{ $campaign->total_recipients ?? 'N/A' }}</dd>
        </dl>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h5 class="mb-3">Email Content</h5>
        <div class="border rounded p-3 bg-light">
            @if($campaign->template_id && $campaign->template)
                {!! $campaign->template->body !!}
                <div class="text-muted mt-2 small">(Using template: {{ $campaign->template->name }})</div>
            @else
                {!! $campaign->content !!}
            @endif
        </div>
    </div>
</div>

@if($campaign->emails && $campaign->emails->count())
<div class="card mb-4">
    <div class="card-body">
        <h5 class="mb-3">Recent Emails</h5>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Recipient</th>
                    <th>Status</th>
                    <th>Sent At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($campaign->emails as $email)
                <tr>
                    <td>{{ $email->recipient_email }}</td>
                    <td><span class="badge bg-{{ $email->status == 'sent' ? 'success' : ($email->status == 'failed' ? 'danger' : 'secondary') }}">{{ ucfirst($email->status) }}</span></td>
                    <td>{{ $email->sent_at ? $email->sent_at->format('Y-m-d H:i') : 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
