<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 *
 */
class OrderFactory extends Factory
{
    protected $model = \App\Models\Order::class;

    public function definition()
    {
        $statuses = ['pending', 'in_progress', 'completed', 'cancelled'];
        return [
            'user_id' => User::factory(),
            'pickup_address' => $this->faker->address(),
            'delivery_address' => $this->faker->address(),
            'pickup_time' => $this->faker->dateTimeBetween('+1 days', '+10 days'),
            'delivery_time' => $this->faker->dateTimeBetween('+11 days', '+20 days'),
            'weight' => $this->faker->randomFloat(2, 1, 100),
            'size' => $this->faker->randomElement(['Small', 'Medium', 'Large']),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}
