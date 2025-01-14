<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Offers_Preferences', function (Blueprint $table) {
            $table->id('Id_Offers_Preferences');
            $table->timestamps();
            $table->foreignId('Id_preferences')->constrained('GRV1_Preferences')->references('Id_preferences')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_offer')->constrained('GRV1_Offers')->references('Id_offer')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Offers_Preferences');
    }
};
