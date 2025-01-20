<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NotificationsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $notifications = [];
        for ($i = 0; $i < 10; $i++) {
            $notifications[] = [
                'importance' => $faker->numberBetween(1, 5),
                'message' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Notifications')->insert($notifications);
    }
}
