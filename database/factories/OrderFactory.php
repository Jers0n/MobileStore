<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

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
    public function definition(): array
    {
        return [
            'order_date' => $this->faker->dateTime(), // Random order date and time
            'order_delivery_date' => $this->faker->date(), // Random delivery date
            'customer_id' => function () {
                return Customer::factory()->create()->customer_id;
            },
        ];
    }
}
