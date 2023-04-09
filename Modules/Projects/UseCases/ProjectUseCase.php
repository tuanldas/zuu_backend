<?php

namespace Modules\Projects\UseCases;

use Modules\Projects\Services\ProjectServiceInterface;
use Modules\Users\Services\UserServiceInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProjectUseCase implements ProjectUseCaseInterface
{
    public ProjectServiceInterface $projectService;
    public UserServiceInterface $userService;

    public function __construct(ProjectServiceInterface $projectService,
                                UserServiceInterface    $userService)
    {
        $this->projectService = $projectService;
        $this->userService = $userService;
    }

    public function getProjectsByUserUUid($userUUid)
    {
        $user = $this->userService->getUserByUserUUid($userUUid);
        if (!$user) {
            throw new NotFoundHttpException();
        }
        return $this->projectService->getProfilesByUserId($user->id);
    }
}
