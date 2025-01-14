<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferencesMusicalGenresTable extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Preferences_Musical_genres', function (Blueprint $table) {
            $table->id('Id_preferences_musical_genres');
            $table->timestamps();
            $table->foreignId('Id_preferences')->constrained('GRV1_Preferences')->references('Id_preferences')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_musical_genre')->constrained('GRV1_Musical_genres')->references('Id_musical_genre')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Preferences_Musical_genres');
    }
}
