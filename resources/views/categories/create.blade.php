@extends('layouts.app')

@section('title', 'Create Category')
@section('nav-categories', 'active')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Create Category</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="mb-3">
                <label for="CategoryName" class="form-label">Category Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('CategoryName') is-invalid @enderror" id="CategoryName" name="CategoryName" value="{{ old('CategoryName') }}" required>
                @error('CategoryName')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control @error('Description') is-invalid @enderror" id="Description" name="Description" rows="4">{{ old('Description') }}</textarea>
                @error('Description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Category</button>
        </form>
    </div>
</div>
@endsection
