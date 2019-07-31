<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Estado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('estado', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->increments('id')->comment('llave primaria de la tabla');
		    $table->string('nombre', 50)->default(NULL);
		    $table->string('observaciones', 200)->default(NULL);
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
        Schema::drop('estado');
    }
}
