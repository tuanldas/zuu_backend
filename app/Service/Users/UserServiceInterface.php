<?php

namespace App\Service\Users;
interface UserServiceInterface
{
    public function getProfileUser(string $uuid);

    public function getUserByUserUUid(string $uuid);
}
