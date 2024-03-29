<?php

namespace Modules\Users\UseCase;

use Modules\Projects\Services\ProjectServiceInterface;
use Modules\Users\Services\UserServiceInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserUseCase implements UserUseCaseInterface
{
    protected UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function getProfileUser(string $uuid)
    {
        $user = $this->userService->getProfileUser($uuid);
        if (is_null($user)) {
            throw new NotFoundHttpException(__('language.not_found'));
        }
        return $user;
    }
}
