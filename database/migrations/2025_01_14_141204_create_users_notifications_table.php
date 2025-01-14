<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersNotificationsTable extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Users_Notifications', function (Blueprint $table) {
            $table->id('Id_user_notification');
            $table->timestamps();
            $table->foreignId('Id_user')->constrained('GRV1_Users')->references('Id_user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Id_notification')->constrained('GRV1_Notifications')->references('Id_notification')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Users_Notifications');
    }
}
