<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CostoMatricula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('costo_matricula', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('llave primaria de la tabla');
		    $table->decimal('valor', 30, 2)->default(NULL);
		    $table->date('fecha_inicio_periodo')->default(NULL);
		    $table->date('fecha_fin_periodo')->default(NULL);
		    $table->string('observaciones', 300)->default(NULL);
		    $table->date('fecha_registro')->default(NULL);
		    $table->integer('id_usuario_registro')->unsigned()->default(NULL);
		    $table->index('id_usuario_registro','id_usuario_registro');
		    $table->foreign('id_usuario_registro')->references('id')->on('s');
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
        Schema::drop('costo_matricula');
    }
}
