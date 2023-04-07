<?php

namespace Tests;

use App\Repositories\Projects\ProjectRepository;
use App\Service\Projects\ProjectService;
use App\Service\Users\UserService;
use App\UseCase\Projects\ProjectUseCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Users\Repositories\UserRepository;
use Modules\Users\UseCase\UserUseCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
    }

    public function newUserService(): UserService
    {
        return new UserService(
            $this->newUserRepository()
        );
    }

    public function newUserRepository(): UserRepository
    {
        return new UserRepository();
    }

    public function newUserUseCase(): UserUseCase
    {
        return new UserUseCase(
            $this->newUserService()
        );
    }

    public function newProjectUseCase(): ProjectUseCase
    {
        return new ProjectUseCase(
            $this->newProjectService(),
            $this->newUserService()
        );
    }

    public function newProjectService(): ProjectService
    {
        return new ProjectService(
            $this->newProjectRepository()
        );
    }

    public function newProjectRepository(): ProjectRepository
    {
        return new ProjectRepository();
    }
}
