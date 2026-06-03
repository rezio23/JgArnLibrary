
@extends('layouts.app')

@section('title', 'Edit Category')
@section('nav-categories', 'active')

@section('content')
<div class="page-header">
    <h2>Edit Category</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('categories.update', $category->CategoryID) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="CategoryName" class="form-label">Category Name <span class="text-muted">*</span></label>
                <input type="text" class="form-control @error('CategoryName') is-invalid @enderror" id="CategoryName" name="CategoryName" value="{{ old('CategoryName', $category->CategoryName) }}" required>
                @error('CategoryName')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control @error('Description') is-invalid @enderror" id="Description" name="Description" rows="4">{{ old('Description', $category->Description) }}</textarea>
                @error('Description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
</div>
@endsection
