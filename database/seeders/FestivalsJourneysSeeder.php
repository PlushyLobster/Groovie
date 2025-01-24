<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FestivalsJourneysSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $festivalsJourneys = [];
        for ($i = 0; $i < 10; $i++) {
            $festivalsJourneys[] = [
                'Id_festival' => $faker->numberBetween(1, 10),
                'Id_journey' => $faker->numberBetween(1, 9),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Festivals_Journeys')->insert($festivalsJourneys);
    }
}
