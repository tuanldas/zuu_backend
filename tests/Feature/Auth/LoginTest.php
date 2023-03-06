<?php

namespace Tests\Feature\Auth;

use Database\Factories\UserFactory;
use Tests\Helpers\UserHelpers;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use UserHelpers;

    function testLoginFailedWhenUserNull()
    {
        $user = UserFactory::create();
        dd($user);
        $resuest = $this->post('/auth/login');
        dd($resuest->getStatusCode());
    }
}
