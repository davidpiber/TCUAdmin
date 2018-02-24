<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre_empresa');
            $table->string('cedula_juridica');
            $table->string('nombre_supervisor');
            $table->string('primer_apellido_supervisor');
            $table->string('segundo_apellido_supervisor');
            $table->string('telefono');
            $table->string('correo_supervisor');
            $table->integer('id_propuesta')->unsigned();
            $table->foreign('id_propuesta')->references('id')->on('propuestas');
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
        Schema::dropIfExists('empresas');
    }
}
