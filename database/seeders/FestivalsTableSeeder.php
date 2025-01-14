<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FestivalsTableSeeder extends Seeder
{
    public function run(): void
    {
        $genres = DB::table('GRV1_Musical_genres')->pluck('Id_musical_genre', 'type');

        $festivals = [
            [
                'name' => 'Les Vieilles Charrues',
                'start_datetime' => '2025-07-11 00:00:00',
                'end_datetime' => '2025-07-14 23:59:59',
                'Id_musical_genre' => $genres['Rock'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hellfest',
                'start_datetime' => '2025-06-21 00:00:00',
                'end_datetime' => '2025-06-23 23:59:59',
                'Id_musical_genre' => $genres['Rock'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Electrobeach',
                'start_datetime' => '2025-07-17 00:00:00',
                'end_datetime' => '2025-07-19 23:59:59',
                'Id_musical_genre' => $genres['Musique électronique'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jazz à Juan',
                'start_datetime' => '2025-07-12 00:00:00',
                'end_datetime' => '2025-07-21 23:59:59',
                'Id_musical_genre' => $genres['Jazz'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Francofolies de La Rochelle',
                'start_datetime' => '2025-07-10 00:00:00',
                'end_datetime' => '2025-07-14 23:59:59',
                'Id_musical_genre' => $genres['Chanson française'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Solidays',
                'start_datetime' => '2025-06-23 00:00:00',
                'end_datetime' => '2025-06-25 23:59:59',
                'Id_musical_genre' => $genres['Pop'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Festival Interceltique de Lorient',
                'start_datetime' => '2025-08-02 00:00:00',
                'end_datetime' => '2025-08-11 23:59:59',
                'Id_musical_genre' => $genres['Musiques celtiques'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Festival de Nîmes',
                'start_datetime' => '2025-06-17 00:00:00',
                'end_datetime' => '2025-07-24 23:59:59',
                'Id_musical_genre' => $genres['Variété internationale'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lollapalooza Paris',
                'start_datetime' => '2025-07-20 00:00:00',
                'end_datetime' => '2025-07-21 23:59:59',
                'Id_musical_genre' => $genres['Pop'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cabaret Vert',
                'start_datetime' => '2025-08-21 00:00:00',
                'end_datetime' => '2025-08-25 23:59:59',
                'Id_musical_genre' => $genres['Rock'],
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('GRV1_Festivals')->insert($festivals);
    }
}
