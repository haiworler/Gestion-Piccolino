<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('pago', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('llave primaria d ela tabla');
		    $table->decimal('valor', 30, 2)->default(NULL);
		    $table->bigInteger('id_matricula')->unsigned()->default(NULL);
		    $table->bigInteger('id_sede')->default(NULL);
		    $table->string('observaciones', 100)->default(NULL);
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->bigInteger('id_persona_registra')->default(NULL);
		    $table->index('id_matricula','id_matricula');
		    $table->index('id_sede','id_sede');
		    $table->foreign('id_matricula')->references('id')->on('e');
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
        Schema::drop('pago');  
    }
}
