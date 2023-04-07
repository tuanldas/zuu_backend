<?php

namespace Modules\Projects\Services;
interface UserServiceInterface
{
    public function getProfileUser(string $uuid);

    public function getUserByUserUUid(string $uuid);
}
