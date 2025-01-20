<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Désactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Vider les tables avant d'insérer les nouvelles données
        DB::table('GRV1_Musical_genres')->truncate();
        DB::table('GRV1_Festivals')->truncate();
        DB::table('GRV1_Users')->truncate();
        DB::table('GRV1_Admins')->truncate();
        DB::table('GRV1_Groovers')->truncate();
        DB::table('GRV1_Transports')->truncate();
        DB::table('GRV1_Settings')->truncate();
        DB::table('GRV1_Partners')->truncate();
        DB::table('GRV1_Notifications')->truncate();
        DB::table('GRV1_Journeys')->truncate();
        DB::table('GRV1_Offers')->truncate();
        DB::table('GRV1_News')->truncate();
        DB::table('GRV1_Challenges')->truncate();
        DB::table('GRV1_Playlists')->truncate();
        DB::table('GRV1_Games')->truncate();
        DB::table('GRV1_Tickets')->truncate();
        DB::table('GRV1_Festivals_Musical_genres')->truncate();
        DB::table('GRV1_Groovers_Challenges')->truncate();
        DB::table('GRV1_Groovers_Settings')->truncate();
        DB::table('GRV1_Offers_Settings')->truncate();
        DB::table('GRV1_Settings_Musical_genres')->truncate();
        DB::table('GRV1_Transports_Settings')->truncate();
        DB::table('GRV1_Users_Transports')->truncate();
        DB::table('GRV1_Users_Festivals')->truncate();
        DB::table('GRV1_Users_Journeys')->truncate();
        DB::table('GRV1_Users_Notifications')->truncate();
        DB::table('GRV1_Festivals_Journeys')->truncate();

        // Réactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call([
            MusicalGenresSeeder::class,
            FestivalsSeeder::class,
            UsersSeeder::class,
            AdminsSeeder::class,
            GrooversSeeder::class,
            TransportsSeeder::class,
            SettingsSeeder::class,
            PartnersSeeder::class,
            NotificationsSeeder::class,
            JourneysSeeder::class,
            OffersSeeder::class,
            NewsSeeder::class,
            ChallengesSeeder::class,
            PlaylistsSeeder::class,
            GamesSeeder::class,
            TicketsSeeder::class,
            FestivalsMusicalGenresSeeder::class,
            GrooversChallengesSeeder::class,
            GrooversSettingsSeeder::class,
            OffersSettingsSeeder::class,
            SettingsMusicalGenresSeeder::class,
            TransportsSettingsSeeder::class,
            UsersTransportsSeeder::class,
            UsersFestivalsSeeder::class,
            UsersJourneysSeeder::class,
            UsersNotificationsSeeder::class,
            FestivalsJourneysSeeder::class,
        ]);
    }
}
