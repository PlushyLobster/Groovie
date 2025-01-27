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
        Schema::create('GRV1_Programs', function (Blueprint $table) {
            $table->id('Id_program');
            $table->string('name', 100);
            $table->string('day_presence', 100);
            $table->time('start_time');
            $table->timestamps();
            $table->foreignId('Id_festival')->constrained('GRV1_Festivals')->references('Id_festival')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GRV1_Programs');
    }
};
