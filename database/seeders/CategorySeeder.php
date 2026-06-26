<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['name' => 'Music',       'slug' => 'music'],
            ['name' => 'Dance',       'slug' => 'dance'],
            ['name' => 'Acting',      'slug' => 'acting'],
            ['name' => 'Photography', 'slug' => 'photography'],
            ['name' => 'Painting',    'slug' => 'painting'],
        ];

        foreach ($rows as $row) {
            $this->insert('categories', $row);
        }
    }
}
