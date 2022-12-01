<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\OrderInterface;
use App\Http\Requests\Order\StoreOrderRequest;

class OrderController extends Controller
{
    private $orderInterface;

    public function __construct(OrderInterface $orderInterface)
    {
        $this->orderInterface = $orderInterface;
    }

    public function index()
    {
        return $this->orderInterface->index();
    }

    public function checkOut(StoreOrderRequest $request)
    {
        return $this->orderInterface->checkOut($request);

    }
}
