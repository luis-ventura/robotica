<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadPdfTable extends Migration
{
    public function up()
    {
        Schema::create('upload_pdf', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('upload');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('upload_pdf');
    }
}
