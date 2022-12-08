<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHafalanToMateriMunaqosahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materi_munaqosahs', function (Blueprint $table) {
            $table->string('hafalan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materi_munaqosahs', function (Blueprint $table) {
            $table->dropColumn('hafalan');
        });
    }
}
