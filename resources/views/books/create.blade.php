
@extends('layouts.app')

@section('title', 'Create Book')
@section('nav-books', 'active')

@section('content')
<div class="page-header">
    <h2>Create Book</h2>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('books.store') }}">
            @csrf
            <div class="mb-3">
                <label for="BookName" class="form-label">Book Name <span class="text-muted">*</span></label>
                <input type="text" class="form-control @error('BookName') is-invalid @enderror" id="BookName" name="BookName" value="{{ old('BookName') }}" required>
                @error('BookName')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="CategoryID" class="form-label">Category <span class="text-muted">*</span></label>
                <select class="form-select @error('CategoryID') is-invalid @enderror" id="CategoryID" name="CategoryID" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->CategoryID }}" {{ old('CategoryID') == $category->CategoryID ? 'selected' : '' }}>{{ $category->CategoryName }}</option>
                    @endforeach
                </select>
                @error('CategoryID')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Qty" class="form-label">Quantity <span class="text-muted">*</span></label>
                <input type="number" class="form-control @error('Qty') is-invalid @enderror" id="Qty" name="Qty" value="{{ old('Qty', 0) }}" min="0" required>
                @error('Qty')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control @error('Description') is-invalid @enderror" id="Description" name="Description" rows="4">{{ old('Description') }}</textarea>
                @error('Description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Book</button>
        </form>
    </div>
</div>
@endsection
