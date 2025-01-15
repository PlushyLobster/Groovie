<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Transports', function (Blueprint $table) {
            $table->id('Id_transport');
            $table->boolean('creator')->nullable();
            $table->dateTime('type');
            $table->smallInteger('nb_slot');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Transports');
    }
};
