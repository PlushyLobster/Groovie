<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ChallengesSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $challenges = [];
        for ($i = 0; $i < 10; $i++) {
            $challenges[] = [
                'name' => $faker->word,
                'reward' => $faker->randomElement([$faker->word,$faker->numberBetween(1, 5000).' groovies']),
                'titled' => $faker->word,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Challenges')->insert($challenges);
    }
}
