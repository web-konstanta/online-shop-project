<?php

namespace App\Services\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderService extends Controller
{
    public function make(array $data): void
    {
        $basketProducts = session()->get('basketProducts');
        $basketProductsSizes = session()->get('productSizes');

        $user = auth()->user();
        $orderData = array_merge($data, ['user_id' => $user ? $user->id : 0]);

        $order = Order::query()->create($orderData);

        if ($basketProducts) {
            $productsIds = array_keys($basketProducts);
            $order->products()->attach($productsIds);
            $order->addIndexesToOrderProducts($basketProducts, $basketProductsSizes);
        }

        session()->forget('basketProducts');
        session()->forget('productSizes');
    }
}
