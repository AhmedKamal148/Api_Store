<?php

namespace App\Observers;

use App\Http\Traits\ApiResponse;
use App\Http\Traits\OrderMethods;
use App\Models\Order;

class OrderObserver
{
    use ApiResponse, OrderMethods;

    public function created(Order $order)
    {
        $order = $order->with('user')->first();
        $this->createOrderItems($order);
        $this->updateProductStock($order);
        $this->delete_Order_cart($order);
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


}
