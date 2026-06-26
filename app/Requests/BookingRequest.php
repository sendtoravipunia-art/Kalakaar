<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class BookingRequest
{
    public static function rules(): array
    {
        return [
            'hire_request_id' => 'required|numeric',
            'status' => 'required|in:scheduled,done,cancelled',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
