<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // database/factories/OrderFactory.php
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first() ?? Product::factory()->create();

        return [
            'product_id' => $product->id,
            'customer_name' => $this->faker->name,
            'status' => $this->faker->randomElement(['new', 'completed']),
            'comment' => $this->faker->optional()->sentence,
            'created_at' => $this->faker->dateTimeBetween('-30 days'),
            'total_price' => $product->price,
        ];
    }

}
