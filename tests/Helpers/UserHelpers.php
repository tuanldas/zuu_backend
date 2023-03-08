<?php

namespace Tests\Helpers;

use App\Models\User;

trait UserHelpers
{
    public function createUser(): User
    {
        return User::factory()->create([
            'password' => bcrypt('123123')
        ]);
    }
}
