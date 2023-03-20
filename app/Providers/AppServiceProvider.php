<?php

namespace App\Providers;

use App\Models\PersonalAccessToken;
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
        $this->registerUseCase();
    }

    protected function registerUseCase()
    {
        $this->app->singleton(
            UserUseCaseInterface::class,
            UserUseCase::class
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
