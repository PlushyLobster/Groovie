<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Settings', function (Blueprint $table) {
            $table->id('Id_setting');
            $table->string('geoloc_active', 50)->nullable();
            $table->string('language_pref', 50)->nullable();
            $table->string('favorite_theme', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Settings');
    }
};
