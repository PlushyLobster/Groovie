<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JourneysSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Récupérer tous les Id_transports existants dans la table GRV1_Transports
        $transportIds = DB::table('GRV1_Transports')->pluck('Id_transport')->toArray();

        // Insérer des enregistrements sans Id_parent
        $journeys = [];
        for ($i = 0; $i < 10; $i++) {
            $journeys[] = [
                'departure_city' => $faker->city,
                'arrival_city' => $faker->city,
                'departure_date' => $faker->date,
                'arrival_date' => $faker->date,
                'departure_time' => $faker->time,
                'arrival_time' => $faker->time,
                'status' => $faker->randomElement(['enregitré','réservé','annulé']),
                'groovie_won' => $faker->numberBetween(0, 500),
                'Id_transport' => $faker->randomElement($transportIds),
            ];
        }
        DB::table('GRV1_Journeys')->insert($journeys);

        // Récupérer les Id_journey des enregistrements insérés
        $journeyIds = DB::table('GRV1_Journeys')->pluck('Id_journey')->toArray();

        // Mettre à jour les enregistrements avec des valeurs valides pour Id_parent
        $updatedJourneys = [];
        foreach ($journeyIds as $id) {
            $updatedJourneys[] = [
                'Id_journey' => $id,
                'Id_parent' => $faker->randomElement($journeyIds),
                'departure_city' => $faker->city,
                'arrival_city' => $faker->city,
                'departure_date' => $faker->date,
                'arrival_date' => $faker->date,
                'departure_time' => $faker->time,
                'arrival_time' => $faker->time,
                'status' => $faker->randomElement(['enregitré','réservé','annulé']),
                'groovie_won' => $faker->numberBetween(0, 500),
                'Id_transport' => $faker->randomElement($transportIds),
            ];
        }
        DB::table('GRV1_Journeys')->upsert($updatedJourneys, ['Id_journey'], ['Id_parent', 'departure_city', 'arrival_city', 'departure_date', 'arrival_date', 'departure_time', 'arrival_time', 'status', 'groovie_won', 'Id_transport']);
    }
}
