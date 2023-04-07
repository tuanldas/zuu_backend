<?php

namespace Modules\Users\Repositories;
use App\Repositories\Eloquent\EloquentRepository;
use Modules\Users\Models\User;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function getModel(): string
    {
        return User::class;
    }

    public function getProfileUser($uuid, $columns = ['*'])
    {
        return $this->model
            ->join('user_profile', 'user_profile.user_id', '=', 'users.id')
            ->where('uuid', $uuid)
            ->select($columns)
            ->first();
    }
}
