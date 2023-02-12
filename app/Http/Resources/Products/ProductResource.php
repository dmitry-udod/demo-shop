<?php

namespace App\Http\Resources\Products;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Product $product */
        $product = $this->resource;

        return [
            'description' => $product->description,
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
        ];
    }
}
