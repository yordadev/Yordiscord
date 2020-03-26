<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_logs', function (Blueprint $table) {
            $table->id();
            $table->string('server_id');
            $table->string('discord_id');
            $table->string('action');
            $table->boolean('has_additional')->default(false);
            $table->longText('additional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_logs');
    }
}
