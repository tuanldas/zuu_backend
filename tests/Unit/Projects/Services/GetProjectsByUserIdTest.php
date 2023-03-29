<?php

namespace Tests\Unit\Projects\Services;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\Helpers\ProjectHelpers;
use Tests\Helpers\UserHelpers;
use Tests\TestCase;

class GetProjectsByUserIdTest extends TestCase
{
    use UserHelpers, ProjectHelpers;

    function testCanGetProjects()
    {
        $user = $this->createUser();
        $project = $this->createProject($user->id);
        $projectService = $this->newProjectService();
        $response = $projectService->getProfilesByUserId($user->id);
        $dataResponse = $response[0];
        $this->assertEquals($project->uuid, $dataResponse->uuid);
        $this->assertEquals($project->name, $dataResponse->name);
        $this->assertEquals($project->icon, $dataResponse->icon);
        $this->assertEquals($project->is_favorites, $dataResponse->is_favorites);
        $this->assertEquals($project->status, $dataResponse->status);
        $this->assertEquals($project->priority, $dataResponse->priority);
        $this->assertEquals($user->id, $dataResponse->owner);
    }

    function testCannotGetProjectsWhenUidNotFound()
    {
        $user = $this->createUser();
        $this->createProject($user->id);
        $projectService = $this->newProjectService();
        $response = $projectService->getProfilesByUserId(100);
        $this->assertCount(0, $response);
    }
}
