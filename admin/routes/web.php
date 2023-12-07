<?php

use App\Http\Controllers\Admin\Subcategory\SubCategoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Account\AccountController;
use App\Http\Controllers\Admin\Contact\ContactController;
use App\Http\Controllers\Admin\Size\SizeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware('auth.protect')->group(function () {
    Route::get('/register', [RegisterController::class, 'registerView'])->name('register-view');
    Route::get('/login', [LoginController::class, 'loginView'])->name('login-view');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::get('/logout', LogoutController::class)->name('logout');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', AdminController::class)->name('index');
    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        Route::get('/', [AccountController::class, 'settings'])->name('settings');
        Route::get('/reset-password', [AccountController::class, 'resetPassword'])->name('reset-password');

        Route::put('/settings', [AccountController::class, 'updateSettings'])->name('update-settings');
        Route::put('/update-password', [AccountController::class, 'updatePassword'])->name('update-password');
    });
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/create', [ProductController::class, 'store'])->name('store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{product}/update', [ProductController::class, 'update'])->name('update');
        Route::get('/{product}', [ProductController::class, 'show'])->name('show');
        Route::delete('/{product}/delete', [ProductController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'size', 'as' => 'size.'], function () {
        Route::get('/', [SizeController::class, 'index'])->name('index');
        Route::get('/create', [SizeController::class, 'create'])->name('create');
        Route::post('/store', [SizeController::class, 'store'])->name('store');
        Route::get('/{size}/edit', [SizeController::class, 'edit'])->name('edit');
        Route::patch('/{size}/update', [SizeController::class, 'update'])->name('update');
        Route::delete('/{size}/delete', [SizeController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/create', [CategoryController::class, 'store'])->name('store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{category}/update', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{category}/delete', [CategoryController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'subcategory', 'as' => 'subcategory.'], function () {
        Route::get('/', [SubCategoryController::class, 'index'])->name('index');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('create');
        Route::post('/create', [SubCategoryController::class, 'store'])->name('store');
        Route::get('/{subCategory}/edit', [SubCategoryController::class, 'edit'])->name('edit');
        Route::put('/{subCategory}/update', [SubCategoryController::class, 'update'])->name('update');
        Route::delete('/{subCategory}/delete', [SubCategoryController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/{order}', [OrderController::class, 'show'])->name('show');
        Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('edit');
        Route::put('/{order}/update', [OrderController::class, 'update'])->name('update');
        Route::delete('/{order}/destroy', [OrderController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::get('/', [ContactController::class, 'contactView'])->name('view');
        Route::put('/update', [ContactController::class, 'contactUpdate'])->name('update');
    });
});
