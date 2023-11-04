<?php

namespace App\Services\Basket;

use App\Models\Product;

class BasketService
{
    public function addProduct(int $productId): array
    {
        $basketProducts = [];

        if (session()->has('basketProducts')) {
            $basketProducts = session()->get('basketProducts');
        }

        if (array_key_exists($productId, $basketProducts)) {
            $basketProducts[$productId]++;
        } else {
            $basketProducts[$productId] = 1;
        }

        session()->put('basketProducts', $basketProducts);

        return [
            'count' => $basketProducts[$productId],
            'basketCount' => $basketProducts ? array_sum($basketProducts) : 0,
            'totalBasketPrice' => Product::getTotalBasketPrice()
        ];
    }

    public function removeProduct(int $productId): array
    {
        $basketProducts = session()->get('basketProducts');

        if ($basketProducts) {
            unset($basketProducts[$productId]);
            session()->put('basketProducts', count($basketProducts) > 0 ? $basketProducts : null);
        }

        return [
            'basketProducts' => session()->get('basketProducts'),
            'basketCount' => $basketProducts ? array_sum($basketProducts) : 0,
            'totalBasketPrice' => Product::getTotalBasketPrice()
        ];
    }

    public function deleteProduct(int $productId): array
    {
        $basketProducts = session()->get('basketProducts');

        if ($basketProducts) {
            if (array_key_exists($productId, $basketProducts)) {
                if ($basketProducts[$productId] > 1) {
                    $basketProducts[$productId]--;
                } else {
                    $basketProducts[$productId] = 1;
                }
            }
        }

        session()->put('basketProducts', $basketProducts);

        return [
            'count' => $basketProducts ? $basketProducts[$productId] : 0,
            'basketCount' => Product::getBasketProductsCount(),
            'totalBasketPrice' => Product::getTotalBasketPrice()
        ];
    }

    public function isActiveProduct(int $productId): bool
    {
        $product = Product::query()->find($productId);
        return $product->is_active;
    }
}
