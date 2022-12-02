<?php

namespace App\Http\Traits;

trait CheckOutMethods
{
    private function getUserCart($request)
    {
        return $this->cartModel::where('user_id', $request->user_id)->with('product')->get();
    }

    private function calculate_Total_price_of_Cart($carts): float
    {
        $total_price = 0.0;
        foreach ($carts as $cart) {
            $total_price += ($cart->count * $cart->product->price);
        }
        return $total_price;
    }
}