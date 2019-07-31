<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Barrio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('barrio', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('llave primaria de la tabla');
		    $table->string('nombre', 100)->default(NULL);
		    $table->bigInteger('id_localidad')->unsigned()->default(NULL);
		    $table->index('id_localidad','id_localidad');
		    $table->foreign('id_localidad')->references('id')->on('d');
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
