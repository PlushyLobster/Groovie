<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicalGenresSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            ['name' => 'Rock', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jazz', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pop', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Musique électronique', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chanson française', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Musiques celtiques', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Variété internationale', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($genres as $genre) {
            DB::table('GRV1_Musical_genres')->updateOrInsert(
                ['name' => $genre['name']],
                ['created_at' => $genre['created_at'], 'updated_at' => $genre['updated_at']]
            );
        }
    }
}
