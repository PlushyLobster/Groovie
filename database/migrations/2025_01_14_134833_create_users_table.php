<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Users', function (Blueprint $table) {
            $table->id('Id_user');
            $table->boolean('active')->nullable();
            $table->string('username', 50);
            $table->string('email', 100);
            $table->string('password', 255);
            $table->boolean('cgu_validated')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Users');
    }
}
