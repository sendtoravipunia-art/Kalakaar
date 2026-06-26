<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class MessageSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'conversation_id' => 1,
    'sender_id' => 1,
    'body' => 'Hi there!',
  ),
  1 => 
  array (
    'conversation_id' => 1,
    'sender_id' => 1,
    'body' => 'When are you free?',
  ),
  2 => 
  array (
    'conversation_id' => 1,
    'sender_id' => 1,
    'body' => 'Sounds good.',
  ),
);

        foreach ($rows as $row) {
            $this->insert('messages', $row);
        }
    }
}
