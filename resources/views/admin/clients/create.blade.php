@extends('admin.layouts.app')

@section('title', 'Add Client')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Add Client</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.clients.index') }}">Clients</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Add</span>
        </div>
    </div>
</div>

<form action="{{ route('admin.clients.store') }}" method="POST">
    @csrf
    @include('admin.clients._form', ['client' => null])
</form>
@endsection