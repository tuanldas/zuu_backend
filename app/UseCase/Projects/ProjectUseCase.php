<?php

namespace App\UseCase\Projects;
use App\Service\Projects\ProjectServiceInterface;

class ProjectUseCase implements ProjectUseCaseInterface
{
    public ProjectServiceInterface $projectService;

    public function __construct(ProjectServiceInterface $projectService)
    {
        $this->projectService = $projectService;
    }
}
