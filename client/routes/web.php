<?php

use App\Http\Controllers\Frontend\Product\ProductController;
use App\Http\Controllers\Frontend\Category\CategoryController;
use App\Http\Controllers\Frontend\Basket\BasketController;
use App\Http\Controllers\Frontend\Order\OrderController;
use App\Http\Controllers\Frontend\Info\InfoController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Frontend\Cabinet\CabinetController;
use App\Http\Controllers\Frontend\Cabinet\OrderController as OrderCabinetController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.protect')->group(function () {
    Route::get('/register', [AuthController::class, 'registerView'])->name('register-view');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::as('product.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('show');
    Route::get('/top_sales', [ProductController::class, 'topSales'])->name('top-sales');
    Route::get('/new', [ProductController::class, 'newProducts'])->name('new');
});

Route::group(['prefix' => 'basket', 'as' => 'basket.'], function () {
    Route::get('/', [BasketController::class, 'index'])->name('index');
});

Route::group(['middleware' => 'order', 'prefix' => 'order', 'as' => 'order.'], function () {
    Route::get('/create', OrderController::class)->name('index');
});

Route::group(['middleware' => 'auth', 'prefix' => 'cabinet', 'as' => 'cabinet.'], function () {
    Route::get('/', [CabinetController::class, 'index'])->name('index');

    Route::group(['prefix' => 'personal', 'as' => 'personal.'], function () {
        Route::get('/', [CabinetController::class, 'personalDataView'])->name('index');
        Route::put('/update', [CabinetController::class, 'personalDataUpdate'])->name('update');
    });

    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/', [OrderCabinetController::class, 'index'])->name('index');
        Route::get('/{order}', [OrderCabinetController::class, 'show'])->name('show');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'products', 'as' => 'category.'], function () {
    Route::get('/{code}', [CategoryController::class, 'products'])->name('products');
    Route::get('/{categoryCode}/{subCategoryCode}', [CategoryController::class, 'subCategoryProduct'])->name('sub_category-products');
});

Route::get('/contacts', [InfoController::class, 'contacts'])->name('contacts');
