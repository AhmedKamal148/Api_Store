<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\ProductsInterface;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductsController extends Controller
{
    private $ProductsInterface;

    public function __construct(ProductsInterface $ProductsInterface)
    {
        $this->ProductsInterface = $ProductsInterface;
    }

    public function index()
    {
        return $this->ProductsInterface->index();
    }

    public function store(StoreProductRequest $request)
    {
        return $this->ProductsInterface->store($request);

    }

    public function show($id)
    {
        return $this->ProductsInterface->show($id);

    }

    public function update(UpdateProductRequest $request)
    {
        return $this->ProductsInterface->update($request);

    }


    public function delete($request)
    {
        return $this->ProductsInterface->delete($request);

    }

}
