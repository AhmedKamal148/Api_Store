<?php

namespace App\Http\Interfaces\Api;

interface OrderInterface
{
    public function index();

    public function checkOut($request);
}