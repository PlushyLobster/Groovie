<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PartnersSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $partners = [];
        for ($i = 0; $i < 10; $i++) {
            $partners[] = [
                'name' => $faker->company,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Partners')->insert($partners);
    }
}
