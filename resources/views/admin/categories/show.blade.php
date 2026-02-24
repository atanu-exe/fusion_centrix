@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Category: {{ $category->name }}</h1>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $category->description ?? 'N/A' }}</p>
            <p class="card-text"><strong>Slug:</strong> {{ $category->slug }}</p>
            <p class="card-text"><strong>Color:</strong> <span style="background: {{ $category->color }}; padding: 2px 10px; border-radius: 3px; color: #fff;">{{ $category->color ?? 'N/A' }}</span></p>
            <p class="card-text"><strong>Icon:</strong> {{ $category->icon ?? 'N/A' }}</p>
            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
