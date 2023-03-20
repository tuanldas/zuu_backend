<?php

namespace Tests\Unit\Users\UseCases;

use App\Models\User;
use App\Models\UserProfile;
use App\UseCase\Users\UserUseCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\Helpers\UserHelpers;
use Tests\TestCase;

class GetProfileUserTest extends TestCase
{
    use UserHelpers;

    public function testCanGetProfileUser()
    {
        $user = $this->createUser();
        $userService = $this->newUserUseCase();
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

    public function testCannotGetProfileUserWhenUuidNotFound()
    {
        $userService = $this->newUserUseCase();
        $this->expectException(NotFoundHttpException::class);
        $userService->getProfileUser('98bb6f8b-3330-4299-a21a-8803f9a7c9da');
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage(__('language.not_found'));
    }
}
