<?php

namespace App\QueryBuilders;

use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class ProductQueryBuilder
{
    public function paginate(int $perPage = 10): Paginator
    {
        return $this->all()->paginate($perPage);
    }

    private function all(): Builder
    {
        return Product::orderByDesc('id');
    }
}
