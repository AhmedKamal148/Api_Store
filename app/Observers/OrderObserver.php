<?php

namespace App\Observers;

use App\Http\Traits\ApiResponse;
use App\Models\Order;
use App\Models\OrderItems;

class OrderObserver
{
    use ApiResponse;

    public function created(Order $order)
    {
        $order = $order->with('cart')->first();

        $this->createOrderItems($order);


    }


    public function updated(Order $order)
    {
        //
    }


    public function deleted(Order $order)
    {
        //
    }


    public function restored(Order $order)
    {
        //
    }


    public function forceDeleted(Order $order)
    {
        //
    }

    private function createOrderItems($order)
    {
        foreach ($order->cart as $cart) {
            $orderItems = OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'count' => $cart->count,
                'unit_price' => $cart->products->price,
                'net_price' => $cart->count * $cart->products->price,

            ]);
        }
    }
}
