<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Departamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('departamento', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('llave primaria de la tabla');
		    $table->string('nombre', 200)->default(NULL);
		    $table->string('nombre_region', 100)->default(NULL);
		    $table->bigInteger('id_pais')->unsigned()->default(NULL);
		    $table->index('id_pais','id_pais');
		    $table->foreign('id_pais')->references('id')->on('s');
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
        Schema::drop('departamento');
    }
}
