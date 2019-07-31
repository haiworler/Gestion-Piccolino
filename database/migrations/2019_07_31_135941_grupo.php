<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Grupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('grupo', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('LLave primaria de la tabla');
		    $table->string('codigo', 50)->default(NULL);
		    $table->bigInteger('id_sede')->unsigned()->default(NULL);
		    $table->bigInteger('id_semestre')->default(NULL);
		    $table->bigInteger('id_persona_responsable')->default(NULL);
		    $table->integer('id_estado')->default(NULL);
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->integer('id_usuario_registro')->unsigned()->default(NULL);
		    $table->index('id_sede','id_sede');
		    $table->index('id_semestre','id_semestre');
		    $table->index('id_persona_responsable','id_persona_responsable');
		    $table->index('id_estado','id_estado');
		    $table->index('id_usuario_registro','id_usuario_registro');
		    $table->foreign('id_sede')->references('id')->on('s');
		    //$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grupo');
    }
}
