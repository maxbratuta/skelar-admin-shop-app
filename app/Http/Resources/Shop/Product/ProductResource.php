<?php

namespace App\Http\Resources\Shop\Product;

use Illuminate\Http\Resources\Json\JsonResource;
use Infrastructure\Persistence\Eloquent\Models\Product;

class ProductResource extends JsonResource
{
    /** @var Product */
    public $resource;

    public function __construct(Product $resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request = null): array
    {
        return [
            'name' => $this->resource->name,
            'image' => $this->resource->image,
            'price' => $this->resource->price,
            'description' => $this->resource->description
        ];
    }
}
