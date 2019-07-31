<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Localidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('localidad', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('llave primaria de la tabla');
		    $table->string('nombre', 100)->default(NULL);
		    $table->integer('numero')->default(NULL);
		    $table->bigInteger('id_ciudad')->unsigned()->default(NULL);
		    $table->index('id_ciudad','id_ciudad');
		    $table->foreign('id_ciudad')->references('id')->on('d');
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
        Schema::drop('localidad');
    }
}
