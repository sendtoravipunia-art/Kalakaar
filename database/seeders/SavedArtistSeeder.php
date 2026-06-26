<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class SavedArtistSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'producer_id' => 1,
    'artist_id' => 1,
  ),
  1 => 
  array (
    'producer_id' => 1,
    'artist_id' => 2,
  ),
  2 => 
  array (
    'producer_id' => 1,
    'artist_id' => 3,
  ),
);

        foreach ($rows as $row) {
            $this->insert('saved_artists', $row);
        }
    }
}
