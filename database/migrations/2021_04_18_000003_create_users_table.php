<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('nis')->nullable()->unique();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('jenis_kelamin')->nullable();
            $table->string('universitas')->nullable();
            $table->string('prodi')->nullable();
            $table->integer('angkatan_ppm')->nullable();
            $table->integer('angkatan_kuliah')->nullable();
            $table->string('daerah')->nullable();
            $table->string('desa')->nullable();
            $table->string('kelompok')->nullable();
            $table->string('alamat')->nullable();
            $table->string('status')->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('locale')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}