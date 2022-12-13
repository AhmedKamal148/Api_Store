<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\OrderItemsInterface;

class OrderItemsController extends Controller
{
    private $orderItemsInterface;

    public function __construct(OrderItemsInterface $orderItemsInterface)
    {
        $this->orderItemsInterface = $orderItemsInterface;
    }

    public function index()
    {
        return $this->orderItemsInterface->index();
    }
}
