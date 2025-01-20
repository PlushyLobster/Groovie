<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TicketsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $tickets = [];
        for ($i = 0; $i < 10; $i++) {
            $tickets[] = [
                'number' => $faker->unique()->numerify('TICKET###'),
                'date_of_use' => $faker->dateTime,
                'Id_user' => $faker->numberBetween(1, 10),
                'Id_festival' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Tickets')->insert($tickets);
    }
}
