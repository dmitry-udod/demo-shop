<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function products_list()
    {
        $productsCount = 5;
        Product::factory()->count($productsCount)->create();

        $user = User::factory()->create();
        $this->actingAs($user)->get('/products')->assertInertia(fn (Assert $page) => $page
            ->has('products.data', $productsCount)
            ->has('products.data.0', fn (Assert $page) => $page
                ->has('name')
                ->has('slug')
                ->has('price')
            )
        );
    }
}
