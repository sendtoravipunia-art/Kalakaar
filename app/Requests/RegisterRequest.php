<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;
use App\Models\User;

/**
 * Validation rules for new-account registration.
 */
final class RegisterRequest
{
    public static function rules(): array
    {
        return [
            'name'     => 'required|min:2|max:80',
            'email'    => 'required|email|max:120',
            'password' => 'required|min:6|max:100',
            'password_confirmation' => 'required|same:password',
            'role'     => 'required|in:' . User::ROLE_ARTIST . ',' . User::ROLE_PRODUCER,
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
