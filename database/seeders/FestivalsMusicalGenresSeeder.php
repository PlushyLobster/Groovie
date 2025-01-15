<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FestivalsMusicalGenresSeeder extends Seeder
{
    public function run(): void
    {

        $festivalGenres = [
            ['Id_festival' => 1, 'Id_musical_genre' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['Id_festival' => 2, 'Id_musical_genre' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['Id_festival' => 3, 'Id_musical_genre' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['Id_festival' => 4, 'Id_musical_genre' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['Id_festival' => 5, 'Id_musical_genre' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['Id_festival' => 6, 'Id_musical_genre' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['Id_festival' => 7, 'Id_musical_genre' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['Id_festival' => 8, 'Id_musical_genre' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['Id_festival' => 9, 'Id_musical_genre' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['Id_festival' => 10, 'Id_musical_genre' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('GRV1_Festivals_Musical_genres')->insert($festivalGenres);
    }
}
