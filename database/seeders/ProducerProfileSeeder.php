<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class ProducerProfileSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'user_id' => 1,
    'company' => 'Dream Films',
    'bio' => 'Feature film house.',
    'city' => 'Mumbai',
    'website' => 'dreamfilms.example',
  ),
  1 => 
  array (
    'user_id' => 1,
    'company' => 'StageWorks',
    'bio' => 'Live event producers.',
    'city' => 'Bengaluru',
    'website' => 'stageworks.example',
  ),
  2 => 
  array (
    'user_id' => 1,
    'company' => 'Indie Beats',
    'bio' => 'Music label.',
    'city' => 'Goa',
    'website' => 'indiebeats.example',
  ),
);

        foreach ($rows as $row) {
            $this->insert('producer_profiles', $row);
        }
    }
}
