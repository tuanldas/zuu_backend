<?php

namespace Modules\Users\UseCase;
interface UserUseCaseInterface
{
    function getProfileUser(string $uuid);
}
