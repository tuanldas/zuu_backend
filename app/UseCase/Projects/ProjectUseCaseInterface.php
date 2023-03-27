<?php

namespace App\UseCase\Projects;
interface ProjectUseCaseInterface
{
    public function getProjectsByUserId($userId);
}
