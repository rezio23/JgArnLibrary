<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * GET
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();

        return response()->json([
            'data' => CategoryResource::collection($categories),
        ]);
    }

    /**
     * POST
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        $category = Category::create($request->validated());

        return response()->json([
            'message' => 'Category created successfully.',
            'data' => new CategoryResource($category),
        ], 201);
    }

    /**
     * GET ID
     */
    public function show(Category $category): JsonResponse
    {
        return response()->json([
            'data' => new CategoryResource($category),
        ]);
    }

    /**
     * PUT
     */
    public function update(CategoryRequest $request, Category $category): JsonResponse
    {
        $category->update($request->validated());

        return response()->json([
            'message' => 'Category updated successfully.',
            'data' => new CategoryResource($category),
        ]);
    }

    /**
     * DELETE
     */
    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully.',
        ]);
    }
}
