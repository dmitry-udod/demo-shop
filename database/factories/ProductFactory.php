<?php

namespace Database\Factories;

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
            'price' => $this->faker->randomFloat(min: 0.1, max: 100_000),
        ];
    }
}
