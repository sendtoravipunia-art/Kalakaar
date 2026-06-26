<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class ArtistProfileSeeder extends Seeder
{
    public function run(): void
    {
        $rows = array (
  0 => 
  array (
    'user_id' => 1,
    'category_id' => 1,
    'headline' => 'Playback singer & composer',
    'bio' => '10 years on stage.',
    'city' => 'Mumbai',
    'hourly_rate' => 1500,
    'experience_years' => 10,
    'available' => 1,
  ),
  1 => 
  array (
    'user_id' => 1,
    'category_id' => 2,
    'headline' => 'Contemporary dancer',
    'bio' => 'Trained in Kathak and contemporary.',
    'city' => 'Delhi',
    'hourly_rate' => 1200,
    'experience_years' => 5,
    'available' => 1,
  ),
  2 => 
  array (
    'user_id' => 1,
    'category_id' => 3,
    'headline' => 'Theatre & film actor',
    'bio' => 'NSD alumnus.',
    'city' => 'Pune',
    'hourly_rate' => 2000,
    'experience_years' => 8,
    'available' => 0,
  ),
);

        foreach ($rows as $row) {
            $this->insert('artist_profiles', $row);
        }
    }
}
