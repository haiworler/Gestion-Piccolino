<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CorteSemestre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('corte_semestre', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('LLave primaria de la tabla');
		    $table->bigInteger('id_semestre')->unsigned()->default(NULL);
		    $table->bigInteger('id_corte')->default(NULL);
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->integer('id_usuario_registra')->unsigned()->default(NULL);
		    $table->index('id_usuario_registra','id_usuario_registra');
		    $table->index('id_semestre','corte_semestre_ibfk_1');
		    $table->index('id_corte','corte_semestre_ibfk_2');
		    $table->foreign('id_semestre')->references('id')->on('s');
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
        Schema::drop('corte_semestre');
    }
}
