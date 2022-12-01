<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductsController;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Route;


/*-- Auth Routes--*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    /*-- Products Routes--*/
    Route::controller(ProductsController::class)->group(function () {
        Route::group(['prefix' => 'products'], function () {
            Route::get('/', 'index');
            Route::post('/store', 'store');
            Route::get('/show/{id}', 'show');
            Route::post('/update', 'update');
            Route::post('/delete', 'delete');

        });
    });

    /*-- Cart Routes--*/
    Route::controller(CartController::class)->group(function () {
        Route::group(['prefix' => 'cart'], function () {
            Route::get('/', 'index');
            Route::post('/store', 'store');
            Route::get('/show/{id}', 'show');
            Route::post('/update', 'update');
            Route::post('/delete', 'delete');
        });
    });

    /*-- Order Routes--*/
    Route::controller(OrderController::class)->group(function () {
        Route::group(['prefix' => 'orders'], function () {
            Route::get('', 'index');
            Route::post('/checkOut', 'checkOut');
        });
    });

    /*-- OrderItems Routes--*/
    Route::group(['prefix' => 'orderItems'], function () {
        Route::get('', function () {
            $order = Order::where('user_id', 1)->first();
            dd($order->with('cart')->first());
            $cart = Cart::where('id', 3)->with('products')->first();
        });
    });

    /*-- Logout Route--*/
    Route::post('logout', [AuthController::class, 'logout']);

});


