<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class TagSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'name' => 'Bollywood',
  ),
  1 => 
  array (
    'name' => 'Classical',
  ),
  2 => 
  array (
    'name' => 'Indie',
  ),
  3 => 
  array (
    'name' => 'Folk',
  ),
  4 => 
  array (
    'name' => 'Jazz',
  ),
);

        foreach ($rows as $row) {
            $this->insert('tags', $row);
        }
    }
}
