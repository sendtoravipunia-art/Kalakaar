<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class ArtistSkillRequest
{
    public static function rules(): array
    {
        return [
            'artist_id' => 'required|numeric',
            'skill_id' => 'required|numeric',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
