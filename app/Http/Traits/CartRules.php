<?php

namespace App\Http\Traits;

use App\Models\Cart;
use App\Models\Products;

trait CartRules
{
    private function findCart($product)
    {
        return Cart::where([['user_id', auth()->user()->id], ['product_id', $product->id]])->first();
    }


    private function findProduct()
    {
        return Products::find(request('product_id'));
    }
}