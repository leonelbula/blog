<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaComentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_comentario_user')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('posts_id');
            $table->foreign('posts_id', 'fk_cometario_post')->references('id')->on('posts')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('cometarios_id')->nullable();
            $table->foreign('cometarios_id', 'fk_cometario_comentario')->references('id')->on('comentarios')->onDelete('cascade')->onUpdate('restrict');
            $table->text('contenido');
            $table->boolean('estado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
