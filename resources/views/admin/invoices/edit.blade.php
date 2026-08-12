@extends('admin.layouts.app')

@section('title', 'Edit Invoice')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="page-title">Edit Invoice {{ $invoice->invoice_number }}</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <a href="{{ route('admin.invoices.index') }}">Invoices</a>
            <i class="fas fa-chevron-right mx-2" style="font-size: 0.6rem;"></i>
            <span>{{ $invoice->invoice_number }}</span>
        </div>
    </div>
</div>

@if($invoice->status !== 'draft')
<div class="alert alert-warning">
    <i class="fas fa-triangle-exclamation me-1"></i>
    This invoice has already been sent. Editing it will not automatically re-notify the client.
</div>
@endif

<form action="{{ route('admin.invoices.update', $invoice) }}" method="POST">
    @csrf
    @method('PUT')
    @include('admin.invoices._form', ['invoice' => $invoice])
</form>
@endsection