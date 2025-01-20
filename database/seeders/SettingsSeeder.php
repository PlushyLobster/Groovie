<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $settings = [];
        for ($i = 0; $i < 10; $i++) {
            $settings[] = [
                'geoloc_active' => $faker->boolean ? 'yes' : 'no',
                'language_pref' => $faker->randomElement(['fr', 'en', 'it', 'es']),
                'favorite_theme' => $faker->randomElement(['dark', 'light']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Settings')->insert($settings);
    }
}
