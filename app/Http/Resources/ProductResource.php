<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock
        ];
    }
}
