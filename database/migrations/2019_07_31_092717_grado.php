<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Grado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('grado', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id')->comment('LLave primaria de la tabla');
		    $table->string('nombre', 50)->default(NULL);
		    $table->string('codigo', 30)->default(NULL);
		    $table->integer('estado')->default(NULL);
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
        Schema::drop('grado');
    }
}
