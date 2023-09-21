<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index()
    {
        return [
            'home_page'
        ];
    }
}
