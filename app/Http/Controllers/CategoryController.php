<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Resources\Category\CategoriesResource;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return CategoriesResource::collection($categories);
    }

    public function store(CategoryStoreRequest $request)
    {
        $validated = $request->validated();
        $category = Category::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'category created successfully',
            'category' => new CategoryResource($category)
        ], 201);
    }

    public function show(Category $category)
    {
        return response()->json(['category' => new CategoryResource($category)]);
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->update($validated);
        $category->save();
        return response()->json([
            'success' => true,
            'message' => 'category updated successfully',
            'category' => new CategoryResource($category)
        ], 200);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'success' => true,
            'message' => 'category deleted successfully'
        ], 200);
    }
}
