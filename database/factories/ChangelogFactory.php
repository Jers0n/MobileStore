<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Changelog>
 */
class ChangelogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get the users with the utype 'ADM'
        $adminUsers = User::where('utype', 'ADM')->get();
        
        // Creating admin user for the changelog factory if there's no users found in the database
        if ($adminUsers->isEmpty()) 
        {
            $adminUser = User::factory()->create(['utype' => 'ADM']);
        } 
        else 
        {
            $adminUser = $adminUsers->random();
        }

        return [
            'changelog_id' => $this->faker->numberBetween(1, 1000),
            'date_created' => $this->faker->dateTime(),
            'date_last_modified' => $this->faker->dateTime(),
            'user_id' => $adminUser->user_id,
            'product_id' => Product::inRandomOrder()->first()->product_id,
        ];
    }
}
