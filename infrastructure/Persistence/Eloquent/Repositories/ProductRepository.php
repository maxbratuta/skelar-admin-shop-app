<?php

namespace Infrastructure\Persistence\Eloquent\Repositories;

use App\Exceptions\Admin\ProductException;
use Domain\Repositories\ProductRepository as ProductRepositoryInterface;
use Domain\Services\ProductService;
use Exception;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Facades\DB;
use Infrastructure\Persistence\Eloquent\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(string $searchValue = null, array $columns = ['*']): AbstractPaginator
    {
        $query = Product::query();

        if ($searchValue) {
            $query->where('name', 'like', '%' . $searchValue . '%')
                ->orWhere('description', 'like', '%' . $searchValue . '%')
                ->orWhere('price', 'like', '%' . $searchValue . '%');
        }

        return $query->paginate(ProductService::MAX_PRODUCTS_COUNT_PER_PAGE, $columns)
            ->withQueryString();
    }

    /**
     * @throws ProductException
     */
    public function update(array $data, Product $record, array $columns = ['*']): Product
    {
        DB::beginTransaction();

        try {
            $status = $record->fill($data)->save();

            if (!$status) {
                throw ProductException::failUpdate('The product update was failed.', [$record->id]);
            }

        } catch (Exception $e) {
            DB::rollBack();

            throw ProductException::failUpdate($e->getMessage(), [$record->id]);
        }

        DB::commit();

        return $record;
    }
}
