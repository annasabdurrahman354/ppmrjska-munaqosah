<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriKbmsTable extends Migration
{
    public function up()
    {
        Schema::create('materi_kbms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('materi');
            $table->string('jenis');
            $table->integer('halaman')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}