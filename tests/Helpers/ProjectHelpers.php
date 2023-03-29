<?php

namespace Tests\Helpers;

use App\Models\Project;
use App\UseCase\Projects\ProjectUseCase;

trait ProjectHelpers
{
    public function mockProjectUsecase()
    {
        return $this->getMockBuilder(ProjectUseCase::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function createProject($userId): Project
    {
        return Project::factory()->create([
            'owner' => $userId
        ]);
    }
}
