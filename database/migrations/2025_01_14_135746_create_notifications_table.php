<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up(): void
    {
        Schema::create('GRV1_Notifications', function (Blueprint $table) {
            $table->id('Id_notification');
            $table->smallInteger('importance');
            $table->string('message', 250);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('GRV1_Notifications');
    }
}
