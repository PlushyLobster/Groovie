<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AdminsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Récupérer tous les Id_user existants dans la table GRV1_Users
        $userIds = DB::table('GRV1_Users')->pluck('Id_user')->toArray();

        $usedUserIds = [];
        $admins = [];
        for ($i = 0; $i < 5; $i++) {
            do {
                $userId = $faker->randomElement($userIds);
            } while (in_array($userId, $usedUserIds));

            $usedUserIds[] = $userId;

            $admins[] = [
                'name' => $faker->lastName,
                'firstname' => $faker->firstName,
                'super_admin' => $faker->boolean,
                'Id_user' => $userId, // Utiliser un Id_user unique
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Admins')->insert($admins);
    }
}
