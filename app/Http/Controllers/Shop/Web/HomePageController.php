<?php

namespace App\Http\Controllers\Shop\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\AuthResource;
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
            searchValue: $request->input('search')
        );

        $authResource = (new AuthResource([
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]))->toArray($request);

        $response = array_merge([
            'products' => (new ProductResourceCollection($products))->toArray($request),
            'meta' => (new PaginatorResource($products))->toArray(),
        ], $authResource);

        return Inertia::render('Shop/Home', $response);
    }
}
