<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Persona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('persona', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('llave primaria de la tabla persona');
		    $table->bigInteger('id_tipo_persona')->default(NULL);
		    $table->string('nombre', 100)->default(NULL);
		    $table->string('apellido', 100)->default(NULL);
		    $table->bigInteger('id_tipo_documento')->unsigned()->default(NULL);
		    $table->bigInteger('numero_documento')->default(NULL);
		    $table->date('fecha_nacimiento')->default(NULL);
		    $table->bigInteger('id_ciudad_de_nacimiento')->default(NULL);
		    $table->bigInteger('id_genero')->default(NULL);
		    $table->integer('telefono')->default(NULL);
		    $table->integer('celular')->default(NULL);
		    $table->string('correo', 200)->default(NULL);
		    $table->string('url_imagen', 200)->default(null);
		    $table->string('direccion_residencia', 200)->default(NULL);
		    $table->bigInteger('id_barrio')->default(NULL);
		    $table->bigInteger('id_sede')->default(NULL);
		    $table->bigInteger('id_ocupacion')->default(NULL);
		    $table->string('rh', 20)->default(NULL);
		    $table->string('eps', 300)->default(NULL);
		    $table->string('observaciones', 300)->default(NULL);
		    $table->integer('estrato')->default(NULL);
		    $table->integer('nivel_sisben')->default(NULL);
		    $table->integer('estado')->default(NULL);
		    $table->string('como_llego_a_piccolino', 300)->default(NULL);
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->integer('id_usuario_registra')->unsigned()->default(NULL);
		    $table->index('id_tipo_documento','id_tipo_documento');
		    $table->index('estado','id_estado');
		    $table->index('id_genero','id_genero');
		    $table->index('id_barrio','id_barrio');
		    $table->index('id_ocupacion','id_ocupacion');
		    $table->index('id_ciudad_de_nacimiento','id_ciudad_de_nacimiento');
		    $table->index('id_sede','id_sede');
		    $table->index('id_tipo_persona','id_tipo_persona');
		    $table->index('id_usuario_registra','id_usuario_registra');
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
        Schema::drop('persona');
    }
}
