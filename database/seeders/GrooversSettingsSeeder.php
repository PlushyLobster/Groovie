<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GrooversSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $grooversSettings = [];
        for ($i = 0; $i < 10; $i++) {
            $grooversSettings[] = [
                'Id_groover' => $faker->numberBetween(1, 10),
                'Id_setting' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Groovers_Settings')->insert($grooversSettings);
    }
}
