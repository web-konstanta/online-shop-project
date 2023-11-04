<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = Category::query()
            ->pluck('id')
            ->toArray();

        return [
            'name' => fake()->name,
            'price' => rand(100, 10000),
            'description' => fake()->text,
            'characters' => fake()->text,
            'code' => 111111,
            'category_id' => fake()->randomElement($categoryIds),
            'top_sales' => rand(0, 1),
            'is_new' => rand(0, 1)
        ];
    }
}
