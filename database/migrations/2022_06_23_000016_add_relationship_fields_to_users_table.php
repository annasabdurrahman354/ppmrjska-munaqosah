<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('provinsi_id')->nullable();
            $table->foreign('provinsi_id', 'provinsi_fk_6850026')->references('id')->on('provinsis');
            $table->unsignedBigInteger('kabupaten_id')->nullable();
            $table->foreign('kabupaten_id', 'kabupaten_fk_6850027')->references('id')->on('kabupatens');
            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->foreign('kecamatan_id', 'kecamatan_fk_6850028')->references('id')->on('kecamatans');
            $table->unsignedBigInteger('kelurahan_id')->nullable();
            $table->foreign('kelurahan_id', 'kelurahan_fk_6850029')->references('id')->on('kelurahans');
        });
    }
}