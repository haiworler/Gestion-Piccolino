<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Matricula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('matricula', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('LLave primaria de la tabla');
		    $table->bigInteger('id_persona')->unsigned()->default(NULL);
		    $table->string('codigo', 50)->default(NULL);
		    $table->decimal('costo', 10, 2)->default(NULL);
		    $table->integer('estado')->default(NULL);
		    $table->bigInteger('id_sede')->default(NULL);
		    $table->bigInteger('id_semestre')->default(NULL);
		    $table->string('observaciones', 300)->default(NULL);
		    $table->bigInteger('id_grado')->default(NULL);
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->integer('is_usuario_registra')->unsigned()->default(NULL);
		    $table->index('id_persona','id_persona');
		    $table->index('id_sede','id_sede');
		    $table->index('id_semestre','id_semestre');
		    $table->index('id_grado','id_grado');
		    $table->index('is_usuario_registra','is_usuario_registra');
		    $table->foreign('id_persona')->references('id')->on('s');
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
        Schema::drop('matricula');
    }
}
