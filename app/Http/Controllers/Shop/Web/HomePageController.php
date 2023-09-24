<?php

namespace App\Http\Controllers\Shop\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\AuthResource;
use App\Http\Resources\FilterResource;
use App\Http\Resources\PaginatorResource;
use App\Http\Resources\Shop\Product\ProductResourceCollection;
use Domain\Services\ProductService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class HomePageController extends Controller
{
    public function __construct(private ProductService $productService) {}

    /**
     * @throws BindingResolutionException
     */
    public function index(Request $request): Response
    {
        $products = $this->productService->getAll(
            $request->input('search'),
            $request->input('per_page'),
            searchableFields: ['name']
        );

        $authResource = (new AuthResource([
            'can_login' => Route::has('login'),
            'can_register' => Route::has('register'),
        ]))->toArray($request);

        $filter = (new FilterResource())->toArray();

        $response = array_merge([
            'products' => (new ProductResourceCollection($products))->toArray($request),
            'meta' => (new PaginatorResource($products))->toArray(),
        ], $authResource, $filter);

        return Inertia::render('Shop/Home', $response);
    }
}
