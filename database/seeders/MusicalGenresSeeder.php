<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicalGenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['type' => 'Rock', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Pop', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Jazz', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Classical', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Hip Hop', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('GRV1_Musical_genres')->insert($genres);
    }
}
