<?php

namespace App\Http\Requests\Product;

use App\Models\Products;
use Illuminate\Foundation\Http\FormRequest;

class ShowProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(Products $product): array
    {
        return $product::ProductId_Rule();
    }
}
