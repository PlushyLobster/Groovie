<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $news = [];
        for ($i = 0; $i < 10; $i++) {
            $news[] = [
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
                'publication_datetime' => $faker->dateTime,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('GRV1_News')->insert($news);
    }
}
