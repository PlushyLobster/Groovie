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

        // Assurez-vous que les Id_groover existent dans la table GRV1_Groovers
        $grooverIds = DB::table('GRV1_Groovers')->pluck('Id_groover')->toArray();

        $grooversSettings = [];
        for ($i = 0; $i < 10; $i++) {
            $grooversSettings[] = [
                'Id_groover' => $faker->randomElement($grooverIds),
                'Id_setting' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Groovers_Settings')->insert($grooversSettings);
    }
}
