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
            $table->string('correo_universidad');
            // este campo es el emaiil usado apra autenticacion
            $table->string('email');
            $table->string('password');
            $table->string('genero');
            $table->string('sede');
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
