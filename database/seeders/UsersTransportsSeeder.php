<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTransportsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $usersTransports = [];
        for ($i = 0; $i < 10; $i++) {
            $usersTransports[] = [
                'Id_user' => $faker->numberBetween(1, 10),
                'Id_transport' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Users_Transports')->insert($usersTransports);
    }
}
