<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    /**
     * Display a listing of books.
     */
    public function index(): JsonResponse
    {
        $books = Book::with('category')->get();

        return response()->json([
            'data' => BookResource::collection($books),
        ]);
    }

    /**
     * Store a newly created book.
     */
    public function store(BookRequest $request): JsonResponse
    {
        $book = Book::create($request->validated());

        return response()->json([
            'message' => 'Book created successfully.',
            'data' => new BookResource($book->load('category')),
        ], 201);
    }

    /**
     * Display the specified book.
     */
    public function show(Book $book): JsonResponse
    {
        return response()->json([
            'data' => new BookResource($book->load('category')),
        ]);
    }

    /**
     * Update the specified book.
     */
    public function update(BookRequest $request, Book $book): JsonResponse
    {
        $book->update($request->validated());

        return response()->json([
            'message' => 'Book updated successfully.',
            'data' => new BookResource($book->load('category')),
        ]);
    }

    /**
     * Remove the specified book.
     */
    public function destroy(Book $book): JsonResponse
    {
        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully.',
        ]);
    }
}
