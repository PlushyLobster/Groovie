<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OffersSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Récupérer tous les Id_journey existants dans la table GRV1_Journeys
        $journeyIds = DB::table('GRV1_Journeys')->pluck('Id_journey')->toArray();

        // Récupérer tous les Id_partner existants dans la table GRV1_Partners
        $partnerIds = DB::table('GRV1_Partners')->pluck('Id_partner')->toArray();

        $offers = [];
        foreach ($partnerIds as $partnerId) {
            $offers[] = [
                'Id_journey' => $faker->randomElement($journeyIds),
                'Id_partner' => $partnerId,
                'type' => $faker->randomElement(['Snack', 'Transport', 'Loisirs']),
                'name' => $faker->word,
                'description' => $faker->sentence,
                'condition_purchase' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Offers')->insert($offers);
    }
}
