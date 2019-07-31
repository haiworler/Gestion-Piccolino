<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Horario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('horario', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('llave primaria de la tabla');
		    $table->bigInteger('id_grupo')->unsigned()->default(NULL);
		    $table->bigInteger('id_persona')->default(NULL);
		    $table->date('fecha')->default(NULL);
		    $table->time('hora_inicio')->default(NULL);
		    $table->time('hora_final')->default(NULL);
		    $table->integer('estado')->default(NULL);
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->bigInteger('id_materia_grupo')->default(NULL);
		    $table->integer('id_usuario_registra')->unsigned()->default(null);
		    $table->index('id_grupo','id_grupo');
		    $table->index('id_persona','id_persona');
		    $table->index('id_materia_grupo','id_materia_grupo');
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
        Schema::drop('horario');
    }
}
