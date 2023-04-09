<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(LoginRequest $loginRequest): JsonResponse
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

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => true
        ]);
    }
}
