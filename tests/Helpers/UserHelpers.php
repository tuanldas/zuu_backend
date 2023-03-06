<?php

namespace Tests\Helpers;

use App\Models\User;

trait UserHelpers
{
    public function createUser(): User
    {
        $user = new User([
            'name' => 'UserTest',
            'email' => 'test@gmail.com',
            'password' => bcrypt('123123'),
        ]);
        $user->save();
        return $user;
    }
}
