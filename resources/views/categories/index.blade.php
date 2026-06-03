
@extends('layouts.app')

@section('title', 'Categories')
@section('nav-categories', 'active')

@section('content')
<div class="page-header">
    <h2>Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        Add Category
    </a>
</div>

<div class="card overflow-hidden" style="max-width: 100%;">
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Created Date</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->CategoryID }}</td>
                        <td><strong>{{ $category->CategoryName }}</strong></td>
                        <td>{{ $category->Description ?? '-' }}</td>
                        <td>{{ $category->CreatedDate }}</td>
                        <td class="text-end">
                            <a href="{{ route('categories.edit', $category->CategoryID) }}" class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category->CategoryID) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-outline-danger"
                                        data-bs-toggle="modal" data-bs-target="#confirmModal"
                                        data-confirm-message="Are you sure you want to delete this category?">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-5">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($categories->hasPages())
        <div class="card-footer d-flex justify-content-center">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
