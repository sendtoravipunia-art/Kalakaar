<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class ArtistSkillSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'artist_id' => 1,
    'skill_id' => 1,
  ),
  1 => 
  array (
    'artist_id' => 1,
    'skill_id' => 2,
  ),
  2 => 
  array (
    'artist_id' => 2,
    'skill_id' => 3,
  ),
);

        foreach ($rows as $row) {
            $this->insert('artist_skills', $row);
        }
    }
}
