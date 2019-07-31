<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('nota', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->bigIncrements('id')->comment('Llave primaria de la tabla');
		    $table->integer('nota')->default(NULL);
		    $table->string('observaciones', 500)->default(NULL);
		    $table->bigInteger('id_materia')->unsigned()->default(NULL);
		    $table->bigInteger('id_grupo')->default(NULL);
		    $table->bigInteger('id_matricula')->default(NULL);
		    $table->bigInteger('id_semestre')->default(NULL);
		    $table->bigInteger('id_corte')->default(NULL);
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->bigInteger('id_persona_registra')->default(NULL);
		    $table->index('id_materia','id_materia');
		    $table->index('id_grupo','id_grupo');
		    $table->index('id_matricula','id_matricula');
		    $table->index('id_semestre','id_semestre');
		    $table->index('id_corte','id_corte');
		    $table->index('id_persona_registra','id_persona_registra');
		    $table->foreign('id_materia')->references('id')->on('a');
		   // $table->timestamps();
		
		});


    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nota');
    }
}
