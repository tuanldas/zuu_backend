<?php

namespace Tests\Feature\Auth;

use Illuminate\Database\PDO\Concerns\ConnectsToDatabase;
use Tests\Helpers\UserHelpers;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use UserHelpers, ConnectsToDatabase;

    public function testLoginSuccess()
    {
        $user = $this->createUser();
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->post('/api/auth/login', [
            'account' => $user->email,
            'password' => 123123,
        ])
            ->assertStatus(200);
        $contentRequest = json_decode($response->getContent());
        $this->assertNotNull($contentRequest->access_token);
        $this->assertNotNull($contentRequest->expires_in);
    }

    public function testLoginFailedWhenAccountNull()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->post('/api/auth/login', [
            'account' => null,
            'password' => 123123,
        ])
            ->assertStatus(422);
        $contentRequest = json_decode($response->getContent());
        $this->assertEquals(__('validation.required', ['attribute' => 'account']), $contentRequest->message);
    }

    public function testLoginFailedWhenPasswordNull()
    {
        $user = $this->createUser();
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->post('/api/auth/login', [
            'account' => $user->email,
            'password' => null,
        ])
            ->assertStatus(422);
        $contentRequest = json_decode($response->getContent());
        $this->assertEquals(__('validation.required', ['attribute' => 'password']), $contentRequest->message);
    }

    public function testLoginFailedWhenPasswordInvalid()
    {
        $user = $this->createUser();
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->post('/api/auth/login', [
            'account' => $user->email,
            'password' => 11111,
        ])
            ->assertStatus(401);
        $contentRequest = json_decode($response->getContent());
        $this->assertEquals('invalid_grant', $contentRequest->error);
        $this->assertEquals(__('auth.invalid_user_credentials'), $contentRequest->error_description);
    }
}
