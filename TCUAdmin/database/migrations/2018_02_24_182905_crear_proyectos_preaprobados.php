<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearProyectosPreaprobados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_preaprobados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre_proyecto');
            $table->string('descripcion_proyecto');
            $table->boolean('activo');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_preaprobados');
    }
}
