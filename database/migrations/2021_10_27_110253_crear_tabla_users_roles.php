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
        Schema::create('usuarios_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk-usuarios_roles-usuario')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id', 'fk_usuario_rol')->references('id')->on('roles')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_roles');
    }
}
