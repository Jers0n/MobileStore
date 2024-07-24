<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Order;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween(1, 10), // Random quantity between 1 and 10
            'price_sold' => $this->faker->randomFloat(2, 10, 100), // Random price between 10 and 100
            'order_number' => function () {
                return Order::inRandomOrder()->first()->order_number;
            },
            'product_id' => function () {
                return Product::inRandomOrder()->first()->product_id;
            },
        ];
    }
}
