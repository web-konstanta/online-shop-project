<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }

    public function addIndexesToOrderProducts(array $indexes, array $sizes): void
    {
        OrderProduct::query()
            ->where('order_id', $this->id)
            ->get()
            ->each(function ($order) use ($indexes, $sizes) {
            $order->update([
                'products_count' => $indexes[$order->product_id],
                'product_size' => $sizes[$order->product_id]
            ]);
        });
    }

    public function orderStatus(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'status', 'id');
    }

    public function orderProductCount(int $productId): int
    {
        return OrderProduct::query()
            ->where('order_id', $this->id)
            ->where('product_id', $productId)
            ->first()
            ->products_count;
    }

    public function getTotalOrderPrice(): int
    {
        $total = 0;

        foreach ($this->products as $product) {
            $total += $product->price * $this->orderProductCount($product->id);
        }

        return $total;
    }
}
