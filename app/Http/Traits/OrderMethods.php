<?php

namespace App\Http\Traits;

use App\Models\Cart;
use App\Models\OrderItems;

trait OrderMethods
{
    private function createOrderItems($order)
    {
        $carts = $this->get_Order_Cart($order);
        foreach ($carts as $cart) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'count' => $cart->count,
                'unit_price' => $cart->product->price,
                'net_price' => $cart->count * $cart->product->price,
            ]);
        }
    }

    private function updateProductStock($order)
    {
        $carts = $this->get_Order_Cart($order);

        foreach ($carts as $cart) {
            $product = $cart->product;
            $product->update([
                'stock' => $product->stock - $cart->count,
            ]);
        }
    }

    private function get_Order_Cart($order)
    {
        return $order->user->cart;
    }

    private function delete_Order_cart($order)
    {
        Cart::destroy($order->cart);
    }
}