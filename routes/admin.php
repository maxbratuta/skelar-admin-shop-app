<?php

use App\Http\Controllers\Admin\API\ProductController;
use App\Http\Controllers\Admin\Web\DashboardController;
use App\Http\Controllers\Admin\Web\ProductPageController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'namespace' => 'Admin\Web',
    'as' => 'admin.web.',
    'middleware' => [AdminMiddleware::class],
], function () {
        # Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

        # Products
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductPageController::class, 'index'])->name('products.index');
            Route::get('/{product}', [ProductPageController::class, 'show'])->name('products.show');
            Route::get('/{product}/edit', [ProductPageController::class, 'edit'])->name('products.edit');
        });
});


Route::group([
    'namespace' => 'Admin\API\v1',
    'prefix' => 'api/v1',
    'as' => 'admin.api.',
    'middleware' => [AdminMiddleware::class],
], function () {
    # Products
    Route::prefix('products')->group(function () {
        Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
    });
});
