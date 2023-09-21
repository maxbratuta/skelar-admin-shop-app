<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Product/Index', [
            'products' => Product::paginate(3)->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'price' => $user->price,
                    'description' => $user->description,
                ];
            })
        ]);

    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return Inertia::render('Product/Show', ['product' => $product]);
    }
}
