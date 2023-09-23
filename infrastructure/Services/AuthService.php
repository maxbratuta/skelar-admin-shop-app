<?php
namespace Infrastructure\Services;

use App\Http\Resources\Auth\UserResource;
use Illuminate\Support\Facades\Auth;
use Infrastructure\Persistence\Eloquent\Models\User;

class AuthService
{
    public function getData(): array
    {
        /** @var User $user */
        $user = Auth::user();

        return array_merge([
            'isAuthenticated' => Auth::check(),
            'isAdmin' => User::isAdmin($user)
        ], $this->getUserData($user));
    }

    public function getUserData(?User $user = null): array
    {
        $user = $user ?? Auth::user(); # This is workaround with Laravel Auth login

        return [
            'user' => $user ? (new UserResource($user))->toArray() : null
        ];
    }
}
