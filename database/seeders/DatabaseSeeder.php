<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(40)->create();
        \App\Models\Restaurant::factory(6)->create();
        \App\Models\FoodCategory::factory(4)->create();
        \App\Models\Food::factory(12)->create();
        \App\Models\Status::factory(4)->create();
        \App\Models\PaymentMethod::factory(4)->create();
        \App\Models\Order::factory(16)->create();
        \App\Models\Basket::factory(10)->create();
        \App\Models\Courier::factory(8)->create();

    }
}
