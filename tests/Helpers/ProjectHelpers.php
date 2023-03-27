<?php

namespace Tests\Helpers;

use App\Models\Project;

trait ProjectHelpers
{
    public function createProject($userId): Project
    {
        return Project::factory()->create([
           'owner' => $userId
        ]);
    }
}
