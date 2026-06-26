<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class ProducerProfileRequest
{
    public static function rules(): array
    {
        return [
            'user_id' => 'required|numeric',
            'company' => 'required|max:120',
            'bio' => 'max:2000',
            'city' => 'max:80',
            'website' => 'max:160',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
