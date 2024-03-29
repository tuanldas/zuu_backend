<?php

namespace Modules\Users\Services;

use App\Models\User;
use Modules\Users\Repositories\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    public UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getProfileUser(string $uuid): ?User
    {
        return $this->userRepository->getProfileUser($uuid, [
            'uuid',
            'first_name',
            'last_name',
            'designation',
            'website',
            'phone',
            'email',
            'joining_date',
            'about',
            'avatar'
        ]);
    }

    public function getUserByUserUUid(string $uuid)
    {
        return $this->userRepository->findByUuid($uuid);
    }
}
