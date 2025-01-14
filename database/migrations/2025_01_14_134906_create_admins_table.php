<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Admins', function (Blueprint $table) {
            $table->id('Id_admin');
            $table->string('name', 100);
            $table->string('firstname', 110);
            $table->boolean('super_admin');
            $table->timestamps();
            $table->foreignId('Id_user')->unique()->constrained('GRV1_Users')->references('Id_user')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Admins');
    }
}
