@extends('admin.layouts.app')

@section('title', 'Edit Client')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Edit Client</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.clients.index') }}">Clients</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>{{ $client->name }}</span>
        </div>
    </div>
</div>

<form action="{{ route('admin.clients.update', $client) }}" method="POST">
    @csrf
    @method('PUT')
    @include('admin.clients._form', ['client' => $client])
</form>
@endsection