<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sede extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('sede', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('LLave primaria de la tabla');
		    $table->string('nombre', 100)->default(NULL);
		    $table->bigInteger('id_barrio')->unsigned()->default(NULL);
		    $table->integer('estado')->default(NULL);
		    $table->string('observaciones', 300)->default(NULL);
		    $table->dateTime('fecha_registro')->default(NULL);
		    $table->index('id_barrio','id_barrio');
		    $table->foreign('id_barrio')->references('id')->on('o');
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
        Schema::drop('barrio');
    }
}
