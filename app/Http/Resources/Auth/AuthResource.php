<?php

namespace App\Http\Resources\Auth;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Resources\Json\JsonResource;
use Infrastructure\Services\AuthService;

class AuthResource extends JsonResource
{
    /** @var array */
    public $resource;

    private AuthService $authService;

    /**
     * @throws BindingResolutionException
     */
    public function __construct($resource)
    {
        $this->authService = app()->make(AuthService::class);

        parent::__construct($resource);
    }

    public function toArray($request = null): array
    {
        return [
            'auth' => array_merge([
                'can_login' => $this->resource['can_login'] ?? false,
                'can_register' => $this->resource['can_register'] ?? false,
            ], $this->authService->getData())
        ];
    }
}
