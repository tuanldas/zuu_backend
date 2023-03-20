<?php

namespace App\Providers;

use App\Models\PersonalAccessToken;
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
