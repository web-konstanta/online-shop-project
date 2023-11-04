<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\UpdateRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::query()
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.order.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        return view('admin.order.show', compact('order'));
    }

    public function edit(Order $order): View
    {
        return view('admin.order.edit', compact('order'));
    }

    public function update(Order $order, UpdateRequest $request): RedirectResponse
    {
        $order->update($request->validated());
        session()->flash('success', 'Заказ № ' . $order->id . ' успешно обновлен');
        return redirect()->route('admin.order.index');
    }

    public function destroy(Order $order): RedirectResponse
    {
        session()->flash('success', 'Заказ № ' . $order->id . ' успешно удален');
        $order->delete();
        return redirect()->back();
    }
}
