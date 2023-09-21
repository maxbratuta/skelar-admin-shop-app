<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AdminMiddleware
{
    protected Guard $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = $this->auth->user();

        if ($user && User::isAdmin($user)) {
            return $next($request);
        }

        return redirect('/');
    }
}
