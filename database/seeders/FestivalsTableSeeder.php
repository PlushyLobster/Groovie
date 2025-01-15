<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FestivalsTableSeeder extends Seeder
{
    public function run(): void
    {
        $festivals = [
            ['type' => 'Festival', 'name' => 'Les Vieilles Charrues', 'start_datetime' => '2024-07-14 12:00:00', 'end_datetime' => '2024-07-17 23:59:59', 'Id_musical_genre' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Festival', 'name' => 'Hellfest', 'start_datetime' => '2024-06-17 12:00:00', 'end_datetime' => '2024-06-20 23:59:59', 'Id_musical_genre' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Festival', 'name' => 'Electrobeach', 'start_datetime' => '2024-07-14 12:00:00', 'end_datetime' => '2024-07-17 23:59:59', 'Id_musical_genre' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Festival', 'name' => 'Jazz à Juan', 'start_datetime' => '2024-07-14 12:00:00', 'end_datetime' => '2024-07-17 23:59:59', 'Id_musical_genre' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Festival', 'name' => 'Francofolies de La Rochelle', 'start_datetime' => '2024-07-14 12:00:00', 'end_datetime' => '2024-07-17 23:59:59', 'Id_musical_genre' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Festival', 'name' => 'Solidays', 'start_datetime' => '2024-07-14 12:00:00', 'end_datetime' => '2024-07-17 23:59:59', 'Id_musical_genre' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Festival', 'name' => 'Festival Interceltique de Lorient', 'start_datetime' => '2024-07-14 12:00:00', 'end_datetime' => '2024-07-17 23:59:59', 'Id_musical_genre' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Festival', 'name' => 'Festival de Nîmes', 'start_datetime' => '2024-07-14 12:00:00', 'end_datetime' => '2024-07-17 23:59:59', 'Id_musical_genre' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Festival', 'name' => 'Lollapalooza Paris', 'start_datetime' => '2024-07-14 12:00:00', 'end_datetime' => '2024-07-17 23:59:59', 'Id_musical_genre' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Festival', 'name' => 'Cabaret Vert', 'start_datetime' => '2024-07-14 12:00:00', 'end_datetime' => '2024-07-17 23:59:59', 'Id_musical_genre' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('GRV1_Festivals')->insert($festivals);
    }
}
