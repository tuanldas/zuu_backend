<?php

namespace Tests\Feature\Users;

use Tests\Helpers\UserHelpers;
use Tests\TestCase;

class GetProfileUsersTest extends TestCase
{
    use UserHelpers;

    public function testCanGetProfileUser()
    {
        $user = $this->createUser();
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->get('/api/users/' . $user->uuid)
            ->assertStatus(200);
        $profileUser = json_decode($response->getContent());
        $this->assertEquals($user->uuid, $profileUser->uuid);
        $this->assertEquals($user->userProfile->first_name, $profileUser->first_name);
        $this->assertEquals($user->userProfile->last_name, $profileUser->last_name);
        $this->assertEquals($user->userProfile->designation, $profileUser->designation);
        $this->assertEquals($user->userProfile->website, $profileUser->website);
        $this->assertEquals($user->userProfile->phone, $profileUser->phone);
        $this->assertEquals($user->email, $profileUser->email);
        $this->assertEquals($user->userProfile->joining_date, $profileUser->joining_date);
        $this->assertEquals($user->userProfile->about, $profileUser->about);
    }

    public function testCannotGetProfileUserWhenUuidNotFound()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->get('/api/users/98bb6f8b-3330-4299-a21a-8803f9a7c9da')
            ->assertStatus(404);
        $this->assertEquals(__('language.not_found'), json_decode($response->getContent())->message);
    }
}
