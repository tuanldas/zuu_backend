<?php

namespace App\Service\Projects;
interface ProjectServiceInterface
{
    public function getProfilesByUserId(int $userId);
}
