<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::truncate();

        $products = collect(json_decode(file_get_contents(database_path('seeders/_data/products.json'))));

        $products->each(fn($product) => Product::factory()->create([
            'description' => $product->description,
            'name' => $product->productName,
            'price' => (double) $product->price,
        ]));
    }
}
