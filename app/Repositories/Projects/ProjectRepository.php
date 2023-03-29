<?php

namespace App\Repositories\Projects;
use App\Models\Project;
use App\Repositories\Eloquent\EloquentRepository;

class ProjectRepository extends EloquentRepository implements ProjectRepositoryInterface
{
    public function getModel(): string
    {
        return Project::class;
    }

    public function getProjectsByUserId(int $userId, $column = ['*'])
    {
        return Project::where('owner', $userId)
            ->paginate(10, $column);
    }
}
