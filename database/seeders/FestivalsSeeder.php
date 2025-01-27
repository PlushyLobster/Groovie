<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FestivalsSeeder extends Seeder
{
    public function run(): void
    {
        $festivals = [
            [
                'type' => 'Extérieur',
                'name' => 'Festival de Cannes',
                'start_datetime' => '2025-05-14 10:00:00',
                'end_datetime' => '2025-05-25 23:59:00',
                'created_at' => now(),
                'updated_at' => now(),
                'id_recup_api' => 1,
            ],
            [
                'type' => 'Intérieur',
                'name' => 'Printemps de Bourges',
                'start_datetime' => '2025-04-22 15:00:00',
                'end_datetime' => '2025-04-27 23:59:00',
                'created_at' => now(),
                'updated_at' => now(),
                'id_recup_api' => 2,
            ],
            [
                'type' => 'Extérieur',
                'name' => 'Les Vieilles Charrues',
                'start_datetime' => '2025-07-18 12:00:00',
                'end_datetime' => '2025-07-21 23:59:00',
                'created_at' => now(),
                'updated_at' => now(),
                'id_recup_api' => 3,
            ],
            [
                'type' => 'Extérieur',
                'name' => 'Rock en Seine',
                'start_datetime' => '2025-08-22 14:00:00',
                'end_datetime' => '2025-08-25 23:00:00',
                'created_at' => now(),
                'updated_at' => now(),
                'id_recup_api' => 4,
            ],
            [
                'type' => 'Intérieur',
                'name' => 'Festival Lumière',
                'start_datetime' => '2025-10-12 18:00:00',
                'end_datetime' => '2025-10-20 23:59:00',
                'created_at' => now(),
                'updated_at' => now(),
                'id_recup_api' => NULL,
            ],
            [
                'type' => 'Extérieur',
                'name' => 'Fête de la Musique',
                'start_datetime' => '2025-06-21 10:00:00',
                'end_datetime' => '2025-06-21 23:59:00',
                'created_at' => now(),
                'updated_at' => now(),
                'id_recup_api' => NULL,
            ],
            [
                'type' => 'Intérieur',
                'name' => 'Hellfest',
                'start_datetime' => '2025-06-20 15:00:00',
                'end_datetime' => '2025-06-23 02:00:00',
                'created_at' => now(),
                'updated_at' => now(),
                'id_recup_api' => 7,
            ],
            [
                'type' => 'Extérieur',
                'name' => 'Jazz à Vienne',
                'start_datetime' => '2025-06-28 17:00:00',
                'end_datetime' => '2025-07-13 23:59:00',
                'created_at' => now(),
                'updated_at' => now(),
                'id_recup_api' => 8,
            ],
            [
                'type' => 'Extérieur',
                'name' => 'Festival d\'Avignon',
                'start_datetime' => '2025-07-04 09:00:00',
                'end_datetime' => '2025-07-26 23:59:00',
                'created_at' => now(),
                'updated_at' => now(),
                'id_recup_api' => NULL,
            ],
            [
                'type' => 'Intérieur',
                'name' => 'Nuits Sonores',
                'start_datetime' => '2025-05-28 20:00:00',
                'end_datetime' => '2025-06-01 23:59:00',
                'created_at' => now(),
                'updated_at' => now(),
                'id_recup_api' => 10,
            ],
        ];

        DB::table('GRV1_Festivals')->insert($festivals);
    }
}
