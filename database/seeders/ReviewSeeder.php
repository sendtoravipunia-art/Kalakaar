<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'artist_id' => 1,
    'producer_id' => 1,
    'rating' => 5,
    'comment' => 'Brilliant!',
  ),
  1 => 
  array (
    'artist_id' => 1,
    'producer_id' => 1,
    'rating' => 4,
    'comment' => 'Very professional.',
  ),
  2 => 
  array (
    'artist_id' => 1,
    'producer_id' => 1,
    'rating' => 5,
    'comment' => 'Highly recommend.',
  ),
);

        foreach ($rows as $row) {
            $this->insert('reviews', $row);
        }
    }
}
