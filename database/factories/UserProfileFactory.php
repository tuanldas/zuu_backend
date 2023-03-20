<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'about' => fake()->text,
            'designation' => fake()->text(10),
            'website' => fake()->url,
            'phone' => fake()->phoneNumber,
            'joining_date' => fake()->date,
        ];
    }
}
