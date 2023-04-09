<?php

namespace Modules\Users\Repositories;
use App\Repositories\Eloquent\EloquentRepositoryInterface;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function getProfileUser($uuid, $columns = ['*']);
}
