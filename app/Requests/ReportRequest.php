<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class ReportRequest
{
    public static function rules(): array
    {
        return [
            'reporter_id' => 'required|numeric',
            'target_type' => 'required|max:40',
            'target_id' => 'required|numeric',
            'reason' => 'required|max:255',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
