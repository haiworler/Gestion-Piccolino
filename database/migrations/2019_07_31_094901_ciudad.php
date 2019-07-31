<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ciudad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('ciudad', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('llave primaria de la tabla');
		    $table->string('nombre', 100)->default(NULL);
		    $table->string('codigo_iso', 100)->default(NULL);
		    $table->integer('estado')->default(NULL);
		    $table->string('observaciones', 300)->default(NULL);
		    $table->bigInteger('id_departamento')->unsigned()->default(NULL);
		    $table->index('id_departamento','id_departamento');
		    $table->foreign('id_departamento')->references('id')->on('o');
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
        Schema::drop('ciudad');
    }
}
