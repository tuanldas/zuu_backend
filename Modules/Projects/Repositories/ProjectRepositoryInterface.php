<?php

namespace Modules\Projects\Repositories;
use App\Repositories\Eloquent\EloquentRepositoryInterface;

interface ProjectRepositoryInterface extends EloquentRepositoryInterface
{
    public function getProjectsByUserId(int $userId, $column = ['*']);
}
