<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Groovers_Preferences', function (Blueprint $table) {
            $table->id('Id_groovers_preferences');
            $table->timestamps();
            $table->foreignId('Id_groover')->constrained('GRV1_Groovers')->references('Id_groover')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_preferences')->constrained('GRV1_Preferences')->references('Id_preferences')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Groovers_Preferences');
    }
};
