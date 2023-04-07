<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Users\Models\User;
use Project;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        Project::factory()->count(10)->create([
            'owner' => $user->id
        ]);
    }
}
