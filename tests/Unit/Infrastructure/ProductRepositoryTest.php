<?php

namespace Tests\Unit\Infrastructure;

use App\Exceptions\Admin\ProductException;
use Domain\Repositories\ProductRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Infrastructure\Persistence\Eloquent\Models\Product;
use Tests\TestCase;

class ProductRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    protected ProductRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = app(ProductRepository::class);
    }

    public function test_get_all_returns_paginator_with_search_value()
    {
        Product::factory()->create(['name' => 'TestProductName1']);
        Product::factory()->create(['name' => 'SomeAnotherProductName']);

        $products = $this->repository->getAll('TestProduct', 10, ['name']);

        $this->assertCount(1, $products);
        $this->assertEquals('TestProductName1', $products[0]->name);
    }

    public function test_update_successfully_updates_product()
    {
        $product = Product::factory()->create(['name' => 'OriginalName']);

        $updatedProduct = $this->repository->update(['name' => 'UpdatedName'], $product);

        $this->assertEquals('UpdatedName', $updatedProduct->fresh()->name);
    }

    public function test_update_throws_product_exception_on_failure()
    {
        $this->expectException(ProductException::class);

        $product = new Product();

        $this->repository->update(['name' => 'ShouldFail'], $product);
    }
}
