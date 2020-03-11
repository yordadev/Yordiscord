<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');
            $table->string('username');
            $table->string('email');
            $table->string('discord_id');
            $table->string('discriminator');
            $table->boolean('verified');
            $table->string('locale');
            $table->boolean('mfa_enabled');
            $table->integer('flags');
            $table->integer('premium_type');
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
        Schema::dropIfExists('users');
    }
}
