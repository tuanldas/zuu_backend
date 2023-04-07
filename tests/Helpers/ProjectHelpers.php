<?php

namespace Tests\Helpers;

use Modules\Projects\UseCases\ProjectUseCase;
use Project;

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
