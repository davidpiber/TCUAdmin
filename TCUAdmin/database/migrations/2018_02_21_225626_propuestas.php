<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Propuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('titulo');
            $table->string('justificacion');
            $table->string('descripcion_beneficiarios');
            $table->string('objetivo_general');
            $table->string('estrategia_trabajo');
            $table->string('recursos_necesarios');
            $table->string('pertenencia_solucion');
            $table->string('resultados_esperados');
            $table->string('cronograma');
            $table->boolean('preaprobada');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->boolean('activa');
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
        //
    }
}
