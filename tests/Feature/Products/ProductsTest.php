<?php

namespace Tests\Feature\Products;

use App\Data\ProductData;
use App\Models\Product;
use App\Models\User;
use App\Services\MoneyService;
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

        $this->authUserCall()->get(route('products'))->assertInertia(fn (Assert $page) => $page
            ->has('products.data', $productsCount)
            ->has('products.data.0', fn (Assert $page) => $page
                ->has('id')
                ->has('name')
                ->has('price')
            )
        );
    }

    /** @test */
    public function product_price_formatted_properly()
    {
        $product = Product::factory()->create(['price' => 10_000.01]);

        $this->authUserCall()->get(route('products'))->assertInertia(fn (Assert $page) => $page
            ->where('products.data.0.price', MoneyService::formatPrice($product->price))
        );
    }

    /** @test */
    public function create_product()
    {
        $this->authUserCall()->get('/products/create')->assertInertia(fn (Assert $page) => $page
            ->has('product.data')
            ->where('product.data.id', null)
        );
    }

    /** @test */
    public function store_product()
    {
        $this->assertCount(0, Product::all());

        $data = ProductData::from($this->product());

        $this->authUserCall()->post('/products', $data->toArray())->assertRedirectToRoute('products');

        $this->assertCount(1, Product::all());
        $this->assertEquals($data, ProductData::from(Product::first()));
    }

    /** @test */
    public function user_can_not_create_product_with_invalid_price()
    {
        $product = $this->product();
        $product['price'] = 0.01;
        $data = ProductData::from($product);

        $this->authUserCall()->post('/products', $data->toArray())->assertSessionHasErrors('price');

        $this->assertCount(0, Product::all());
    }

    /** @test */
    public function edit_product()
    {
        $product = Product::factory()->create();

        $this->authUserCall()->get("/products/{$product->id}")->assertInertia(fn (Assert $page) => $page
            ->has('product.data')
            ->where('product.data.id', $product->id)
        );
    }

    /** @test */
    public function update_product()
    {
        $product = Product::factory()->create();

        $data = ProductData::from($this->product());

        $this->authUserCall()->put("/products/{$product->id}", $data->toArray())->assertRedirectToRoute('products');

        $this->assertCount(1, Product::all());
        $this->assertEquals($data, ProductData::from(Product::first()));
    }

    private function authUserCall()
    {
        $user = User::factory()->create();

        return $this->actingAs($user);
    }

    public function product(): array
    {
        return [
            'name' => 'Samsung galaxy tab',
            'description' => 'Nice Tab',
            'price' => 99.99,
        ];
    }
}
