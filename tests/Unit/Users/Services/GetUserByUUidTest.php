<?php

namespace Tests\Unit\Users\Services;

use Tests\Helpers\UserHelpers;
use Tests\TestCase;

class GetUserByUUidTest extends TestCase
{
    use UserHelpers;

    function testGetUserByUUidSuccess()
    {
        $user = $this->createUser();
        $userService = $this->newUserService();
        $response = $userService->getUserByUserUUid($user->uuid);
        $this->assertEquals($user->uuid, $response->uuid);
        $this->assertEquals($user->id, $response->id);
        $this->assertEquals($user->email, $response->email);
    }

    function testUserCannotGetUserWhenUserNotExists()
    {

        $this->createUser();
        $userService = $this->newUserService();
        $response = $userService->getUserByUserUUid(fake()->uuid);
        $this->assertNull($response);
    }
}
