<?php

namespace Modules\Users\Services;
interface UserServiceInterface
{
    public function getProfileUser(string $uuid);

    public function getUserByUserUUid(string $uuid);
}
