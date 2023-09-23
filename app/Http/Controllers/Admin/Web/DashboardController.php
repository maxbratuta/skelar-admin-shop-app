<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Infrastructure\Services\AuthService;

class DashboardController extends Controller
{
    public function __construct(private AuthService $authService) {}

    public function index(): Response
    {
        return Inertia::render('Admin/Dashboard', [
            'auth' => $this->authService->getUserData(),
        ]);
    }
}
