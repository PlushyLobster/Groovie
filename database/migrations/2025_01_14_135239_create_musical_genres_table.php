<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicalGenresTable extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Musical_genres', function (Blueprint $table) {
            $table->id('Id_musical_genre');
            $table->string('type', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Musical_genres');
    }
}
