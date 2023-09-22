<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image ?? 'https://placehold.co/250',
            'price' => $this->price,
            'description' => $this->description,
        ];
    }
}