<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersRol extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('rol')->after('email')->default('usuario');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rol');
        });
    }
}
