<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('kecamatan_fk_6850028');
            $table->dropForeign('kelurahan_fk_6850029');
            $table->dropColumn(['kecamatan_id','kelurahan_id']);
        });
    }
}