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
        Schema::create('GRV1_groovers_challenges', function (Blueprint $table) {
            $table->id('Id_groover_challenge');
            $table->timestamps();
            $table->foreignId('Id_groover')->constrained('GRV1_Groovers')->references('Id_groover')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_challenge')->constrained('GRV1_Challenges')->references('Id_challenge')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GRV1_groovers_challenges');
    }
};
