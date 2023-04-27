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
            $table->string('name');
            $table->string('password');
            $table->integer('registered_ninja')->nullable();
            $table->string('email')->unique();
            $table->string('village')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('ninja_rank')->nullable();
            $table->string('date_birth')->nullable();
            $table->string('age')->nullable();
            $table->string('mission_succes')->nullable();
            $table->string('image')->nullable();
            $table->rememberToken();
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
