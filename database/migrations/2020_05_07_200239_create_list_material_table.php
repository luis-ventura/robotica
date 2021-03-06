<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListMaterialTable extends Migration
{
    public function up()
    {
        Schema::create('list_material', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_material');
            $table->string('material',120);
            $table->text('observation');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('list_material');
    }
}
