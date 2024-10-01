<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */

    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'category_id'=> Category::get()->random()->id,
            'title'=> fake()->name(),
            'price'=> random_int(100, 1000),
            'description'=> fake()->title(),
            'quantity'=> random_int(10, 40),
        ];
    }
}
