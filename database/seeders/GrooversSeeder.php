<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GrooversSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Récupérer tous les Id_user existants dans la table GRV1_Users
        $userIds = DB::table('GRV1_Users')->pluck('Id_user')->toArray();

        $usedUserIds = [];
        $groovers = [];
        for ($i = 0; $i < 10; $i++) {
            do {
                $userId = $faker->randomElement($userIds);
            } while (in_array($userId, $usedUserIds));

            $usedUserIds[] = $userId;

            $groovers[] = [
                'name' => $faker->lastName,
                'firstname' => $faker->firstName,
                'city' => $faker->city,
                'nb_groovies' => $faker->numberBetween(1, 100),
                'Id_user' => $userId, // Utiliser un Id_user unique
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Groovers')->insert($groovers);
    }
}
