<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNilaiMunaqosahsTable extends Migration
{
    public function up()
    {
        Schema::table('nilai_munaqosahs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6850792')->references('id')->on('users');
            $table->unsignedBigInteger('jadwal_munaqosah_id')->nullable();
            $table->foreign('jadwal_munaqosah_id', 'jadwal_munaqosah_fk_6851390')->references('id')->on('jadwal_munaqosahs');
            $table->unsignedBigInteger('materi_munaqosah_id')->nullable();
            $table->foreign('materi_munaqosah_id', 'materi_munaqosah_fk_6852100')->references('id')->on('materi_munaqosahs');
            $table->unsignedBigInteger('dewan_guru_id')->nullable();
            $table->foreign('dewan_guru_id', 'dewan_guru_fk_6852403')->references('id')->on('dewan_gurus');
        });
    }
}