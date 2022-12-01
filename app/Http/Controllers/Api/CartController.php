<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\CartInterface;
use App\Http\Requests\Cart\DeleteCartRequest;
use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;

class CartController extends Controller
{
    private $CartInterface;

    public function __construct(CartInterface $CartInterface)
    {
        $this->CartInterface = $CartInterface;
    }

    public function index()
    {
        return $this->CartInterface->index();


    }

    public function store(StoreCartRequest $request)
    {

        return $this->CartInterface->store($request);

    }

    public function show($id)
    {
        return $this->CartInterface->show($id);

    }

    public function update(UpdateCartRequest $request)
    {
        return $this->CartInterface->update($request);

    }

    public function delete(DeleteCartRequest $request)
    {

        return $this->CartInterface->delete($request);

    }


}
