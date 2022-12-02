<?php

namespace App\Http\Repositories\Api;

use App\Http\Interfaces\Api\OrderItemsInterface;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\CheckOutMethods;
use App\Models\OrderItems;

class OrderItemsRepository implements OrderItemsInterface
{
    use ApiResponse, CheckOutMethods;

    private $orderItemsModel;

    public function __construct(OrderItems $orderItemsModel)
    {
        $this->orderItemsModel = $orderItemsModel;

    }

    public function index()
    {
        $orderItems = $this->orderItemsModel::all();
        if ($orderItems->count() > 0) {
            return $this->apiResponse(200, 'All Items Founded', null, $orderItems);
        }
        return $this->apiResponse(404, 'No  Items created Yet !');
    }


}