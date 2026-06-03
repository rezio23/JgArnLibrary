<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    /**
     * GET
     */
    public function index(): JsonResponse
    {
        $books = Book::with('category')->get();

        return response()->json([
            'data' => BookResource::collection($books),
        ]);
    }

    /**
     * POST
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
     * GET ID
     */
    public function show(Book $book): JsonResponse
    {
        return response()->json([
            'data' => new BookResource($book->load('category')),
        ]);
    }

    /**
     * PUT
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
     * DELETE
     */
    public function destroy(Book $book): JsonResponse
    {
        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully.',
        ]);
    }
}
