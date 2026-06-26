<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'hire_request_id' => 1,
    'start_date' => '2026-07-01',
    'end_date' => '2026-07-02',
    'status' => 'scheduled',
  ),
  1 => 
  array (
    'hire_request_id' => 2,
    'start_date' => '2026-07-10',
    'end_date' => '2026-07-12',
    'status' => 'done',
  ),
  2 => 
  array (
    'hire_request_id' => 3,
    'start_date' => '2026-08-01',
    'end_date' => '2026-08-03',
    'status' => 'scheduled',
  ),
);

        foreach ($rows as $row) {
            $this->insert('bookings', $row);
        }
    }
}
