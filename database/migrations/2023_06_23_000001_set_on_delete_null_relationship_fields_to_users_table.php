<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetOnDeleteNullRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('provinsi_id')->nullable()->change();
            $table->unsignedBigInteger('kabupaten_id')->nullable()->change();
            $table->unsignedBigInteger('kecamatan_id')->nullable()->change();
            $table->unsignedBigInteger('kelurahan_id')->nullable()->change();
            $table->foreignId('provinsi_id')->onDelete('set null')->change();
            $table->foreignId('kabupaten_id')->onDelete('set null')->change();
            $table->foreignId('kecamatan_id')->onDelete('set null')->change();
            $table->foreignId('kelurahan_id')->onDelete('set null')->change();
        });
    }
}