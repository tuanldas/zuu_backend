<?php

namespace Modules\Projects\Repositories;

use Modules\Projects\Models\Project;
use Modules\Projects\Repositories\Eloquent\EloquentRepository;

class ProjectRepository extends EloquentRepository implements ProjectRepositoryInterface
{
    public function getModel(): string
    {
        return Project::class;
    }

    public function getProjectsByUserId(int $userId, $column = ['*'])
    {
        return $this->model->where('owner', $userId)
            ->paginate(10, $column);
    }
}
