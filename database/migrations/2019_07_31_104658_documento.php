<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Documento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('documento', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('llave primaria de la tabla');
		    $table->string('nombre', 200)->default(NULL);
		    $table->bigInteger('id_tipo_documento')->unsigned()->default(NULL);
		    $table->date('fecha_obtencion')->default(NULL);
		    $table->string('nombre_entidad', 150)->default(NULL);
		    $table->string('observaciones', 300)->default(NULL);
		    $table->bigInteger('id_sede')->default(NULL);
		    $table->string('ubicacion', 100)->default(NULL);
		    $table->bigInteger('id_persona')->default(NULL);
		    $table->integer('estado')->default(NULL);
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->integer('id_usuario_registra')->unsigned()->default(NULL);
		    $table->index('id_tipo_documento','id_tipo_documento');
		    $table->index('id_sede','id_sede');
		    $table->foreign('id_tipo_documento')->references('id')->on('e');
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
        Schema::drop('documento');
    }
}
