<?php

namespace App\UseCase\Users;
interface UserUseCaseInterface
{
    function getProfileUser(string $uuid);
}
