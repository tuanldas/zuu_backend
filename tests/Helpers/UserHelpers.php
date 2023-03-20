<?php

namespace Tests\Helpers;

use App\Models\User;
use App\Models\UserProfile;
use App\Repositories\Users\UserRepository;
use App\Service\Users\UserService;
use function Symfony\Component\String\u;

trait UserHelpers
{
    public function newUserService(): UserService
    {
        return new UserService(
            $this->newUserRepository()
        );
    }

    public function newUserRepository(): UserRepository
    {
        return new UserRepository();
    }

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
