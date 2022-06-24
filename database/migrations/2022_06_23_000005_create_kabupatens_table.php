<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKabupatensTable extends Migration
{
    public function up()
    {
        Schema::create('kabupatens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('provinsi_id')->nullable();
            $table->foreign('provinsi_id', 'provinsi_fk_6849991')->references('id')->on('provinsis');
            $table->string('name');
        });
    }
}