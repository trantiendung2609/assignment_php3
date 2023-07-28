<?php

namespace Database\Factories;

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
        return [
            'name' => fake()->name(),
            'gender' => 'female',
            'price' => 100000,
            'image' => 'test.jpg',
            'description' => 'Đây là mô tả',
            'category_id' => rand(9, 0),
            'brand_id' => rand(9, 0),   //
        ];
    }
}
