<?php

namespace App\Http\Controllers\Backend\V1\Basket;

use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;

class BasketController extends BaseController
{
    public function add(int $productId): JsonResponse
    {
        if (!$this->basketService->isActiveProduct($productId)) {
            return response()->json([
                'error' => [
                    'message' => 'Товар не доступен'
                ]
            ], 422);
        }

        return response()->json(
            $this->basketService->addProduct($productId)
        );
    }

    public function remove(int $productId): JsonResponse
    {
        return response()->json(
            $this->basketService->removeProduct($productId)
        );
    }

    public function delete(int $productId): JsonResponse
    {
        return response()->json(
            $this->basketService->deleteProduct($productId)
        );
    }
}
