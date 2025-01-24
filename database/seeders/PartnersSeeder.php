<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnersSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            ['name' => 'McDonald\'s', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SNCF', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Deezer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Coca-Cola', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'BlaBlaCar', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Loir à Vélo', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('GRV1_Partners')->insert($partners);
    }
}
