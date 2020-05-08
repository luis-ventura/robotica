<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacorasTable extends Migration
{
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('adviser');
            $table->dateTime('entry_time');
            $table->dateTime('departure_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bitacoras');
    }
}
