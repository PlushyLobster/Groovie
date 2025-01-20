<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OffersSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $offersSettings = [];
        for ($i = 0; $i < 10; $i++) {
            $offersSettings[] = [
                'Id_setting' => $faker->numberBetween(1, 10),
                'Id_offer' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Offers_Settings')->insert($offersSettings);
    }
}
