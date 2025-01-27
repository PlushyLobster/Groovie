<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicalBandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $musicalBands = [
            ['name' => 'The Beatles','created_at' => now(),'updated_at' => now()],
            ['name' => 'The Doors','created_at' => now(),'updated_at' => now()],
            ['name' => 'The Who','created_at' => now(),'updated_at' => now()],
            ['name' => 'Queen','created_at' => now(),'updated_at' => now()],
            ['name' => 'Pink Floyd','created_at' => now(),'updated_at' => now()],
            ['name' => 'Led Zeppelin','created_at' => now(),'updated_at' => now()],
            ['name' => 'The Rolling Stones','created_at' => now(),'updated_at' => now()],
        ];

        DB::table('GRV1_Musical_Bands')->insert($musicalBands);
    }
}
