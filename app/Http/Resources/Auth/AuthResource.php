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
                'canLogin' => $this->resource['canLogin'] ?? false,
                'canRegister' => $this->resource['canRegister'] ?? false,
            ], $this->authService->getData())
        ];
    }
}
