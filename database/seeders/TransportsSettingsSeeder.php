<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransportsSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $transportsSettings = [];
        for ($i = 0; $i < 10; $i++) {
            $transportsSettings[] = [
                'Id_setting' => $faker->numberBetween(1, 10),
                'Id_transport' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Transports_Settings')->insert($transportsSettings);
    }
}
