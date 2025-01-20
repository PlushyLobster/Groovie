<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransportsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $transports = [];
        for ($i = 0; $i < 10; $i++) {
            $transports[] = [
                'creator' => $faker->boolean,
                'type' => $faker->randomElement(['Bus', 'Train', 'Covoit','Vélo','Van']),
                'nb_slot' => $faker->numberBetween(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Transports')->insert($transports);
    }
}
