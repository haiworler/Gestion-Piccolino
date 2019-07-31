<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Asistencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('asistencia', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigInteger('id_grupo')->unsigned()->comment('llave primaria de la tabla grupo');
		    $table->bigInteger('id_materia')->comment('id de la materia');
		    $table->bigInteger('id_matricula')->comment('id de la matricula');
		    $table->bigInteger('id_persona')->comment('id de la persona que toma la asistencia');
		    $table->date('fecha')->default(NULL);
		    $table->time('hora')->default(NULL);
		    $table->integer('asistio')->default(NULL);
		    $table->index('id_grupo','id_grupo');
		    $table->index('id_materia','id_materia');
		    $table->index('id_matricula','id_matricula');
		    $table->foreign('id_grupo')->references('id')->on('a');
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
        Schema::drop('asistencia');
    }
}
