<?php

use App\Http\Controllers\Admin\Web\HomePageController;
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
], function () {
    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/', [HomePageController::class, 'index'])->name('home.index');
    });

});


Route::group([
    'namespace' => 'Admin\API',
    'prefix' => 'api',
    'as' => 'admin.api.',
], function () {
    //
});


//Route::get('/', function () {
//    return Inertia::render('Home', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});
//
//Route::prefix('admin')->middleware('auth')->group(function () {
//    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
//});
//
//Route::middleware(['auth', 'verified'])->group(function () {
//
//    Route::get('/dashboard', function () {
//        return Inertia::render('Dashboard');
//    })->name('dashboard');
//
//    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
//    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
//
//});

//Route::get('/', function () {
//    return Inertia::render('Home', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});
//
//Route::prefix('admin')->middleware('auth')->group(function () {
//    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
//});
//
//Route::middleware(['auth', 'verified'])->group(function () {
//
//    Route::get('/dashboard', function () {
//        return Inertia::render('Dashboard');
//    })->name('dashboard');
//
//    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
//    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
//
//});
