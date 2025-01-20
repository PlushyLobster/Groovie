<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GamesSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $games = [];
        for ($i = 0; $i < 10; $i++) {
            $games[] = [
                'name' => $faker->word,
                'link' => $faker->url,
                'type' => $faker->randomElement(['Puzzle', 'Action', 'Casse-tête','Blind Test']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Games')->insert($games);
    }
}
