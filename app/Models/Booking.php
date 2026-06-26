<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class Booking extends Model
{
    protected string $table = 'bookings';

    protected array $fillable = ['hire_request_id', 'start_date', 'end_date', 'status'];
}
