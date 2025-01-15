<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Groovers_Settings', function (Blueprint $table) {
            $table->id('Id_groover_setting');
            $table->timestamps();
            $table->foreignId('Id_groover')->constrained('GRV1_Groovers')->references('Id_groover')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_setting')->constrained('GRV1_Settings')->references('Id_setting')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Groovers_Settings');
    }
};
