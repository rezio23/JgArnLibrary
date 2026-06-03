@extends('layouts.app')

@section('title', 'My Borrowings')
@section('nav-borrowings', 'active')

@section('content')
<div class="page-header">
    <h2>My Borrowings</h2>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book</th>
                        <th>Category</th>
                        <th>Borrowed Date</th>
                        <th>Returned Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($borrowings as $borrowing)
                        <tr>
                            <td>{{ $borrowing->BorrowingID }}</td>
                            <td><strong>{{ $borrowing->book->BookName ?? '-' }}</strong></td>
                            <td>{{ $borrowing->book->category->CategoryName ?? '-' }}</td>
                            <td>{{ $borrowing->BorrowedDate ? date('M d, Y h:i A', strtotime($borrowing->BorrowedDate)) : '-' }}</td>
                            <td>{{ $borrowing->ReturnedDate ? date('M d, Y h:i A', strtotime($borrowing->ReturnedDate)) : '-' }}</td>
                            <td>
                                @if($borrowing->Status === 'borrowed')
                                    <span class="badge" style="background: #18181b; color: #fff; font-weight: 500; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem;">Borrowed</span>
                                @else
                                    <span class="badge" style="background: #f4f4f5; color: #52525b; font-weight: 500; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; border: 1px solid #e4e4e7;">Returned</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">No borrowings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($borrowings->hasPages())
        <div class="card-footer d-flex justify-content-center">
            {{ $borrowings->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
