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
            $table->id('Id_playlist');
            $table->string('name', 100);
            $table->string('link',200);
            $table->timestamps();
            $table->foreignId('Id_partner')->constrained('GRV1_Partners')->references('Id_partner')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_festival')->constrained('GRV1_Festivals')->references('Id_festival')->onDelete('cascade')->onUpdate('cascade');
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
