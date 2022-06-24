<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJadwalMunaqosahsTable extends Migration
{
    public function up()
    {
        Schema::table('jadwal_munaqosahs', function (Blueprint $table) {
            $table->unsignedBigInteger('materi_id')->nullable();
            $table->foreign('materi_id', 'materi_fk_6852029')->references('id')->on('materi_munaqosahs');
            $table->unsignedBigInteger('dewan_guru_id')->nullable();
            $table->foreign('dewan_guru_id', 'dewan_guru_fk_6850674')->references('id')->on('dewan_gurus');
        });
    }
}