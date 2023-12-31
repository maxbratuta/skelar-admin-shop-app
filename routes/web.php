<?php

use App\Http\Controllers\Shop\Web\HomePageController;
use App\Http\Controllers\Shop\Web\ProductPageController;
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
    'namespace' => 'Shop\Web',
    'as' => 'shop.web.',
], function () {
    // Home Page
    Route::get('/', [HomePageController::class, 'index'])->name('home.index');

    # Products
    Route::prefix('products')->group(function () {
        Route::get('/{product}', [ProductPageController::class, 'show'])->name('products.show');
    });
});


require __DIR__.'/auth.php';
