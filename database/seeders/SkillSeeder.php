<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'name' => 'Vocals',
    'category_id' => 1,
  ),
  1 => 
  array (
    'name' => 'Choreography',
    'category_id' => 2,
  ),
  2 => 
  array (
    'name' => 'Improv',
    'category_id' => 3,
  ),
  3 => 
  array (
    'name' => 'Lighting',
    'category_id' => 4,
  ),
  4 => 
  array (
    'name' => 'Editing',
    'category_id' => 5,
  ),
);

        foreach ($rows as $row) {
            $this->insert('skills', $row);
        }
    }
}
