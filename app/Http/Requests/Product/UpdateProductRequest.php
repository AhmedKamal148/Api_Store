<?php

namespace App\Http\Requests\Product;

use App\Models\Products;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(Products $products): array
    {
        return array_merge(
            $products::Create_Product_Rules(),
            $products::Find_Product_By_ProductId());
    }
}
