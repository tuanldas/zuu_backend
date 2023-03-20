<?php

namespace Tests\Helpers;

use App\Models\User;
use App\Repositories\Users\UserRepository;
use App\Service\Users\UserService;

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
        return User::factory()->create([
            'password' => bcrypt('123123')
        ]);
    }
}
