<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OffersSeeder extends Seeder
{
    public function run(): void
    {
        $offers = [
            [
                'Id_partner' => 1,
                'type' => 'Snack',
                'name' => 'Menu Big Mac',
                'description' => 'Un menu Big Mac à prix réduit',
                'condition_purchase' => 'Valable uniquement sur présentation du billet de transport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_partner' => 2,
                'type' => 'Transport',
                'name' => 'Réduction SNCF',
                'description' => '10% de réduction sur votre prochain voyage',
                'condition_purchase' => 'Valable pour les trajets de plus de 100 km',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_partner' => 3,
                'type' => 'Loisirs',
                'name' => 'Abonnement Deezer',
                'description' => '1 mois d\'abonnement gratuit',
                'condition_purchase' => 'Valable pour les nouveaux abonnés uniquement',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_partner' => 4,
                'type' => 'Snack',
                'name' => 'Coca-Cola gratuit',
                'description' => 'Une bouteille de Coca-Cola offerte',
                'condition_purchase' => 'Valable pour tout achat d\'un menu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_partner' => 5,
                'type' => 'Transport',
                'name' => 'Réduction BlaBlaCar',
                'description' => '5€ de réduction sur votre prochain trajet',
                'condition_purchase' => 'Valable pour les trajets de plus de 50 km',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_partner' => 6,
                'type' => 'Loisirs',
                'name' => 'Location de vélo',
                'description' => '1 heure de location de vélo gratuite',
                'condition_purchase' => 'Valable pour toute location de plus de 2 heures',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_partner' => 1,
                'type' => 'Snack',
                'name' => 'Menu Happy Meal',
                'description' => 'Un menu Happy Meal à prix réduit',
                'condition_purchase' => 'Valable uniquement sur présentation du billet de transport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_partner' => 2,
                'type' => 'Transport',
                'name' => 'Réduction SNCF',
                'description' => '15% de réduction sur votre prochain voyage',
                'condition_purchase' => 'Valable pour les trajets de plus de 200 km',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_partner' => 3,
                'type' => 'Loisirs',
                'name' => 'Abonnement Deezer',
                'description' => '2 mois d\'abonnement gratuit',
                'condition_purchase' => 'Valable pour les nouveaux abonnés uniquement',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Id_partner' => 4,
                'type' => 'Snack',
                'name' => 'Coca-Cola gratuit',
                'description' => 'Deux bouteilles de Coca-Cola offertes',
                'condition_purchase' => 'Valable pour tout achat d\'un menu familial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('GRV1_Offers')->insert($offers);
    }
}
