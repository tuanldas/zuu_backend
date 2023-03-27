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
}
