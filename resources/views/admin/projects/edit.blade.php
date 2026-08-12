@extends('admin.layouts.app')

@section('title', 'Edit Project')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Edit Project</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.projects.index') }}">Projects</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>{{ $project->name }}</span>
        </div>
    </div>
</div>

<form action="{{ route('admin.projects.update', $project) }}" method="POST">
    @csrf
    @method('PUT')
    @include('admin.projects._form', ['project' => $project])
</form>
@endsection