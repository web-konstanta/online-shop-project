<?php

namespace App\Http\Controllers\Backend\V1\Order;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Order\OrderRequest;
use Illuminate\Http\JsonResponse;

class OrderController extends BaseController
{
    public function makeOrder(OrderRequest $request): JsonResponse
    {
        $data = $request->validated();

        $this->orderService->make($data);

        return response()->json([
            'message' => 'Заказ оформлен успешно'
        ], 201);
    }
}
