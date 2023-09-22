<?php

namespace App\Http\Controllers\Shop\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class HomePageController extends Controller
{
    public function index(): Response
    {
        $products = Product::all(); # TODO : change to pagination

        return Inertia::render('Shop/Home', [
            'isAuthenticated' => Auth::check(),
            'isAdmin' => User::isAdmin(Auth::user()),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'products' => $products,
        ]);
    }
}
