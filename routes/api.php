<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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
Route::get('/test', function () {
   $user = \App\Models\User::factory()->create();
   \App\Models\UserProfile::factory()->create([
       'user_id' => $user->id
   ]);

});
Route::prefix('/users/{uuid}')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/', 'getProfileUser');
    });
