<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Ramsey\Uuid\Nonstandard\Uuid;

class AuthController extends Controller
{
    public function login(LoginRequest $loginRequest)
    {
        $certificate = [
            'email' => $loginRequest->username,
            'password' => $loginRequest->password,
        ];
        if (Auth::attempt($certificate)) {
            $user = Auth::user();
            $token = $user->createTokenWithTypePassword($user->uuid, Carbon::now()->addSecond(config('custom.token_login_expires_at')));
            return response()->json([
                'uuid' => Crypt::encryptString($user->uuid),
                "access_token" => Crypt::encryptString($token->plainTextToken),
                "expires_in" => (int)config('custom.token_login_expires_at'),
            ]);
        }
        return response()->json([
            "error" => "invalid_grant",
            "error_description" => __('auth.invalid_user_credentials')
        ], 401);
    }
}
