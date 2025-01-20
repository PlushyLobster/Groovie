<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PlaylistsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $playlists = [];
        for ($i = 0; $i < 10; $i++) {
            $playlists[] = [
                'name' => $faker->word,
                'link' => $faker->url,
                'Id_partner' => $faker->numberBetween(1, 10),
                'Id_festival' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_Playlists')->insert($playlists);
    }
}
