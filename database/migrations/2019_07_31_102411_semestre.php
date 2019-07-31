<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Semestre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('semestre', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('llave primaria de la tabla');
		    $table->date('fecha_inicio')->default(NULL);
		    $table->date('fecha_fin')->default(NULL);
		    $table->string('observaciones', 300)->default(NULL);
		    $table->string('codigo', 50)->default(NULL);
		    $table->integer('estado')->default(NULL);
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->integer('id_usuario_registra')->unsigned()->default(NULL);
		    $table->index('id_usuario_registra','id_usuario_registra');
		    $table->foreign('id_usuario_registra')->references('id')->on('s');
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
        Schema::drop('semestre');
    }
}
