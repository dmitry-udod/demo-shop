<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const PRODUCT_MIN_PRICE = 0.10;
    const PRODUCT_MAX_PRICE = 100_000;
}
