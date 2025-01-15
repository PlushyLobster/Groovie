<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Festivals', function (Blueprint $table) {
            $table->id('Id_festival');
            $table->string('type', 50);
            $table->string('name', 100)->unique();
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->timestamps();
            $table->foreignId('Id_musical_genre')->constrained('GRV1_Musical_genres')->references('Id_musical_genre')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Festivals');
    }
};
