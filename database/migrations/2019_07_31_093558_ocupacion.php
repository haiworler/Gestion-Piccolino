<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ocupacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
		Schema::create('ocupacion', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('llave primaria de la tabla');
		    $table->string('nombre', 100)->default(NULL);
		    $table->string('Observaciones', 100)->default(NULL);
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
        Schema::drop('ocupacion');
    }
}
