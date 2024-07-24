<?php

namespace Database\Factories;
use App\Models\Product;
use App\Models\Feature;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory>
 */
class FeatureProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => function () {
                return Product::factory()->create()->product_id;
            },
            'feature_id' => function () {
                return Feature::factory()->create()->feature_id;
            },
        ];
    }
}
