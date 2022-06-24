<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalMunaqosahsTable extends Migration
{
    public function up()
    {
        Schema::create('jadwal_munaqosahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('sesi');
            $table->integer('maks_santri');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}