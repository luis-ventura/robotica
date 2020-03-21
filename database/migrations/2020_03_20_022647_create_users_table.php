<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',80);
            $table->string('lastname',80)->nullable();
            $table->string('email',100)->unique();
            $table->integer('control_number')->unique()->nullable();
            $table->string('career')->nullable();
            $table->string('activity')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable()->default('default.png');
            //$table->unsignedBigInteger('role_id')->autoIncrement();
            $table->rememberToken();
            $table->timestamps();

            ///$table->foreign('role_id')->references('id')->on('roles');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}