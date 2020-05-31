<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacoraServicioSocialTable extends Migration
{
    public function up()
    {
        Schema::create('bitacora_servicio_social', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('adviser');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bitacora_servicio_social');
    }
}
