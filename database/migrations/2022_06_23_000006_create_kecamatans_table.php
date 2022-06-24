<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatansTable extends Migration
{
    public function up()
    {
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kabupaten_id')->nullable();
            $table->foreign('kabupaten_id', 'kabupaten_fk_6849997')->references('id')->on('kabupatens');
            $table->string('name');
        });
    }
}