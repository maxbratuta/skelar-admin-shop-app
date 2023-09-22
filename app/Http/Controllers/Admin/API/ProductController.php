<?php

namespace App\Http\Controllers\Admin\API;

use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController
{
    public function update(Request $request, Product $product): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        try {
            $product->update([
                'name' => $request->input('name'),
                'image' => $request->input('image'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
            ]);

            return response()->json([
                'status' => true,
                'data' => [],
                'message' => 'The product has been updated successfully'
            ]);
        } catch (Exception $e) { # TODO : ProductUpdateException
            return response()->json([
                    'status' => true,
                    'errors' => [],
                    'message' => 'Failed to update product. Try again.'
            ], 500);
        }
    }
}
