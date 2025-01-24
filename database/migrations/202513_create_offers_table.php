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
            $table->text('description');
            $table->text('condition_purchase');
            $table->timestamps();
            $table->foreignId('Id_partner')->nullable()->constrained('GRV1_Partners')->references('Id_partner')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Offers');
    }
};
