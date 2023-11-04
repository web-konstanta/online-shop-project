<?php

namespace App\Http\Controllers\Frontend\Basket;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class BasketController extends Controller
{
    public function index(): View
    {
        $basketProducts = session()->get('basketProducts');
        $totalBasketPrice = Product::getTotalBasketPrice();
        $products = Product::getBasketProducts();
        return view('basket.index', [
            'basketProducts' => $basketProducts,
            'totalBasketPrice' => $totalBasketPrice,
            'products' => $products
        ]);
    }
}
