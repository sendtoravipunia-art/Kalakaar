<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class CategoryRequest
{
    public static function rules(): array
    {
        return [
            'name' => 'required|max:80',
            'slug' => 'required|max:100',
            'icon' => 'max:16',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
