<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Feature;
use App\Models\Changelog;
use App\Models\Order;
use App\Models\OrderDetail;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Brand::factory(6)->create();
        Category::factory(6)->create();
        Product::factory(24)->create();
        Customer::factory(5)->create();
        Changelog::factory(10)->create();
        Order::factory(15)->create();
        OrderDetail::factory(15)->create();
    }
}
