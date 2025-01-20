<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FestivalsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $existingNames = DB::table('GRV1_Festivals')->pluck('name')->toArray();
        $festivals = [];

        for ($i = 0; $i < 10; $i++) {
            do {
                $name = $faker->company;
            } while (in_array($name, $existingNames));

            $existingNames[] = $name;

            $festivals[] = [
                'type' => $faker->randomElement(['Intérieur', 'Extérieur']),
                'name' => $name,
                'start_datetime' => $faker->dateTimeBetween('2024-01-01', '2024-12-31'),
                'end_datetime' => $faker->dateTimeBetween('2024-01-01', '2024-12-31'),
                'Id_musical_genre' => $faker->numberBetween(1, 7),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Festivals')->insert($festivals);
    }
}
