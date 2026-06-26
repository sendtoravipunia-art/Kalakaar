<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class ProducerProfile extends Model
{
    protected string $table = 'producer_profiles';

    protected array $fillable = ['user_id', 'company', 'bio', 'city', 'website'];
}
