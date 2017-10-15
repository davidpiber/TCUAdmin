<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('carnet_universidad');
            // correo_universidad usado para autenticacion.
            $table->string('correo_universidad');
            $table->string('correo_personal');
            $table->string('password');
            $table->string('genero');
            $table->string('sede');
            $table->boolean('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
