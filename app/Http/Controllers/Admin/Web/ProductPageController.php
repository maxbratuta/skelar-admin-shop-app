<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Models\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductPageController extends Controller
{
    public function index(Request $request): Response
    {
        $query = Product::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%');
        }

        $products = $query->paginate(5)->withQueryString();

        return Inertia::render('Admin/Product/Index', [
            'products' => (new ProductResourceCollection($products))->toArray($request),
            'filters' => implode(', ', $request->only(['search'])),
            'meta' => [
                'total' => $products->total(),
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
            ]
        ]);
    }

    public function show(Request $request, Product $product): Response
    {
        return Inertia::render('Admin/Product/Show', [
            'product' => (new ProductResource($product))->toArray($request)
        ]);
    }

    public function edit(Request $request, Product $product): Response
    {
        return Inertia::render('Admin/Product/Edit', [
            'product' => (new ProductResource($product))->toArray($request)
        ]);
    }
}
