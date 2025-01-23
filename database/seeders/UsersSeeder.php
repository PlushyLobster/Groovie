<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'email' => 'thomas.pareschi@campus-centre.fr',
                'password' => Hash::make('GroovieTest123;'),
                'active' => 1,
                'cgu_validated' => 1,
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'florian.dide@campus-centre.fr',
                'password' => Hash::make('GroovieTest123;'),
                'active' => 1,
                'cgu_validated' => 1,
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'amelie.benoist@campus-centre.fr',
                'password' => Hash::make('GroovieTest123;'),
                'active' => 1,
                'cgu_validated' => 1,
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'theo.jorge-oliveira@campus-centre.fr',
                'password' => Hash::make('GroovieTest123;'),
                'active' => 1,
                'cgu_validated' => 1,
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user1@example.com',
                'password' => Hash::make('GroovieTest123;'),
                'active' => 1,
                'cgu_validated' => 1,
                'role' => 'groover',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user2@example.com',
                'password' => Hash::make('GroovieTest123;'),
                'active' => 1,
                'cgu_validated' => 1,
                'role' => 'groover',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user3@example.com',
                'password' => Hash::make('GroovieTest123;'),
                'active' => 1,
                'cgu_validated' => 1,
                'role' => 'groover',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user4@example.com',
                'password' => Hash::make('password8'),
                'active' => 1,
                'cgu_validated' => 1,
                'role' => 'groover',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user5@example.com',
                'password' => Hash::make('password9'),
                'active' => 1,
                'cgu_validated' => 1,
                'role' => 'groover',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user6@example.com',
                'password' => Hash::make('password10'),
                'active' => 1,
                'cgu_validated' => 1,
                'role' => 'groover',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('GRV1_Users')->insert($users);

        $groovers = [
            [
                'Id_user' => 5,
                'nb_groovies' => 0,
                'name' => 'Nom1',
                'firstname' => 'Prénom1',
                'city' => 'Ville1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_user' => 6,
                'nb_groovies' => 0,
                'name' => 'Nom2',
                'firstname' => 'Prénom2',
                'city' => 'Ville2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_user' => 7,
                'nb_groovies' => 0,
                'name' => 'Nom3',
                'firstname' => 'Prénom3',
                'city' => 'Ville3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_user' => 8,
                'nb_groovies' => 0,
                'name' => 'Nom4',
                'firstname' => 'Prénom4',
                'city' => 'Ville4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_user' => 9,
                'nb_groovies' => 0,
                'name' => 'Nom5',
                'firstname' => 'Prénom5',
                'city' => 'Ville5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_user' => 10,
                'nb_groovies' => 0,
                'name' => 'Nom6',
                'firstname' => 'Prénom6',
                'city' => 'Ville6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('GRV1_Groovers')->insert($groovers);

        $admins = [
            [
                'Id_user' => 1,
                'name' => 'Thomas',
                'firstname' => 'Pareschi',
                'super_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_user' => 2,
                'name' => 'Florian',
                'firstname' => 'Dide',
                'super_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_user' => 3,
                'name' => 'Amélie',
                'firstname' => 'Benoist',
                'super_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_user' => 4,
                'name' => 'Théo',
                'firstname' => 'Jorge-Oliveira',
                'super_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('GRV1_Admins')->insert($admins);
    }
}
