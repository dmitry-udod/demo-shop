<?php

namespace App\Http\Resources\Products;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductInListResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Product $product */
        $product = $this->resource;

        return [
            'name' => $product->name,
            'price' => $product->price,
            'slug' => $product->slug,
        ];
    }
}
