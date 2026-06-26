<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'name' => 'Music',
    'slug' => 'music',
    'icon' => '🎵',
  ),
  1 => 
  array (
    'name' => 'Dance',
    'slug' => 'dance',
    'icon' => '💃',
  ),
  2 => 
  array (
    'name' => 'Acting',
    'slug' => 'acting',
    'icon' => '🎭',
  ),
  3 => 
  array (
    'name' => 'Photography',
    'slug' => 'photography',
    'icon' => '📷',
  ),
  4 => 
  array (
    'name' => 'Painting',
    'slug' => 'painting',
    'icon' => '🎨',
  ),
);

        foreach ($rows as $row) {
            $this->insert('categories', $row);
        }
    }
}
