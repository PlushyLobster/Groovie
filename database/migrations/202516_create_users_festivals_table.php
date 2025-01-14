<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Users_Festivals', function (Blueprint $table) {
            $table->id('Id_Users_Festivals');
            $table->timestamps();
            $table->foreignId('Id_user')->constrained('GRV1_Users')->references('Id_user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_festival')->constrained('GRV1_Festivals')->references('Id_festival')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Users_Festivals');
    }
};
