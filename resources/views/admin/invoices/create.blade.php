@extends('admin.layouts.app')

@section('title', 'Create Invoice')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Create Invoice</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.invoices.index') }}">Invoices</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>Create</span>
        </div>
    </div>
</div>

<form action="{{ route('admin.invoices.store') }}" method="POST">
    @csrf
    @include('admin.invoices._form', ['invoice' => null])
</form>
@endsection