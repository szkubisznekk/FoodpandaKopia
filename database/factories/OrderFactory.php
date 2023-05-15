<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'status_id' => \App\Models\Status::inRandomOrder()->first()->id,
            'order_time' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
            'payment_method_id' => \App\Models\PaymentMethod::inRandomOrder()->first()->id,
            'postal_code' => $this->faker->numberBetween(1000, 9999),
            'city' => $this->faker->city(),
            'address' => $this->faker->streetaddress(),
            'phone_number' => $this->faker->e164PhoneNumber(),
            'courier_id' => \App\Models\Courier::inRandomOrder()->first()->id,
        ];
    }
}
