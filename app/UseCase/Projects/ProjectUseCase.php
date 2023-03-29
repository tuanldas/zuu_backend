<?php

namespace App\UseCase\Projects;
use App\Models\Project;
use App\Service\Projects\ProjectServiceInterface;

class ProjectUseCase implements ProjectUseCaseInterface
{
    public ProjectServiceInterface $projectService;

    public function __construct(ProjectServiceInterface $projectService)
    {
        $this->projectService = $projectService;
    }

    public function getProjectsByUserId($userId)
    {
        return Project::paginate(10, [
            'uuid',
            'name',
            'icon',
            'is_favorites',
            'status',
            'priority',
        ]);
    }
}
