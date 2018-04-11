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
            $table->string('cedula');
            $table->string('carnet_universidad');
            $table->string('correo_universidad');
            $table->string('correo_personal');
            $table->string('password');
            $table->string('genero');
            $table->string('sede');
            $table->boolean('admin');
            $table->rememberToken();
        });


            // Insert some stuff
        DB::table('usuarios')->insert(
            array(
                'nombre' => 'adminLatina',
                'primer_apellido' => 'adminLatina',
                'segundo_apellido' => 'adminLatina',
                'cedula' => '2323',
                'carnet_universidad' => '32323',
                'correo_universidad' => 'adminLatina2018@ulatina.net',
                'correo_personal' => 'adminLatina2018@hotmail.com',
                'password' => bcrypt('adminLatina2018*'),
                'genero' => 'femenino',
                'sede' => 'heredia',
                'admin' => true
            )
        );
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
