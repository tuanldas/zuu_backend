<?php

namespace App\Providers;

use App\Http\UseCase\Users\UserUseCase;
use App\Http\UseCase\Users\UserUseCaseInterface;
use App\Models\PersonalAccessToken;
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
