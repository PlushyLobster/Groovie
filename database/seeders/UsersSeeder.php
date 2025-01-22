<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $users = [];
        for ($i = 0; $i < 10; $i++) {
            $users[] = [
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'active' => $faker->boolean,
                'cgu_validated' => 1,
                'role' => $faker->randomElement(['admin', 'groover']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Ajout de  l'utilisateur avec le mot de passe haché
        $users[] = [
            'email' => 'test@example.com',
            'password' => Hash::make('test'),
            'active' => 1,
            'cgu_validated' => 1,
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('GRV1_Users')->insert($users);
    }
}
