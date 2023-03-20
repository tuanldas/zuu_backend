<?php

namespace App\Service\Users;
use App\Models\User;
use App\Repositories\Users\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    public UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getProfileUser($uuid): User
    {
        return $this->userRepository->getProfileUser($uuid, [
            'first_name',
            'last_name',
            'designation',
            'website',
            'phone',
            'email',
            'joining_date',
            'about',
        ]);
    }
}
