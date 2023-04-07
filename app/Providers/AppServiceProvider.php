<?php

namespace App\Providers;

use App\Models\PersonalAccessToken;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\EloquentRepositoryInterface;
use App\Repositories\Projects\ProjectRepository;
use App\Repositories\Projects\ProjectRepositoryInterface;
use App\Service\Projects\ProjectService;
use App\Service\Projects\ProjectServiceInterface;
use App\Service\Users\UserService;
use App\Service\Users\UserServiceInterface;
use App\UseCase\Projects\ProjectUseCase;
use App\UseCase\Projects\ProjectUseCaseInterface;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use Modules\Users\Repositories\UserRepository;
use Modules\Users\Repositories\UserRepositoryInterface;
use Modules\Users\UseCase\UserUseCase;
use Modules\Users\UseCase\UserUseCaseInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerUseCases();
        $this->registerServices();
        $this->registerRepositories();
    }

    protected function registerUseCases()
    {
        $this->app->singleton(
            UserUseCaseInterface::class,
            UserUseCase::class
        );
        $this->app->singleton(
            ProjectUseCaseInterface::class,
            ProjectUseCase::class
        );
    }

    protected function registerServices()
    {
        $this->app->singleton(
            UserServiceInterface::class,
            UserService::class
        );
        $this->app->singleton(
            ProjectServiceInterface::class,
            ProjectService::class
        );
    }

    protected function registerRepositories()
    {
        $this->app->singleton(
            EloquentRepositoryInterface::class,
            EloquentRepository::class
        );
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->singleton(
            ProjectRepositoryInterface::class,
            ProjectRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
