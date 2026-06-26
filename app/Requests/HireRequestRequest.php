<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class HireRequestRequest
{
    public static function rules(): array
    {
        return [
            'producer_id' => 'required|numeric',
            'artist_id' => 'required|numeric',
            'title' => 'required|max:140',
            'message' => 'max:2000',
            'budget' => 'numeric',
            'status' => 'required|in:pending,accepted,declined,completed',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
