<?php

namespace App\Http\Resources\Auth;

use Infrastructure\Persistence\Eloquent\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /** @var User */
    public $resource;

    public function __construct(User $resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request = null): array
    {
        return [
            'name' => $this->resource->name,
            'email' => $this->resource->email
        ];
    }
}
