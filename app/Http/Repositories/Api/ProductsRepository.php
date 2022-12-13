<?php

namespace App\Http\Repositories\Api;

use App\Http\Interfaces\Api\ProductsInterface;
use App\Http\Resources\ProductResource;
use App\Http\Traits\ApiResponse;
use App\Models\Products;

class ProductsRepository implements ProductsInterface
{
    use  ApiResponse;

    private $product_Model;


    public function __construct(Products $product_Model)
    {
        $this->product_Model = $product_Model;
    }

    public function index()
    {
        $products = $this->product_Model::all();

        if ($products->count() > 0) {
            return $this->apiResponse(200, 'Data Founded', null, ProductResource::collection($products));
        }
        return $this->apiResponse(404, 'No Product\'s Founded');

    }


    public function store($request)
    {
        $product = $this->product_Model->create($request->validated());

        return $this->apiResponse(200, 'Create Product Successfully!', null, new ProductResource($product));
    }

    public function show($request)
    {
        $product = $this->product_Model->find($request->validated()['product_id']);
        if (!is_null($product)) {
            return $this->apiResponse(200, 'Product Found', null, new ProductResource($product));
        }
        return $this->apiResponse(404, 'This Product Doesn\'t Exist');
    }

    public function update($request)
    {
        $product = $this->product_Model::find($request->product_id);
        if ($product) {
            $product->update($request->validated());
            return $this->apiResponse(200, 'Updated Product Successfully', null, new ProductResource($product));
        }
        return $this->apiResponse(404, 'This Product Doesn\'t Exist');

    }

    public function delete($request)
    {
        $product = $this->product_Model::find($request->product_id);
        if ($product) {
            $product->delete();
            return $this->apiResponse(200, 'Product Deleted Successfully ');
        } else {
            return $this->apiResponse(404, 'This Product Doesn\'t Exist ');
        }


    }
}