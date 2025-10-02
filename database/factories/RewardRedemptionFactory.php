<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Reward;
use Illuminate\Database\Eloquent\Factories\Factory;

class RewardRedemptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'reward_id' => Reward::factory(),
            'points_used' => $this->faker->numberBetween(100, 5000),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'notes' => $this->faker->sentence(),
            'redeemed_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'processed_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
