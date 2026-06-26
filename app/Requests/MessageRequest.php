<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class MessageRequest
{
    public static function rules(): array
    {
        return [
            'conversation_id' => 'required|numeric',
            'sender_id' => 'required|numeric',
            'body' => 'required|max:2000',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
