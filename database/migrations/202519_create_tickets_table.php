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
        Schema::create('GRV1_Tickets', function (Blueprint $table) {
            $table->id('Id_ticket');
            $table->string('number', 50);
            $table->dateTime('date_of_use');
            $table->timestamps();
            $table->foreignId('Id_user')->nullable()->constrained('GRV1_Users')->references('Id_user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_festival')->constrained('GRV1_Festivals')->references('Id_festival')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GRV1_Tickets');
    }
};
