<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Feature;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'weight' => $this->faker->randomFloat(2, 100, 250), // Typical weight of mobile phones in grams
            'dimensions' => $this->faker->randomFloat(2, 100, 200), // Random dimensions between 100 and 200 (assuming in millimeters)
            'OS' => $this->faker->word,
            'screensize' => $this->faker->randomFloat(2, 4, 7), // Typical screensize of mobile phones in inches
            'resolution' => $this->faker->word,
            'cpu' => $this->faker->word,
            'ram' => $this->faker->word,
            'storage' => $this->faker->word,
            'battery' => $this->faker->numberBetween(2000, 5000), // Typical battery capacity of mobile phones in mAh
            'rear_camera' => $this->faker->word,
            'front_camera' => $this->faker->word,
        ];
    }
}
