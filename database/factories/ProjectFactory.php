<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => fake()->uuid,
            'name' => fake()->name,
            'icon' => fake()->image,
            'is_favorites' => true,
            'status' => true,
            'priority' => true,
        ];
    }
}
