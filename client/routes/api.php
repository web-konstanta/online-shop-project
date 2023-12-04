<?php

use App\Http\Controllers\Backend\V1\Basket\BasketController;
use App\Http\Controllers\Backend\V1\Order\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('basket')->group(function () {
        Route::post('/add/{productId}', [BasketController::class, 'add']);
        Route::post('/remove/{productId}', [BasketController::class, 'remove']);
        Route::post('/delete/{productId}', [BasketController::class, 'delete']);
        Route::post('/sizes', [BasketController::class, 'sizes']);
    });

    Route::prefix('order')->group(function () {
        Route::post('/create', [OrderController::class, 'makeOrder']);
    });
});
