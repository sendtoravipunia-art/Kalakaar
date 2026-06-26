<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class HireRequestSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'producer_id' => 1,
    'artist_id' => 1,
    'title' => 'Wedding gig',
    'message' => 'Are you available?',
    'budget' => 25000,
    'status' => 'pending',
  ),
  1 => 
  array (
    'producer_id' => 1,
    'artist_id' => 1,
    'title' => 'Short film lead',
    'message' => 'Audition next week.',
    'budget' => 50000,
    'status' => 'accepted',
  ),
  2 => 
  array (
    'producer_id' => 1,
    'artist_id' => 1,
    'title' => 'Studio session',
    'message' => 'Need a vocalist.',
    'budget' => 8000,
    'status' => 'completed',
  ),
);

        foreach ($rows as $row) {
            $this->insert('hire_requests', $row);
        }
    }
}
