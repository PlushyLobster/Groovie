<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Désactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Vider les tables avant d'insérer les nouvelles données
        DB::table('GRV1_Festivals_Musical_genres')->truncate();
        DB::table('GRV1_Festivals')->truncate();
        DB::table('GRV1_Musical_genres')->truncate();

        // Réactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call([
            MusicalGenresSeeder::class,
            FestivalsTableSeeder::class,
            FestivalsMusicalGenresSeeder::class,
        ]);
    }
}
