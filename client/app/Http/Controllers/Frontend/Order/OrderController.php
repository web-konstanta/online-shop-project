<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function __invoke(): View
    {
        $totalPrice = Product::getTotalBasketPrice();
        $productsCount = Product::getBasketProductsCount();
        return view('order.index', compact('totalPrice', 'productsCount'));
    }
}
