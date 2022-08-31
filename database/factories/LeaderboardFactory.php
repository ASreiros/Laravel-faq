<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LeaderboardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "username" => $this->faker->name,
            "identifier"  => Str::random(8),
            "testnumber" => rand(1, 2) > 1 ? "t1" : "t2",
            "points" => rand(0, 20),
            "statistics" => json_encode([]),
            "created_at" => now(),
        ];
    }
}
