<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FestivalsMusicalBandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $festivalMusicalBands = [
            ['Id_festival' => 1, 'Id_musical_band' => 1],
            ['Id_festival' => 1, 'Id_musical_band' => 2],
            ['Id_festival' => 2, 'Id_musical_band' => 3],
            ['Id_festival' => 3, 'Id_musical_band' => 4],
            ['Id_festival' => 4, 'Id_musical_band' => 5],
        ];
        DB::table('GRV1_Festivals_Musical_Bands')->insert($festivalMusicalBands);
    }
}
