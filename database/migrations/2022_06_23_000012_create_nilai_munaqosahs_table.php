<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiMunaqosahsTable extends Migration
{
    public function up()
    {
        Schema::create('nilai_munaqosahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nilai_bacaan');
            $table->integer('nilai_pemahaman');
            $table->string('nilai_kelengkapan');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}