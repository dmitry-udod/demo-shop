<?php

namespace App\Http\Controllers\Products;

use App\Actions\Products\ProductCreateAction;
use App\Actions\Products\ProductUpdateAction;
use App\Data\ProductData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Http\Resources\Products\ProductInListResource;
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
        //
    }

    public function store(StoreProductRequest $request, ProductCreateAction $action)
    {
        $data = ProductData::from($request->validated());

        $action->execute($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    public function update(UpdateProductRequest $request, Product $product, ProductUpdateAction $action)
    {
        $data = ProductData::from($request->validated());

        $action->execute($product, $data);
    }
}
