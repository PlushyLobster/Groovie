<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            ['Id_festival' => 1, 'name' => 'Opening Ceremony','day_presence'=> '2025-05-13', 'start_time' => '18:00:00'],
            ['Id_festival' => 1, 'name' => 'Closing Ceremony','day_presence' => '2025-05-24', 'start_time' => '20:00:00'],
            ['Id_festival' => 2, 'name' => 'Main Event','day_presence'=> '2025-04-15', 'start_time' => '18:00:00'],
            ['Id_festival' => 3, 'name' => 'Rock Night','day_presence'=> '2025-07-17', 'start_time' => '18:00:00'],
            ['Id_festival' => 4, 'name' => 'Jazz Evening','day_presence'=> '2025-08-20', 'start_time' => '18:00:00'],
        ];

        DB::table('GRV1_Programs')->insert($programs);
    }
}
