<?php

namespace Tests\Helpers;

use Modules\Projects\Models\Project;
use Modules\Projects\UseCases\ProjectUseCase;

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
