<?php

namespace App\Http\Resources\Products;

use App\Models\Product;
use App\Services\MoneyService;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductInListResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Product $product */
        $product = $this->resource;

        return [
            'id' => $product->id,
            'name' => $product->name,
            'price' => MoneyService::formatPrice($product->price),
        ];
    }
}
