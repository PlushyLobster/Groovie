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
            $table->date('start_datetime');
            $table->date('end_datetime');
            $table->timestamps();
            $table->unsignedInteger('Id_recup_api')->unique()->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Festivals');
    }
};
