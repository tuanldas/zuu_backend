<?php

namespace Modules\Projects\UseCases;
use App\Service\Projects\ProjectServiceInterface;
use Modules\Projects\Services\ProjectServiceInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProjectUseCase implements ProjectUseCaseInterface
{
    public ProjectServiceInterface $projectService;
    public ProjectServiceInterface $userService;

    public function __construct(ProjectServiceInterface $projectService,
                                ProjectServiceInterface $userService)
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
