<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class ReportSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'reporter_id' => 1,
    'target_type' => 'artist',
    'target_id' => 2,
    'reason' => 'Spam',
  ),
  1 => 
  array (
    'reporter_id' => 1,
    'target_type' => 'review',
    'target_id' => 3,
    'reason' => 'Inappropriate',
  ),
  2 => 
  array (
    'reporter_id' => 1,
    'target_type' => 'message',
    'target_id' => 4,
    'reason' => 'Fake profile',
  ),
);

        foreach ($rows as $row) {
            $this->insert('reports', $row);
        }
    }
}
