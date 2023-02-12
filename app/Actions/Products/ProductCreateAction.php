<?php

namespace App\Actions\Products;

use App\Data\ProductData;
use App\Models\Product;

class ProductCreateAction
{
    public function execute(ProductData $data): Product
    {
        $product = new Product();
        $product->description = $data->description;
        $product->name = $data->name;
        $product->price = $data->price;
        $product->save();

        return $product;
    }
}
