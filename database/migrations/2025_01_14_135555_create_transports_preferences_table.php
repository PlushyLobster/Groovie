<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsPreferencesTable extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Transports_Preferences', function (Blueprint $table) {
            $table->id('Id_transports_preferences');
            $table->timestamps();
            $table->foreignId('Id_preferences')->constrained('GRV1_Preferences')->references('Id_preferences')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_transport')->constrained('GRV1_Transports')->references('Id_transport')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Transports_Preferences');
    }
}
