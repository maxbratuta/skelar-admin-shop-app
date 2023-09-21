<?php

use App\Http\Controllers\Admin\Web\ProductPageController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    'middleware' => AdminMiddleware::class,
], function () {
        # Home
        Route::get('/', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('dashboard.index');

        # Products
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductPageController::class, 'index'])->name('products.index');
            Route::get('/{product}', [ProductPageController::class, 'show'])->name('products.show');
            Route::get('/{product}/edit', [ProductPageController::class, 'edit'])->name('products.edit');
        });
});


Route::group([
    'namespace' => 'Admin\API',
    'prefix' => 'api',
    'as' => 'admin.api.',
], function () {
    //
});
