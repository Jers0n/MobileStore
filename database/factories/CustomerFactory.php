<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'cust_phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
            'postcode' => $this->faker->postcode,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
        ];
    }
}
