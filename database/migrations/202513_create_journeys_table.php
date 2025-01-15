<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Journeys', function (Blueprint $table) {
            $table->id('Id_journey');
            $table->string('departure_city', 75);
            $table->string('arrival_city', 75);
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->smallInteger('status');
            $table->unsignedBigInteger('Id_parent')->nullable();
            $table->integer('groovie_won')->comment('nombre de groovies gagnés');
            $table->timestamps();
            $table->foreign('Id_parent')->references('Id_journey')->on('GRV1_Journeys')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_transport')->constrained('GRV1_Transports')->references('Id_transport')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Journeys');
    }
};
