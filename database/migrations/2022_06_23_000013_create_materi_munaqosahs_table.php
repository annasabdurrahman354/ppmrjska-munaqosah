<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriMunaqosahsTable extends Migration
{
    public function up()
    {
        Schema::create('materi_munaqosahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('materi');
            $table->string('jenis');
            $table->string('keterangan');
            $table->integer('angkatan');
            $table->string('tahun_pelajaran');
            $table->integer('semester');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}