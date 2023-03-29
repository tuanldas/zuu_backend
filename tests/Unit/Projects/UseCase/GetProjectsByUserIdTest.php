<?php

namespace Tests\Unit\Projects\UseCase;

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
         $projectUseCase = $this->newProjectUseCase();
         $response = $projectUseCase->getProjectsByUserUUid($user->uuid);
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
         $projectUseCase = $this->newProjectUseCase();
         $this->expectException(NotFoundHttpException::class);
         $projectUseCase->getProjectsByUserUUid(fake()->uuid);
         $this->expectExceptionCode(404);
         $this->expectExceptionMessage(__('language.not_found'));
     }
}
