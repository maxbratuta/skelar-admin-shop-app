<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Product\ProductResource;
use App\Http\Resources\Admin\Product\ProductResourceCollection;
use App\Http\Resources\FilterResource;
use App\Http\Resources\PaginatorResource;
use Domain\Services\ProductService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Infrastructure\Persistence\Eloquent\Models\Product;
use Infrastructure\Services\AuthService;

class ProductPageController extends Controller
{
    public function __construct(
        private AuthService $authService,
        private ProductService $productService
    ) {}

    public function index(Request $request): Response
    {
        $products = $this->productService->getAll(
            $request->input('search'),
            $request->input('per_page'),
            searchableFields: ['id', 'name', 'price', 'description']
        );

        $filter = (new FilterResource())->toArray();

        $response = array_merge([
            'auth' => $this->authService->getUserData(),
            'products' => (new ProductResourceCollection($products))->toArray($request),
            'meta' => (new PaginatorResource($products))->toArray($request),
        ], $filter);

        return Inertia::render('Admin/Product/Index', $response);
    }

    public function show(Request $request, Product $product): Response
    {
        return Inertia::render('Admin/Product/Show', [
            'auth' => $this->authService->getUserData(),
            'product' => (new ProductResource(Product::findOrFail($product->id)))->toArray($request)
        ]);
    }

    public function edit(Request $request, Product $product): Response
    {
        return Inertia::render('Admin/Product/Edit', [
            'auth' => $this->authService->getUserData(),
            'product' => (new ProductResource($product))->toArray($request)
        ]);
    }
}
