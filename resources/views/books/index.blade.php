
@extends('layouts.app')

@section('title', 'Books')
@section('nav-books', 'active')

@section('content')
<div class="page-header">
    <h2>Books</h2>
    <a href="{{ route('books.create') }}" class="btn btn-primary">
        Add Book
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
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
                            <td><strong>{{ $book->BookName }}</strong></td>
                            <td>{{ $book->category->CategoryName ?? '-' }}</td>
                            <td>{{ $book->Qty }}</td>
                            <td>{{ $book->Description ?? '-' }}</td>
                            <td class="text-end">
                                @if(in_array($book->BookID, $borrowedBookIds))
                                    <form action="{{ route('return', $book->BookID) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-arrow-return-left"></i> Return
                                        </button>
                                    </form>
                                @elseif($book->Qty > 0)
                                    <form action="{{ route('borrow', $book->BookID) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="bi bi-bookmark-plus"></i> Borrow
                                        </button>
                                    </form>
                                @else
                                    <span class="btn btn-sm btn-secondary disabled">
                                        <i class="bi bi-x-circle"></i> Unavailable
                                    </span>
                                @endif
                                <a href="{{ route('books.edit', $book->BookID) }}" class="btn btn-sm btn-outline-primary">
                                    Edit
                                </a>
                                <form action="{{ route('books.destroy', $book->BookID) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                            data-bs-toggle="modal" data-bs-target="#confirmModal"
                                            data-confirm-message="Are you sure you want to delete this book?">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">No books found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($books->hasPages())
        <div class="card-footer d-flex justify-content-center">
            {{ $books->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
