<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('GRV1_musical_bands_programs', function (Blueprint $table) {
            $table->id('Id_musical_band_program');
            $table->timestamps();
            $table->foreignId('Id_musical_band')->constrained('GRV1_Musical_Bands')->references('Id_musical_band')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_program')->constrained('GRV1_Programs')->references('Id_program')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GRV1_musical_bands_programs');
    }
};
