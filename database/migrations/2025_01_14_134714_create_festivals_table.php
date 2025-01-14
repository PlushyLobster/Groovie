<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFestivalsTable extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Festivals', function (Blueprint $table) {
            $table->id('Id_festival');
            $table->string('name', 100)->nullable();
            $table->dateTime('start_datetime');
            $table->date('end_datetime')->nullable();
            $table->timestamps();
            $table->foreignId('Id_musical_genre')->constrained('GRV1_Musical_genres')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Festivals');
    }
}
