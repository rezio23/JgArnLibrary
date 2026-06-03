
@extends('layouts.app')

@section('title', 'Dashboard')
@section('nav-dashboard', 'active')

@section('content')
<div class="row g-4">
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="stat-icon">
                <i class="bi bi-book"></i>
            </div>
            <div class="stat-label">Total Books</div>
            <div class="stat-value">{{ $totalBooks }}</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card">
            <div class="stat-icon">
                <i class="bi bi-tags"></i>
            </div>
            <div class="stat-label">Total Categories</div>
            <div class="stat-value">{{ $totalCategories }}</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card">
            <div class="stat-icon">
                <i class="bi bi-box-seam"></i>
            </div>
            <div class="stat-label">Total Quantity</div>
            <div class="stat-value">{{ $totalQty }}</div>
        </div>
    </div>
</div>

<div class="row g-4 mt-2">
    <div class="col-md-6">
        <div class="card stat-card">
            <div class="stat-icon">
                <i class="bi bi-arrow-left-right"></i>
            </div>
            <div class="stat-label">Active Borrows</div>
            <div class="stat-value">{{ $activeBorrows }}</div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card stat-card">
            <div class="stat-icon">
                <i class="bi bi-clock-history"></i>
            </div>
            <div class="stat-label">Total Borrowings</div>
            <div class="stat-value">{{ $totalBorrowings }}</div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-5 text-center">
                <i class="bi bi-book-half" style="font-size: 3rem; color: #e4e4e7;"></i>
                <h5 class="mt-3" style="color: #a1a1aa; font-weight: 500;">Welcome to JgArn Library</h5>
                <p class="text-muted mb-0" style="font-size: 0.875rem;">Manage your books and categories from the sidebar.</p>
            </div>
        </div>
    </div>
</div>
@endsection
