<?php

namespace Tests\Unit\Projects\UseCase;

use Tests\Helpers\ProjectHelpers;
use Tests\Helpers\UserHelpers;
use Tests\TestCase;

class GetProjectsByUserIdTest extends TestCase
{
    use UserHelpers, ProjectHelpers;

    public function testCanGetProjects()
    {
        $user = $this->createUser();
        $project = $this->createProject($user->id);
        $projectUseCase = $this->newProjectUseCase();
        $response = $projectUseCase->getProjectsByUserId($user->id);
        $dataResponse = $response[0];
        $this->assertEquals($project->uuid, $dataResponse->uuid);
        $this->assertEquals($project->name, $dataResponse->name);
        $this->assertEquals($project->icon, $dataResponse->icon);
        $this->assertEquals($project->is_favorites, $dataResponse->is_favorites);
        $this->assertEquals($project->status, $dataResponse->status);
        $this->assertEquals($project->priority, $dataResponse->priority);
    }
}
