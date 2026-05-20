@extends('layouts.app')

@section('title', 'Dashboard')
@section('nav-dashboard', 'active')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Dashboard</h2>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card stat-card p-4 text-center">
            <i class="bi bi-book fs-1 text-primary"></i>
            <h5 class="mt-2 text-muted">Total Books</h5>
            <h2>{{ $totalBooks }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card p-4 text-center">
            <i class="bi bi-tags fs-1 text-success"></i>
            <h5 class="mt-2 text-muted">Total Categories</h5>
            <h2>{{ $totalCategories }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card p-4 text-center">
            <i class="bi bi-box-seam fs-1 text-warning"></i>
            <h5 class="mt-2 text-muted">Total Quantity</h5>
            <h2>{{ $totalQty }}</h2>
        </div>
    </div>
</div>
@endsection
