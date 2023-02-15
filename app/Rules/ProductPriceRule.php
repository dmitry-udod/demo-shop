<?php

namespace App\Rules;

use App\Models\Product;
use Illuminate\Contracts\Validation\Rule;

class ProductPriceRule implements Rule
{
    private string $msg = 'Invalid price';

    public function passes($attribute, $value)
    {
        $price = (float) $value;

        $minPrice = Product::PRODUCT_MIN_PRICE;
        if ($price < $minPrice) {
            $this->msg = "Product price must be greater than $minPrice";

            return false;
        }

        $maxPrice = Product::PRODUCT_MAX_PRICE;
        if ($price > $maxPrice) {
            $this->msg = "Product price must be less than $maxPrice";

            return false;
        }

        return true;
    }

    public function message(): string
    {
        return $this->msg;
    }
}
