<?php

namespace App\Http\Repositories\Api;

use App\Http\Interfaces\Api\OrderInterface;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\CheckOutMethods;
use App\Models\Cart;
use App\Models\Order;

class OrderRepository implements OrderInterface
{
    use ApiResponse, CheckOutMethods;

    private $orderModel, $cartModel;

    public function __construct(Order $orderModel, Cart $cartModel)
    {
        $this->orderModel = $orderModel;
        $this->cartModel = $cartModel;
    }

    public function index()
    {
        $orders = Order::all();
        if ($orders->count() > 0) {
            return $this->apiResponse(200, 'All Orders Founded', null, $orders);
        }
        return $this->apiResponse(404, 'No Orders Created');
    }


    public function checkOut($request)
    {
        $carts = $this->getUserCart($request);
        $total_price = $this->calculate_Total_price_of_Cart($carts);

        $order = $this->orderModel->create([
            'user_id' => $request->user_id,
            'total_price' => $total_price,
        ]);
        return $this->apiResponse(200, 'Order Create Successfully!', null, $order);

    }


}