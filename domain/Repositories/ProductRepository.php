<?php

namespace Domain\Repositories;

use Illuminate\Pagination\AbstractPaginator;
use Infrastructure\Persistence\Eloquent\Models\Product;

interface ProductRepository
{
    public function getAll(?string $searchValue, int $perPage, array $columns = ['*']): AbstractPaginator;

    public function update(array $data, Product $record, array $columns = ['*']): Product;
}
