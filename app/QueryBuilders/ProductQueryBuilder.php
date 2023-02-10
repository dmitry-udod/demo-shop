<?php

namespace App\QueryBuilders;

use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class ProductQueryBuilder
{
    public function getAll(): Builder
    {
        return Product::orderByDesc('id');
    }

    public function paginate(int $perPage = 15): Paginator
    {
        return $this->getAll()->paginate($perPage);
    }
}
