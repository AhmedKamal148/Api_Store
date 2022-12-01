<?php

namespace App\Http\Repositories\Api;

use App\Http\Interfaces\Api\CartInterface;
use App\Http\Traits\ApiResponse;
use App\Models\Cart;

class CartRepository implements CartInterface
{
    use  ApiResponse;

    private $cartModel;

    public function __construct(Cart $cartModel)
    {
        $this->cartModel = $cartModel;
    }

    public function index()
    {
        $carts = $this->cartModel->all();
        if ($carts->count() > 0) {

            return $this->apiResponse(200, 'All Carts', null, $carts);
        }
        return $this->apiResponse(404, 'No Cart\'s Founded');


    }

    public function store($request)
    {
        $cart = Cart::where($request->except('count'))->first();
        if ($cart) {
            $cart->update(['count' => $cart->count + $request->count]);
        } else {
            $cart = $this->cartModel->create($request->all());
        }
        return $this->apiResponse(200, 'Add To Cart', null, $cart);
    }

    public function show($id)
    {
        $cart = $this->cartModel->find($id);
        if ($cart) {
            return $this->apiResponse(200, 'Cart Items', null, $cart);
        }
        return $this->apiResponse(404, 'This Cart Dosen\'t Exist');
    }

    public function update($request)
    {
        $cart = $this->cartModel->where($request->except('count'))->first();
        if ($cart) {
            $cart->update($request->all());
            return $this->apiResponse(200, 'Cart Updated Successfully!', null, $cart);
        }
        return $this->apiResponse(404, 'This Cart Dosen\'t Exist');


    }

    public function delete($request)
    {
        $cart = $this->cartModel->where($request->all())->firstOrFail();
        if ($cart) {
            $cart->delete();
            return $this->apiResponse(200, 'Delete This Item From Cart Successfully');
        }
        return $this->apiResponse(404, 'This Cart Dosen\'t Exist');
    }


}