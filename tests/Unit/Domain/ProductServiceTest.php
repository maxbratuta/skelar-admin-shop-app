<?php

namespace Tests\Unit\Domain;

use Domain\Repositories\ProductRepository;
use Domain\Services\ProductService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Pagination\AbstractPaginator;
use Infrastructure\Persistence\Eloquent\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{
    use DatabaseTransactions;

    public function test_get_all_products()
    {
        $perPage = ProductService::MAX_PRODUCTS_COUNT_PER_PAGE;
        $searchValue = null;
        $searchableFields = ['name'];

        $repositoryMock = $this->createMock(ProductRepository::class);
        $paginatorMock = $this->createMock(AbstractPaginator::class);

        $repositoryMock->expects($this->once())
            ->method('getAll')
            ->with($searchValue, $perPage, $searchableFields)
            ->willReturn($paginatorMock);

        $service = new ProductService($repositoryMock);

        $result = $service->getAll($searchValue, $perPage, $searchableFields);

        $this->assertSame($paginatorMock, $result);
    }

    public function test_product_update()
    {
        $repositoryMock = $this->createMock(ProductRepository::class);

        $productService = new ProductService($repositoryMock);

        $productMock = $this->createMock(Product::class);

        $data = ['name' => 'New Name'];

        $repositoryMock->expects($this->once())
            ->method('update')
            ->with($data, $productMock)
            ->willReturn($productMock);

        $result = $productService->update($data, $productMock);

        $this->assertSame($productMock, $result);
    }
}
