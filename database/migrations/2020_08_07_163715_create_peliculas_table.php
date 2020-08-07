<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Portada')->nullable();
            $table->string('Titulo')->nullable();
            $table->string('Descripcion')->nullable();
            $table->string('Link')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('peliculas');
    }
}
