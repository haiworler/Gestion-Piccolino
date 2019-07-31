<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactoPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('contacto_persona', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('llave primaria de la tabla');
		    $table->bigInteger('id_persona')->comment('id de la persona');
		    $table->string('nombre', 150)->default(NULL);
		    $table->string('telefono', 10)->default(NULL);
		    $table->string('correo', 100)->default(NULL);
		    $table->string('parentezco', 77)->default(NULL);
		    $table->text('observaciones')->comment('Observaciones');
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->integer('id_usuario_registra')->unsigned()->default(NULL);
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
        Schema::drop('contacto_persona');
    }
}
