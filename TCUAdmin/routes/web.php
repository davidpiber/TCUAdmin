<?php
Route::group(['middleware' => ['web']], function() {

    //Usuarios

    Route::get('/registrar', [
        'uses' => 'UsuarioController@getRegistrar',
        'as' => 'registrar'
    ]);
    
    Route::post('/registrar', [
        'uses' => 'UsuarioController@postRegistrar',
        'as' => 'registrar'
    ]);

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/principal', [
        'uses' => 'UsuarioController@getPrincipal',
        'as' => 'principal'
    ]);

    Route::get('/login', [
        'uses' => 'UsuarioController@login',
        'as' => 'login'
    ]);

    Route::post('/login', [
        'uses' => 'UsuarioController@postLogearse',
        'as' => 'login'
    ]);

    Route::post('/logout', [
        'uses' => 'UsuarioController@postLogout',
        'as' => 'logout'
    ]);

    // Propuestas Estudiantes

    Route::get('/tipoPropuesta', [
        'uses' => 'PropuestaController@getTipoPropuesta',
        'as' => 'tipoPropuesta'
    ]);

    Route::post('/tipoPropuesta', [
        'uses' => 'PropuestaController@postTipoPropuesta',
        'as' => 'tipoPropuesta'
    ]);

    Route::get('/ingresarPropuesta', [
        'uses' => 'PropuestaController@getIngresarPropuesta',
        'as' => 'ingresarPropuesta'
    ]);

    Route::post('/ingresarPropuesta', [
        'uses' => 'PropuestaController@postIngresarPropuesta',
        'as' => 'ingresarPropuesta'
    ]);

    // Empresas

    Route::get('/ingresarEmpresa', [
        'uses' => 'EmpresaController@getIngresarEmpresa',
        'as' => 'ingresarEmpresa'
    ]);

    Route::post('/ingresarEmpresa', [
        'uses' => 'EmpresaController@postIngresarEmpresa',
        'as' => 'ingresarEmpresa'
    ]);

    // Proyectos preaprobados

    Route::get('/ingresarProyectoPreaprobado', [
        'uses' => 'ProyectoPreaprobadoController@getIngresarProyectoPreaprobado',
        'as' => 'ingresarProyectoPreaprobado'
    ]);

    Route::post('/ingresarProyectoPreaprobado', [
        'uses' => 'ProyectoPreaprobadoController@postIngresarProyectoPreaprobado',
        'as' => 'ingresarProyectoPreaprobado'
    ]);

});