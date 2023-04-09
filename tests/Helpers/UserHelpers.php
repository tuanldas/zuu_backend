<?php

namespace Tests\Helpers;

use App\Models\User;
use Modules\Users\Models\UserProfile;

trait UserHelpers
{
    public function createUser(): User
    {
        $user = User::factory()->create([
            'password' => bcrypt('123123')
        ]);
        UserProfile::factory()->create([
            'user_id' => $user->id
        ]);
        return $user;
    }
}
