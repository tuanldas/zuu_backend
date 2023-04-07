<?php

namespace Modules\Projects\Services;
interface ProjectServiceInterface
{
    public function getProfilesByUserId(int $userId);
}
