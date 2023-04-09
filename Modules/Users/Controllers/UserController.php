<?php

namespace Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use Modules\Users\UseCase\UserUseCaseInterface;

class UserController extends Controller
{
    public UserUseCaseInterface $userUseCase;

    public function __construct(UserUseCaseInterface $userUseCase)
    {
        $this->userUseCase = $userUseCase;
    }

    public function getProfileUser($uuid)
    {
        return $this->userUseCase->getProfileUser($uuid);
    }
}
