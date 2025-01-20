<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersNotificationsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $usersNotifications = [];
        for ($i = 0; $i < 10; $i++) {
            $usersNotifications[] = [
                'Id_user' => $faker->numberBetween(1, 10),
                'Id_notification' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Users_Notifications')->insert($usersNotifications);
    }
}
