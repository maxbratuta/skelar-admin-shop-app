<?php

namespace App\Http\Controllers\Shop\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\AuthResource;
use App\Http\Resources\FilterResource;
use App\Http\Resources\Shop\Product\ProductResource;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use Infrastructure\Persistence\Eloquent\Models\Product;

class ProductPageController extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    public function show(Request $request, Product $product): Response
    {
        $authResource = (new AuthResource([
            'can_login' => Route::has('login'),
            'can_register' => Route::has('register'),
        ]))->toArray($request);

        $filter = (new FilterResource())->toArray();

        $response = array_merge([
            'product' => (new ProductResource(Product::findOrFail($product->id)))->toArray($request),
        ], $authResource, $filter);

        return Inertia::render('Shop/Product/Show', $response);
    }
}
