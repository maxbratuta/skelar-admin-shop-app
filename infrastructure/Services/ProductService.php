<?php

namespace Infrastructure\Services;

use Domain\Repositories\ProductRepository;

class ProductService
{
    public function __construct(protected ProductRepository $productRepository) {}
}
