<?php

namespace Database\Factories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'seller_id' => fn ($attributes) => data_get($attributes, 'seller_id', Seller::factory()->create()->id),
            'sale_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'sale_value' => fake()->randomFloat(2, 100, 1000),
        ];
    }
}
