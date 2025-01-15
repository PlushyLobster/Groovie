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
        Schema::create('GRV1_Playlists', function (Blueprint $table) {
            $table->id('id_playlist');
            $table->string('name', 100);
            $table->string('link',200);
            $table->timestamps();
            $table->foreignId('id_partner')->constrained('GRV1_Partner')->references('id_partner')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_festival')->constrained('GRV1_Festivals')->references('id_festival')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GRV1_Playlists');
    }
};
