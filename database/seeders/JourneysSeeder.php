<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JourneysSeeder extends Seeder
{
    public function run(): void
    {
        $journeys = [
            [
                'departure_city' => 'Paris',
                'arrival_city' => 'Lyon',
                'departure_date' => '2025-05-01',
                'arrival_date' => '2025-05-01',
                'departure_time' => '08:00:00',
                'arrival_time' => '11:00:00',
                'Id_transport' => 1,
                'groovie_won' => 0,
                'Id_parent' => null,
                'Id_offer' => null,
                'status' => 'enregistré'
            ],
            [
                'departure_city' => 'Paris',
                'arrival_city' => 'Orléans',
                'departure_date' => '2025-05-01',
                'arrival_date' => '2025-05-01',
                'departure_time' => '08:00:00',
                'arrival_time' => '09:00:00',
                'Id_transport' => 1,
                'groovie_won' => 0,
                'Id_parent' => 1,
                'Id_offer' => 1,
                'status' => 'validé'
            ],
            [
                'departure_city' => 'Orléans',
                'arrival_city' => 'Lyon',
                'departure_date' => '2025-05-01',
                'arrival_date' => '2025-05-01',
                'departure_time' => '09:30:00',
                'arrival_time' => '11:00:00',
                'Id_transport' => 1,
                'groovie_won' => 0,
                'Id_parent' => 1,
                'Id_offer' => null,
                'status' => 'annulé'
            ],
            [
                'departure_city' => 'Marseille',
                'arrival_city' => 'Nice',
                'departure_date' => '2025-06-15',
                'arrival_date' => '2025-06-15',
                'departure_time' => '10:00:00',
                'arrival_time' => '12:00:00',
                'Id_transport' => 2,
                'groovie_won' => 0,
                'Id_parent' => null,
                'Id_offer' => 2,
                'status' => 'enregistré'
            ],
            [
                'departure_city' => 'Marseille',
                'arrival_city' => 'Toulon',
                'departure_date' => '2025-06-15',
                'arrival_date' => '2025-06-15',
                'departure_time' => '10:00:00',
                'arrival_time' => '10:45:00',
                'Id_transport' => 2,
                'groovie_won' => 0,
                'Id_parent' => 4,
                'Id_offer' => null,
                'status' => 'validé'
            ],
            [
                'departure_city' => 'Toulon',
                'arrival_city' => 'Nice',
                'departure_date' => '2025-06-15',
                'arrival_date' => '2025-06-15',
                'departure_time' => '11:00:00',
                'arrival_time' => '12:00:00',
                'Id_transport' => 2,
                'groovie_won' => 0,
                'Id_parent' => 4,
                'Id_offer' => 3,
                'status' => 'annulé'
            ],
            [
                'departure_city' => 'Bordeaux',
                'arrival_city' => 'Toulouse',
                'departure_date' => '2025-07-20',
                'arrival_date' => '2025-07-20',
                'departure_time' => '14:00:00',
                'arrival_time' => '16:00:00',
                'Id_transport' => 3,
                'groovie_won' => 0,
                'Id_parent' => null,
                'Id_offer' => null,
                'status' => 'enregistré'
            ],
            [
                'departure_city' => 'Bordeaux',
                'arrival_city' => 'Agen',
                'departure_date' => '2025-07-20',
                'arrival_date' => '2025-07-20',
                'departure_time' => '14:00:00',
                'arrival_time' => '15:00:00',
                'Id_transport' => 3,
                'groovie_won' => 0,
                'Id_parent' => 7,
                'Id_offer' => 4,
                'status' => 'validé'
            ],
            [
                'departure_city' => 'Agen',
                'arrival_city' => 'Toulouse',
                'departure_date' => '2025-07-20',
                'arrival_date' => '2025-07-20',
                'departure_time' => '15:15:00',
                'arrival_time' => '16:00:00',
                'Id_transport' => 3,
                'groovie_won' => 0,
                'Id_parent' => 7,
                'Id_offer' => null,
                'status' => 'annulé'
            ]
        ];

        DB::table('GRV1_Journeys')->insert($journeys);
    }
}
