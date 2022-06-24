<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPlotMunaqosahsTable extends Migration
{
    public function up()
    {
        Schema::table('plot_munaqosahs', function (Blueprint $table) {
            $table->unsignedBigInteger('jadwal_munaqosah_id')->nullable();
            $table->foreign('jadwal_munaqosah_id', 'jadwal_munaqosah_fk_6850730')->references('id')->on('jadwal_munaqosahs');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6850731')->references('id')->on('users');
        });
    }
}