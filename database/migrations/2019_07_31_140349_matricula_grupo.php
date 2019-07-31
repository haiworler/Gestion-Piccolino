<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MatriculaGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('matricula_grupo', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->bigIncrements('id')->comment('llave primaria de la tablka');
		    $table->bigInteger('id_grupo')->unsigned()->default(NULL);
		    $table->bigInteger('id_matricula')->default(NULL);
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->integer('id_estado')->default(NULL);
		    $table->integer('id_usuario_registra')->unsigned()->default(NULL);
		    $table->index('id_grupo','id_grupo');
		    $table->index('id_matricula','id_matricula');
		    $table->index('id_estado','id_estado');
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
        Schema::drop('matricula_grupo');
    }
}
