<?php

namespace App\Repositories\Users;
use App\Models\User;
use App\Repositories\Eloquent\EloquentRepository;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function getModel(): string
    {
        return User::class;
    }
}
