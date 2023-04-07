<?php

namespace App\Providers;

use App\Models\PersonalAccessToken;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\EloquentRepositoryInterface;
use App\Service\Projects\ProjectService;
use App\Service\Projects\ProjectServiceInterface;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use Modules\Projects\Repositories\ProjectRepository;
use Modules\Projects\Repositories\ProjectRepositoryInterface;
use Modules\Projects\Services\UserService;
use Modules\Projects\Services\UserServiceInterface;
use Modules\Projects\UseCases\ProjectUseCase;
use Modules\Projects\UseCases\ProjectUseCaseInterface;
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
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return 'Database\\Factories\\' . Arr::last(explode('\\', $modelName)) . 'Factory';
        });
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
