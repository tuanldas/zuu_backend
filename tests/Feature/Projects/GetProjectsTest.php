<?php

namespace Tests\Feature\Projects;

use Tests\Helpers\ProjectHelpers;
use Tests\Helpers\UserHelpers;
use Tests\TestCase;

class GetProjectsTest extends TestCase
{
    use UserHelpers, ProjectHelpers;

    function testUserCanGetProjects()
    {
        $user = $this->createUser();
        $project = $this->createProject($user->id);
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $user->createTokenWithTypePassword($user->email)->plainTextToken
        ])->get('/api/projects/')
            ->assertStatus(200);
        $dataResponse = json_decode($response->getContent())->data[0];
        $this->assertEquals($project->uuid, $dataResponse->uuid);
        $this->assertEquals($project->name, $dataResponse->name);
        $this->assertEquals($project->icon, $dataResponse->icon);
        $this->assertEquals($project->is_favorites, $dataResponse->is_favorites);
        $this->assertEquals($project->status, $dataResponse->status);
        $this->assertEquals($project->priority, $dataResponse->priority);
        $this->assertEquals($user->id, $dataResponse->owner);
    }

    function testCannotGetProjectsWhenNotLogin()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->get('/api/projects/')
            ->assertStatus(401);
        $this->assertEquals(__('language.unauthenticated'), json_decode($response->getContent())->message);
    }

    function testUserCanGetProjectsAndReturnNull()
    {
        $user = $this->createUser();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $user->createTokenWithTypePassword($user->email)->plainTextToken
        ])->get('/api/projects/')
            ->assertStatus(200);
        $dataResponse = json_decode($response->getContent())->data;
        $this->assertCount(0, $dataResponse);
    }
}
