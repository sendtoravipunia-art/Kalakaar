<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class PortfolioItemSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'artist_id' => 1,
    'title' => 'Live at NCPA',
    'media_type' => 'video',
    'url' => 'https://x.example/1',
    'description' => '',
  ),
  1 => 
  array (
    'artist_id' => 1,
    'title' => 'Showreel 2025',
    'media_type' => 'video',
    'url' => 'https://x.example/2',
    'description' => '',
  ),
  2 => 
  array (
    'artist_id' => 1,
    'title' => 'Album cover shoot',
    'media_type' => 'image',
    'url' => 'https://x.example/3',
    'description' => '',
  ),
);

        foreach ($rows as $row) {
            $this->insert('portfolio_items', $row);
        }
    }
}
