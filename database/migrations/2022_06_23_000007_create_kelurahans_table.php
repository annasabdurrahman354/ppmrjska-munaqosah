<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelurahansTable extends Migration
{
    public function up()
    {
        Schema::create('kelurahans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->foreign('kecamatan_id', 'kecamatan_fk_6850020')->references('id')->on('kecamatans');
            $table->string('name');
        });
    }
}