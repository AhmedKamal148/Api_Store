<?php

namespace App\Http\Requests\Product;

use App\Models\Products;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(Products $products): array
    {
        return $products::Make_Product_Rules();
    }
}
