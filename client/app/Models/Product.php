<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public static function getBasketProducts(): Collection
    {
        $basketProducts = session()->get('basketProducts');

        return $basketProducts ? self::query()
            ->orderBy('created_at', 'DESC')
            ->whereIn('id', array_keys($basketProducts))
            ->get() : collect();
    }

    public static function getTotalBasketPrice(): float
    {
        $total = 0;
        $basketProducts = session()->get('basketProducts');

        foreach (self::getBasketProducts() as $product) {
            $total += $product->price * $basketProducts[$product->id];
        }

        return $total;
    }

    public static function getBasketProductsCount(): int
    {
        $basketProducts = session()->get('basketProducts');
        return $basketProducts ? array_sum($basketProducts) : 0;
    }

    public function getImage(): string
    {
        return $this->image ? env('ADMIN_URL') . '/storage/' . $this->image : asset('icons/no-photo.png');
    }

    public static function getProductsBySearch(string $search, string $column): LengthAwarePaginator
    {
        return self::query()
            ->where($column, 1)
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('code', 'LIKE', "%{$search}%");
            })->paginate(10);
    }
}
