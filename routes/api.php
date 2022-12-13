<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderItemsController;
use App\Http\Controllers\Api\ProductsController;
use Illuminate\Support\Facades\Route;


/*-- Auth Routes--*/


Route::middleware('localization')->group(function () {

    Route::group(['middleware' => 'auth:sanctum'], function () {
        /*-- Products Routes --*/
        Route::group(['prefix' => 'products', 'controller' => ProductsController::class], function () {
            Route::get('/', 'index');
            Route::post('/store', 'store');
            Route::post('/show', 'show');
            Route::post('/update', 'update');
            Route::post('/delete', 'delete');

        });
        /*-- Cart Routes --*/

        Route::group(['prefix' => 'cart', 'controller' => CartController::class], function () {
            Route::get('/', 'index');
            Route::post('/store', 'store');
            Route::get('/show/{id}', 'show');
            Route::post('/update', 'update');
            Route::post('/delete', 'delete');
        });

        /*-- Order Routes --*/
        Route::group(['prefix' => 'orders', 'controller' => OrderController::class], function () {
            Route::get('', 'index');
            Route::post('/checkOut', 'checkOut');
        });


        /*-- OrderItems Routes --*/

        Route::group(['prefix' => 'orderItems', 'controller' => OrderItemsController::class], function () {
            Route::get('', 'index');
        });

        /*-- Logout Route --*/
        Route::post('logout', [AuthController::class, 'logout']);

    });

    /*-- Auth Routes --*/
    Route::group(['controller' => AuthController::class], function () {
        Route::post('register', 'register');
        Route::post('login', 'login')->name('login');
    });

});
