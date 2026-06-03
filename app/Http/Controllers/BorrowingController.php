<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    /**
     * POST /api/borrow
     */
    public function borrow(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'BookName' => ['required', 'string', 'max:255'],
        ]);

        $book = Book::where('BookName', $validated['BookName'])->first();

        if (!$book) {
            return response()->json([
                'message' => 'Book not found.',
            ], 404);
        }

        if ($book->Qty < 1) {
            return response()->json([
                'message' => 'No copies available for borrowing.',
            ], 400);
        }

        $user = $request->user();

        $alreadyBorrowed = Borrowing::where('UserID', $user->id)
            ->where('BookID', $book->BookID)
            ->where('Status', 'borrowed')
            ->exists();

        if ($alreadyBorrowed) {
            return response()->json([
                'message' => 'You have already borrowed this book and have not returned it yet.',
            ], 409);
        }

        DB::transaction(function () use ($book, $user) {
            $book->decrement('Qty');

            Borrowing::create([
                'UserID' => $user->id,
                'BookID' => $book->BookID,
                'BorrowedDate' => now(),
                'Status' => 'borrowed',
            ]);
        });

        return response()->json([
            'message' => 'Book borrowed successfully.',
            'data' => [
                'book' => $book->fresh()->load('category'),
                'borrowed_at' => now()->toDateTimeString(),
            ],
        ]);
    }

    /**
     * POST /api/return/{id}
     */
    public function return(int $id): JsonResponse
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'message' => 'Book not found.',
            ], 404);
        }

        $user = request()->user();

        $borrowing = Borrowing::where('UserID', $user->id)
            ->where('BookID', $book->BookID)
            ->where('Status', 'borrowed')
            ->latest()
            ->first();

        if (!$borrowing) {
            return response()->json([
                'message' => 'No active borrowing found for this book.',
            ], 404);
        }

        DB::transaction(function () use ($book, $borrowing) {
            $book->increment('Qty');

            $borrowing->update([
                'ReturnedDate' => now(),
                'Status' => 'returned',
            ]);
        });

        return response()->json([
            'message' => 'Book returned successfully.',
            'data' => [
                'book' => $book->fresh()->load('category'),
                'returned_at' => now()->toDateTimeString(),
            ],
        ]);
    }

    /**
     * GET /api/borrowings
     */
    public function index(): JsonResponse
    {
        $borrowings = Borrowing::with(['user', 'book.category'])
            ->orderBy('BorrowedDate', 'desc')
            ->get();

        return response()->json([
            'data' => $borrowings,
        ]);
    }
}
