<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginatorResource extends JsonResource
{
    /** @var LengthAwarePaginator */
    public $resource;

    public function __construct(AbstractPaginator $resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request = null): array
    {
        return [
            'total' => $this->resource->total(),
            'current_page' => $this->resource->currentPage(),
            'last_page' => $this->resource->lastPage(),
            'per_page' => $this->resource->perPage(),
        ];
    }
}
