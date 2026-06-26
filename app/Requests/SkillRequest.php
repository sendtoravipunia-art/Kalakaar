<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class SkillRequest
{
    public static function rules(): array
    {
        return [
            'name' => 'required|max:80',
            'category_id' => 'required|numeric',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
