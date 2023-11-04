<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getBasketProducts(): Collection
    {
        $basketProducts = session()->get('basketProducts');

        return $basketProducts ? self::query()
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
}
