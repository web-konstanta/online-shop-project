<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderStatus(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'status', 'id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }

    public function orderProduct(int $productId): object
    {
        return OrderProduct::query()
            ->where('order_id', $this->id)
            ->where('product_id', $productId)
            ->first();
    }

    private function orderProducts(): Collection
    {
        return OrderProduct::query()
            ->where('order_id', $this->id)
            ->get();
    }

    public function getTotalOrderPrice(): float
    {
        $total = 0;

        foreach ($this->products as $key => $product) {
            $total += $product->price * $this->orderProducts()[$key]->products_count;
        }

        return $total;
    }

    public function statuses(): Collection
    {
        return OrderStatus::all();
    }
}
