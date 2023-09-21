<?php

namespace App\Http\Controllers\Shop\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class HomePageController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $products = Product::all(); # TODO : change to pagination

        return Inertia::render('Shop/Home', [
            'isAuthenticated' => $user ?? false,
            'isAdmin' => User::isAdmin($user),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'products' => $products,
        ]);
    }
}
