<?php

namespace App\Providers;

use Domain\Repositories\ProductRepository as ProductRepositoryInterface;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Persistence\Eloquent\Repositories\ProductRepository;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTransactionDomain();
    }

    private function getConnection(string $name): ConnectionInterface
    {
        return [
            'mysql' => DB::connection('mysql'),
        ][$name];
    }


    private function registerTransactionDomain(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, function () {
            return new ProductRepository(
                $this->getConnection('mysql')
            );
        });
    }
}
