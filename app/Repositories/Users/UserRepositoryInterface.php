<?php

namespace App\Repositories\Users;
use App\Repositories\Eloquent\EloquentRepositoryInterface;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function getProfileUser($uuid, $columns = ['*']);
}
