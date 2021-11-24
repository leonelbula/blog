<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsersRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id','fk-users_rol_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id','fk_users_rol')->references('id')->on('roles') ->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_roles');
    }
}
