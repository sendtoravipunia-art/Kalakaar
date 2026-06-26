<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class LoginRequest
{
    public static function rules(): array
    {
        return [
            'email'    => 'required|email',
            'password' => 'required',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
