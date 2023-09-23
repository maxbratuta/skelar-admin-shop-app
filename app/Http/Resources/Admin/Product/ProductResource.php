<?php

namespace App\Http\Resources\Admin\Product;

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
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'image' => $this->resource->image,
            'price' => $this->resource->price,
            'description' => $this->resource->description,
            'created_at' => $this->resource->created_at->toDateTimeString(),
            'updated_at' => $this->resource->updated_at->toDateTimeString()
        ];
    }
}
