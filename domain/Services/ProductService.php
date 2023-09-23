<?php

namespace Domain\Services;

use Domain\Repositories\ProductRepository;
use Illuminate\Pagination\AbstractPaginator;
use Infrastructure\Persistence\Eloquent\Models\Product;

class ProductService
{
    public const MAX_PRODUCTS_COUNT_PER_PAGE = 5;

    public function __construct(protected ProductRepository $productRepository) {}

    public function getAll(string $searchValue = null): AbstractPaginator
    {
        return $this->productRepository->getAll($searchValue);
    }

    public function update(array $data, Product $record): Product
    {
        return $this->productRepository->update($data, $record);
    }
}
