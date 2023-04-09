<?php

namespace Tests\Unit\Users\Services;

use Tests\Helpers\UserHelpers;
use Tests\TestCase;

class GetProfileUserTest extends TestCase
{
    use UserHelpers;

    public function testCanGetProfileUser()
    {
        $user = $this->createUser();
        $userService = $this->newUserService();
        $userProfile = $userService->getProfileUser($user->uuid);
        $this->assertEquals($user->uuid, $userProfile->uuid);
        $this->assertEquals($user->userProfile->first_name, $userProfile->first_name);
        $this->assertEquals($user->userProfile->last_name, $userProfile->last_name);
        $this->assertEquals($user->userProfile->designation, $userProfile->designation);
        $this->assertEquals($user->userProfile->website, $userProfile->website);
        $this->assertEquals($user->userProfile->phone, $userProfile->phone);
        $this->assertEquals($user->email, $userProfile->email);
        $this->assertEquals($user->userProfile->joining_date, $userProfile->joining_date);
        $this->assertEquals($user->userProfile->about, $userProfile->about);
    }
}
