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
        Schema::create('GRV1_Festivals_Musical_Bands', function (Blueprint $table) {
            $table->id('Id_festival_musical_band');
            $table->foreignId('Id_festival')->constrained('GRV1_Festivals')->references('Id_festival')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_musical_band')->constrained('GRV1_Musical_Bands')->references('Id_musical_band')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GRV1_festivals_musical_bands');
    }
};
