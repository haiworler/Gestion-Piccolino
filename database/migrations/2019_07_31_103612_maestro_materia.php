<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MaestroMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('maestro_materia', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('LLAve primaria de la tabla');
		    $table->bigInteger('id_materia')->unsigned()->default(NULL);
		    $table->bigInteger('id_persona')->default(NULL);
		    $table->integer('estado')->default(NULL);
		    $table->string('observaciones', 300)->default(NULL);
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->integer('id_usuario_registra')->unsigned()->default(NULL);
		    $table->index('id_materia','id_materia');
		    $table->index('id_persona','id_persona');
		    $table->index('id_usuario_registra','id_usuario_registra');
		    $table->foreign('id_materia')->references('id')->on('s');
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
        Schema::drop('maestro_materia');
    }
}
