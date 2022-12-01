<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\AuthInterface;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    private $AuthInterface;

    public function __construct(AuthInterface $authInterface)
    {
        $this->AuthInterface = $authInterface;
    }

    public function register(RegisterRequest $request)
    {
        return $this->AuthInterface->register($request);
    }

    public function login(LoginRequest $request)
    {
        return $this->AuthInterface->login($request);

    }

    public function logout()
    {
        return $this->AuthInterface->logout();

    }

}
