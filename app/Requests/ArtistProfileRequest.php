<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class ArtistProfileRequest
{
    public static function rules(): array
    {
        return [
            'user_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'headline' => 'required|max:140',
            'bio' => 'max:2000',
            'city' => 'max:80',
            'hourly_rate' => 'numeric',
            'experience_years' => 'numeric',
            'available' => 'numeric',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
