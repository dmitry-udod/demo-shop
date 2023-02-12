<?php

namespace App\Actions\Products;

use App\Data\ProductData;
use App\Models\Product;

class ProductUpdateAction
{
    public function execute(Product $product, ProductData $data): Product
    {
        $product->description = $data->description;
        $product->name = $data->name;
        $product->price = $data->price;
        $product->save();

        return $product;
    }
}
