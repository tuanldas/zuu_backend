<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use Illuminate\Http\Request;
use Tests\Helpers\UserHelpers;

class AuthController extends Controller
{
    public function login(LoginRequest $loginRequest): array
    {
        return [];
    }
}
