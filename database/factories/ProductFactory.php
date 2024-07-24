<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Feature;
use App\Models\Brand;
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
     */
    public function definition(): array
    {
        $product_name = $this->faker->unique()->words($nb=2,$asText = true);
        $slug = Str::slug($product_name);
        $image_name =$this->faker->numberBetween(1,24).'.jpg';

        // Get a random Brand and Category
        $brand = Brand::inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();

        $feature = Feature::factory()->create();


        $product = [
            'name' => Str::title($product_name),
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(1,22),
            'SKU' => 'SMD'.$this->faker->numberBetween(100,500),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(100,200),
            'image' => $image_name,
            'images' => $image_name,
            'created_at' => now(),
            'updated_at' => now(),
            'category_id' => Category::inRandomOrder()->first()->category_id,
            'brand_id' => Brand::inRandomOrder()->first()->brand_id,
            
        ];

        // Create a new feature and attach it to the product
        $feature = Feature::factory()->create();
        $product['feature_id'] = $feature->feature_id;

        return $product;
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            // Attach multiple features to the product
            $features = Feature::factory()->create();
            $product->features()->attach($features);
        });
    }
}