<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SettingsMusicalGenresSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Récupérer tous les Id_musical_genre existants dans la table GRV1_Musical_genres
        $musicalGenreIds = DB::table('GRV1_Musical_genres')->pluck('Id_musical_genre')->toArray();

        // Récupérer tous les Id_setting existants dans la table GRV1_Settings
        $settingIds = DB::table('GRV1_Settings')->pluck('Id_setting')->toArray();

        $settingsMusicalGenres = [];
        for ($i = 0; $i < 10; $i++) {
            $settingsMusicalGenres[] = [
                'Id_musical_genre' => $faker->randomElement($musicalGenreIds),
                'Id_setting' => $faker->randomElement($settingIds),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Settings_Musical_genres')->insert($settingsMusicalGenres);
    }
}
