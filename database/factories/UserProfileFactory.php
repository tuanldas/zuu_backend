<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Users\Models\UserProfile;

class UserProfileFactory extends Factory
{
    protected $model = UserProfile::class;

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
            'avatar' => fake()->image
        ];
    }
}
