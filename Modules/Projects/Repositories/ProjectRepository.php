<?php

namespace Modules\Projects\Repositories;

use App\Repositories\Eloquent\EloquentRepository;
use Modules\Projects\Models\Project;

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
