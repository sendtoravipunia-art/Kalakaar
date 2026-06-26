<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class NotificationRequest
{
    public static function rules(): array
    {
        return [
            'user_id' => 'required|numeric',
            'type' => 'required|max:40',
            'message' => 'required|max:255',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
