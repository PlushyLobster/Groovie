<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Offers', function (Blueprint $table) {
            $table->id('Id_offer');
            $table->string('type', 50);
            $table->string('name', 50);
            $table->string('description', 50);
            $table->string('condition_purchase', 50);
            $table->timestamps();
            $table->foreignId('Id_partner')->constrained('GRV1_Partner')->references('Id_partner')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Offers');
    }
};
