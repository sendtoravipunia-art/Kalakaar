<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'user_id' => 1,
    'type' => 'hire',
    'message' => 'You have a new hire request',
  ),
  1 => 
  array (
    'user_id' => 1,
    'type' => 'review',
    'message' => 'New review received',
  ),
  2 => 
  array (
    'user_id' => 1,
    'type' => 'message',
    'message' => 'New message',
  ),
);

        foreach ($rows as $row) {
            $this->insert('notifications', $row);
        }
    }
}
