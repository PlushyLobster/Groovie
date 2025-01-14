<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneysTable extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Journeys', function (Blueprint $table) {
            $table->id('Id_journey');
            $table->string('departure_city', 75);
            $table->string('arrival_city', 75);
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->smallInteger('status');
            $table->string('Id_parent', 50)->nullable();
            $table->integer('groovie_won')->comment('nombre de groovies gagnés');
            $table->timestamps();
            $table->foreignId('Id_journey_1')->constrained('GRV1_Journeys')->references('Id_journey')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_transport')->constrained('GRV1_Transports')->references('Id_transport')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Journeys');
    }
}
