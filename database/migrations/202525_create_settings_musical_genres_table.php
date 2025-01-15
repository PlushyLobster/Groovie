<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Settings_Musical_genres', function (Blueprint $table) {
            $table->id('Id_setting_musical_genre');
            $table->timestamps();
            $table->foreignId('Id_setting')->constrained('GRV1_Settings')->references('Id_setting')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_musical_genre')->constrained('GRV1_Musical_genres')->references('Id_musical_genre')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Settings_Musical_genres');
    }
};
