<?php

namespace App\Observers;

use App\Http\Traits\ApiResponse;
use App\Http\Traits\OrderMethods;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderObserver
{
    use ApiResponse, OrderMethods;

    public function created(Order $order)
    {
        $order = $order->with('user')->first();

        DB::transaction(function () use ($order) {
            $this->createOrderItems($order);
            $this->updateProductStock($order);
            $this->delete_Order_cart($order);
        });
    }

}
