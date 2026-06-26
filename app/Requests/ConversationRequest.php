<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class ConversationRequest
{
    public static function rules(): array
    {
        return [
            'producer_id' => 'required|numeric',
            'artist_id' => 'required|numeric',
            'subject' => 'max:140',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
