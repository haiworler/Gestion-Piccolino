<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MateriaGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('materia_grupo', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('LLave primaria de la tabla');
		    $table->bigInteger('id_grupo')->unsigned()->default(NULL);
		    $table->bigInteger('id_materia')->default(NULL);
		    $table->integer('estado')->default(NULL);
		    $table->dateTime('fecha_asignacion')->default(NULL);
		    $table->integer('id_usuario_registra')->unsigned()->default(null);
		    $table->index('id_grupo','id_grupo');
		    $table->index('id_materia','id_materia');
		    $table->index('id_usuario_registra','id_usuario_registra');
		    $table->foreign('id_grupo')->references('id')->on('s');
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
        Schema::drop('materia_grupo');
    }
}
