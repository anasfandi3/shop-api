<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductsResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductsResource::collection(Product::all());
        return response()->json(compact('products'));
    }

    public function store(ProductStoreRequest $request)
    {
        $validated = $request->validated();
        $product = Product::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'product created successfully',
            'product' => new ProductResource($product)
        ], 201);
    }

    public function show(Product $product)
    {
        return response()->json(['product' => new ProductResource($product)]);
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $validated = $request->validated();
        $product->update($validated);
        $product->save();
        return response()->json([
            'success' => true,
            'message' => 'product updated successfully',
            'product' => new ProductResource($product)
        ], 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'success' => true,
            'message' => 'product deleted successfully'
        ], 200);
    }
}
