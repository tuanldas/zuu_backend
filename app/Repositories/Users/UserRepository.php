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

    public function getProfileUser(int $uuid, $columns = ['*'])
    {
        return $this->model
            ->join('user_profile', 'user_profile.user_id', '=', 'users.id')
            ->where('uuid', $uuid)
            ->select($columns)
            ->first();
    }
}
