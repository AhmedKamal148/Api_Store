<?php

namespace App\Http\Repositories\Api;

use App\Http\Interfaces\Api\AuthInterface;
use App\Http\Traits\ApiResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthRepository implements AuthInterface
{
    use ApiResponse;

    public function register($request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        return $this->apiResponse(200, 'Register Successfully', null, $user);


    }

    public function login($request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('_token')->plainTextToken;
            $user['token'] = $token;

            return $this->apiResponse(200, 'Login Successfully', null, $user);
        } else {

            return $this->apiResponse(400, 'Login Failed try Again');
        }

    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->apiResponse(200, 'Logged Out');
    }
}