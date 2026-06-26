<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class PortfolioItemRequest
{
    public static function rules(): array
    {
        return [
            'artist_id' => 'required|numeric',
            'title' => 'required|max:140',
            'media_type' => 'required|in:audio,video,image,link',
            'url' => 'required|max:255',
            'description' => 'max:1000',
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}
