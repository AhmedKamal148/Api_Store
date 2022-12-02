<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\ProductsInterface;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductsController extends Controller
{
    private $productsInterface;

    public function __construct(ProductsInterface $productsInterface)
    {
        $this->productsInterface = $productsInterface;
    }

    public function index()
    {
        return $this->productsInterface->index();
    }

    public function store(StoreProductRequest $request)
    {
        return $this->productsInterface->store($request);

    }

    public function show($id)
    {
        return $this->productsInterface->show($id);

    }

    public function update(UpdateProductRequest $request)
    {
        return $this->productsInterface->update($request);

    }


    public function delete($request)
    {
        return $this->productsInterface->delete($request);

    }

}
