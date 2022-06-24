<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDewanGurusTable extends Migration
{
    public function up()
    {
        Schema::create('dewan_gurus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('telepon')->nullable();
            $table->string('alamat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}