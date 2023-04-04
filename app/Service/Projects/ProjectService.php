<?php

namespace App\Service\Projects;
use App\Models\User;
use App\Repositories\Projects\ProjectRepositoryInterface;
use App\Repositories\Users\UserRepositoryInterface;

class ProjectService implements ProjectServiceInterface
{
    private ProjectRepositoryInterface $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function getProfilesByUserId(int $userId)
    {
        return $this->projectRepository->getProjectsByUserId($userId,
            [
                'uuid',
                'name',
                'description',
                'summary',
                'icon',
                'is_favorites',
                'owner',
                'status',
                'priority',
                'created_at'
            ]);
    }
}
