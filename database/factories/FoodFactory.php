<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_id' => \App\Models\Restaurant::inRandomOrder()->first()->id,
            'category_id' => \App\Models\FoodCategory::inRandomOrder()->first()->id,
            'name' => $this->faker->unique()->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(1, 40000),
        ];
    }
}
