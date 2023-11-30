<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $products = Product::query()
            ->orderBy('created_at', 'DESC')
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('code', 'LIKE', "%{$search}%")
            ->paginate(10);
        return view('product.index', compact('products'));
    }

    public function show(Product $product): View
    {
        return view('product.show', compact('product'));
    }

    public function newProducts(Request $request): View
    {
        $search = $request->input('search');
        $products = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->where('is_new', 1)
            ->paginate(10);
        return view('product.new', compact('products'));
    }

    public function topSales(Request $request): View
    {
        $search = $request->input('search');
        $products = Product::query()
            ->orderBy('created_at', 'DESC')
            ->where('name', 'LIKE', "%{$search}%")
            ->where('top_sales', 1)
            ->paginate(10);
        return view('product.top', compact('products'));
    }
}
