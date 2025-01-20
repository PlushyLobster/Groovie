<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersFestivalsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $usersFestivals = [];
        for ($i = 0; $i < 10; $i++) {
            $usersFestivals[] = [
                'Id_user' => $faker->numberBetween(1, 10),
                'Id_festival' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Users_Festivals')->insert($usersFestivals);
    }
}
