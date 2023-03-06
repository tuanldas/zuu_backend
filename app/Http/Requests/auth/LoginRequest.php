<?php

namespace App\Http\Requests\auth;

use App\Enums\User\LoginTypeEnums;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "account" => ["required", "email"],
            "action_type" => ["required"],
            "password" => "required"
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'asdf'
        ];
    }
}
