<?php

namespace App\UseCase\Projects;
interface ProjectUseCaseInterface
{
    public function getProjectsByUserUUid($userUUid);
}
