<?php

namespace App\Providers;

use App\Models\PersonalAccessToken;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\EloquentRepositoryInterface;
use App\Repositories\Users\UserRepository;
use App\Repositories\Users\UserRepositoryInterface;
use App\Service\Users\UserService;
use App\Service\Users\UserServiceInterface;
use App\UseCase\Users\UserUseCase;
use App\UseCase\Users\UserUseCaseInterface;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

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
    }

    protected function registerServices()
    {
        $this->app->singleton(
            UserServiceInterface::class,
            UserService::class
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
