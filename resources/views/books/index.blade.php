@extends('layouts.app')

@section('title', 'Books')
@section('nav-books', 'active')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Books</h2>
    <a href="{{ route('books.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add Book
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Category</th>
                        <th>Qty</th>
                        <th>Description</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td>{{ $book->BookID }}</td>
                            <td>{{ $book->BookName }}</td>
                            <td>{{ $book->category->CategoryName ?? '-' }}</td>
                            <td>{{ $book->Qty }}</td>
                            <td>{{ $book->Description ?? '-' }}</td>
                            <td class="text-end">
                                <a href="{{ route('books.edit', $book->BookID) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('books.destroy', $book->BookID) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No books found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($books->hasPages())
        <div class="card-footer">
            {{ $books->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
