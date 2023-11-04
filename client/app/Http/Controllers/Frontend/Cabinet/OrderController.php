<?php

namespace App\Http\Controllers\Frontend\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        $orders = $user->orders()->get();
        return view('cabinet.order.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        return view('cabinet.order.show', compact('order'));
    }
}
