<?php

namespace App\Http\Interfaces\Api;

interface ProductsInterface
{
    public function index();

    public function store($request);

    public function show($request);

    public function update($request);

    public function delete($request);

}