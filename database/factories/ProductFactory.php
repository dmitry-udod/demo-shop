<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'description' => $this->faker->paragraph,
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(min: Product::PRODUCT_MIN_PRICE, max: Product::PRODUCT_MAX_PRICE),
        ];
    }
}
