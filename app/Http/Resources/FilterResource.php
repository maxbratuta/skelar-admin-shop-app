<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilterResource extends JsonResource
{
    public $resource;

    public function __construct($resource = null)
    {
        parent::__construct($resource);
    }

    public function toArray($request = null): array
    {
        $searchValue = $request ? implode(', ', $request->only(['search'])) : '';

        return [
            'filters' => [
                'search_value' => $searchValue,
            ],
        ];
    }
}
