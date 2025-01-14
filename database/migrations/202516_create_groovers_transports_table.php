<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Groovers_Transports', function (Blueprint $table) {
            $table->id('Id_Groovers_Transports');
            $table->timestamps();
            $table->foreignId('Id_groover')->constrained('GRV1_Groovers')->references('Id_groover')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_transport')->constrained('GRV1_Transports')->references('Id_transport')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Groovers_Transports');
    }
};
