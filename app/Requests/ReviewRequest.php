<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class ReviewRequest
{
    public static function rules(): array
    {
        return [
            'artist_id' => 'required|numeric',
            'producer_id' => 'required|numeric',
            'rating' => 'required|numeric',
            'comment' => 'max:1000',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
