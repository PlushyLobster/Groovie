<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Groovers', function (Blueprint $table) {
            $table->id('Id_groover');
            $table->integer('nb_groovies')->default(0);
            $table->string('name', 50);
            $table->string('firstname', 50);
            $table->string('city', 110);
            $table->smallInteger('level')->default(0);
            $table->timestamps();
            $table->foreignId('Id_user')->unique()->constrained('GRV1_Users')->references('Id_user')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Groovers');
    }
};
