<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Modules\Projects\Models\Project;

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
