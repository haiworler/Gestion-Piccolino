<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Materia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('materia', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('LLave primaria de la materia');
		    $table->string('nombre', 100)->default(NULL);
		    $table->string('codigo', 50)->default(NULL);
		    $table->integer('estado')->default(NULL);
		    $table->string('observaciones', 300)->default(NULL);
		    $table->integer('creditos')->default(NULL);
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->integer('id_usuario_registra')->unsigned()->default(null);
		    $table->index('id_usuario_registra','id_usuario_registra');
		    $table->foreign('id_usuario_registra')->references('id')->on('s');
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
        Schema::drop('materia');
    }
}
