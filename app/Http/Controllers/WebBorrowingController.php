<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class WebBorrowingController extends Controller
{
    /**
     * Display borrowing history for the current user.
     */
    public function index(): View
    {
        $borrowings = Borrowing::with('book.category')
            ->where('UserID', Auth::id())
            ->orderBy('BorrowedDate', 'desc')
            ->paginate(10);

        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Borrow a book.
     */
    public function borrow(Book $book): RedirectResponse
    {
        if ($book->Qty < 1) {
            return back()->with('error', 'No copies available for borrowing.');
        }

        $userId = Auth::id();

        $alreadyBorrowed = Borrowing::where('UserID', $userId)
            ->where('BookID', $book->BookID)
            ->where('Status', 'borrowed')
            ->exists();

        if ($alreadyBorrowed) {
            return back()->with('error', 'You have already borrowed this book and have not returned it yet.');
        }

        DB::transaction(function () use ($book, $userId) {
            $book->decrement('Qty');

            Borrowing::create([
                'UserID' => $userId,
                'BookID' => $book->BookID,
                'BorrowedDate' => now(),
                'Status' => 'borrowed',
            ]);
        });

        return back()->with('success', 'Book borrowed successfully.');
    }

    /**
     * Return a book.
     */
    public function return(Book $book): RedirectResponse
    {
        $userId = Auth::id();

        $borrowing = Borrowing::where('UserID', $userId)
            ->where('BookID', $book->BookID)
            ->where('Status', 'borrowed')
            ->latest()
            ->first();

        if (!$borrowing) {
            return back()->with('error', 'No active borrowing found for this book.');
        }

        DB::transaction(function () use ($book, $borrowing) {
            $book->increment('Qty');

            $borrowing->update([
                'ReturnedDate' => now(),
                'Status' => 'returned',
            ]);
        });

        return back()->with('success', 'Book returned successfully.');
    }
}
