<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Modules\Projects\Controllers\ProjectController;
use Modules\Users\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('/auth')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('/login', 'login');
    });
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/users/{uuid}')
        ->controller(UserController::class)
        ->group(function () {
            Route::get('/', 'getProfileUser');
        });
    Route::prefix('/projects')
        ->controller(ProjectController::class)
        ->group(function () {
            Route::get('/', 'getProjects');
        });
});
