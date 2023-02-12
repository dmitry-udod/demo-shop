<?php

namespace App\Http\Controllers\Products;

use App\Actions\Products\ProductCreateAction;
use App\Actions\Products\ProductUpdateAction;
use App\Data\ProductData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Http\Resources\Products\ProductInListResource;
use App\Http\Resources\Products\ProductResource;
use App\Models\Product;
use App\QueryBuilders\ProductQueryBuilder;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function __construct(private ProductQueryBuilder $productQueryBuilder)
    {
    }

    public function index()
    {
        return Inertia::render('Products/Index', [
            'products' =>  ProductInListResource::collection($this->productQueryBuilder->paginate())
        ]);
    }

    public function create()
    {
        return Inertia::render('Products/Create', [
            'product' => ProductResource::make(new Product()),
        ]);
    }

    public function store(StoreProductRequest $request, ProductCreateAction $action)
    {
        $data = ProductData::from($request->validated());

        $action->execute($data);

        return to_route('products');
    }

    public function edit(Product $product)
    {
        return Inertia::render('Products/Edit', [
            'product' => ProductResource::make($product),
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product, ProductUpdateAction $action)
    {
        $data = ProductData::from($request->validated());

        $action->execute($product, $data);

        return to_route('products');
    }
}
