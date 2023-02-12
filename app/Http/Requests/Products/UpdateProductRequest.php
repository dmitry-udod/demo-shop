<?php

namespace App\Http\Requests\Products;

use App\Rules\ProductPriceRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'description' => ['nullable', 'string', 'max:10000'],
            'price' => ['required', 'numeric', new ProductPriceRule()],
        ];
    }
}
