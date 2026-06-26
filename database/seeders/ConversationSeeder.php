<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class ConversationSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'producer_id' => 1,
    'artist_id' => 1,
    'subject' => 'Project enquiry',
  ),
  1 => 
  array (
    'producer_id' => 1,
    'artist_id' => 1,
    'subject' => 'Booking',
  ),
  2 => 
  array (
    'producer_id' => 1,
    'artist_id' => 1,
    'subject' => 'Collaboration',
  ),
);

        foreach ($rows as $row) {
            $this->insert('conversations', $row);
        }
    }
}
