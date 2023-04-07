<?php

namespace Modules\Projects\Services;


use Modules\Projects\Repositories\ProjectRepositoryInterface;

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
