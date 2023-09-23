<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Responses\BaseApiResponse;
use Domain\Services\ProductService;
use Infrastructure\Persistence\Eloquent\Models\Product;

class ProductController extends BaseController
{
    public function __construct(private ProductService $productService)
    {
        parent::__construct();
    }

    public function update(ProductUpdateRequest $request, Product $product): BaseApiResponse
    {
        $this->productService->update($request->validated(), $product);

        return $this->response->data([], 'The product has been updated successfully.');
    }
}
