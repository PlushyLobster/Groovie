<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Festivals_Journeys', function (Blueprint $table) {
            $table->id('Id_festival_journey');
            $table->timestamps();
            $table->foreignId('Id_festival')->constrained('GRV1_Festivals')->references('Id_festival')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_journey')->constrained('GRV1_Journeys')->references('Id_journey')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Festivals_Journeys');
    }
};
