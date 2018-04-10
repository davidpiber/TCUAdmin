<?php
use App\ProyectoPreaprobado;
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

    Route::get('/', [
        'uses' => 'UsuarioController@getPagina',
        'as' => '/'
    ]);

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

    Route::get('/estudiantes', [
        'uses' => 'UsuarioController@getEstudiantes',
        'as' => 'estudiantes'
    ]);

    Route::get('/editarEstudiante/{id}', [
        'uses' => 'UsuarioController@EditarEstudiante',
        'as' => 'editarEstudiante'
    ]);

    Route::post('/guardarEstudiante', [
        'uses' => 'UsuarioController@postGuardarEstudiante',
        'as' => 'guardarEstudiante'
    ]);

    Route::post('/eliminarEstudiante/', [
        'uses' => 'UsuarioController@postEliminarEstudiante',
        'as' => 'eliminarEstudiante'
    ]);
    

    // Propuestas Estudiantes

    Route::get('/tipoPropuesta', [
        'uses' => 'PropuestaController@getTipoPropuesta',
        'as' => 'tipoPropuesta'
    ]);

    Route::get('/aprobarPropuestas', [
        'uses' => 'PropuestaController@getPropuestasPreaprobadas',
        'as' => 'aprobarPropuestas'
    ]);

    Route::post('/aprobarPropuesta', [
        'uses' => 'PropuestaController@postAprobarPropuesta',
        'as' => 'aprobarPropuesta'
    ]);

    Route::post('/reprobarPropuesta', [
        'uses' => 'PropuestaController@postReprobarPropuesta',
        'as' => 'reprobarPropuesta'
    ]);

    Route::post('/reprobarPropuestaGuardar', [
        'uses' => 'PropuestaController@postReprobarPropuestaGuardar',
        'as' => 'reprobarPropuestaGuardar'
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

    Route::get('/editarPropuesta', [
        'uses' => 'PropuestaController@getEditarPropuesta',
        'as' => 'editarPropuesta'
    ]);

    Route::post('/editarPropuesta', [
        'uses' => 'PropuestaController@postEditarPropuesta',
        'as' => 'editarPropuesta'
    ]);

    Route::get('/propuesta/{id}', [
        'uses' => 'PropuestaController@getPropuesta',
        'as' => 'propuesta'
    ]);

    Route::post('/borrarPropuesta', [
        'uses' => 'PropuestaController@postBorrarPropuesta',
        'as' => 'borrarPropuesta'
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

    Route::get('/empresas', [
        'uses' => 'EmpresaController@getEmpresas',
        'as' => 'empresas'
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

    Route::get('/ingresarHorarios', [
        'uses' => 'ProyectoPreaprobadoController@getIngresarHorarios',
        'as' => 'ingresarHorarios'
    ]);

    Route::get('/proyectosPreaprobados', [
        'uses' => 'ProyectoPreaprobadoController@getProyectosPreaprobados',
        'as' => 'proyectosPreaprobados'
    ]);

    Route::get('/editarproyecto/{id}', [
        'uses' => 'ProyectoPreaprobadoController@editarproyecto',
        'as' => 'editarproyecto'
    ]);
    
    Route::post('/guardarProyectoPreaprobado', [
        'uses' => 'ProyectoPreaprobadoController@postGuardarProyectoPreaprobado',
        'as' => 'guardarProyectoPreaprobado'
    ]);

    Route::post('/eliminarProyecto', [
        'uses' => 'ProyectoPreaprobadoController@postEliminarProyecto',
        'as' => 'eliminarProyecto'
    ]);


    

    // datatables
    Route::get('/proyectos', function (Request $request) {
        return datatables()->of(ProyectoPreaprobado::query())->toJson();
    });

    Route::post('/horariosPropuesta', [
        'uses' => 'ProyectoPreaprobadoController@postHorariosPropuesta',
        'as' => 'horariosPropuesta'
    ]);

    // Horarios

    Route::get('/ingresarHorario/{id_proyecto}', [
        'uses' => 'HorarioController@IngresarHorario',
        'as' => 'ingresarHorario'
    ]);

    Route::post('/registrarHorario', [
        'uses' => 'HorarioController@postRegistrarHorario',
        'as' => 'registrarHorario'
    ]);

    Route::get('/editarHorario/{id}', [
        'uses' => 'HorarioController@EditarHorario',
        'as' => 'editarHorario'
    ]);

    Route::post('/eliminarHorario', [
        'uses' => 'HorarioController@postEliminarHorario',
        'as' => 'eliminarHorario'
    ]);

    Route::post('/guardarHorario', [
        'uses' => 'HorarioController@postGuardarHorario',
        'as' => 'guardarHorario'
    ]);

    Route::get('/horarios', [
        'uses' => 'HorarioController@getHorarios',
        'as' => 'horarios'
    ]);

    // Mensajes

    Route::get('/mensajes', [
        'uses' => 'MensajeController@getMensajes',
        'as' => 'mensajes'
    ]);

    Route::get('/enviarMensaje/{id}', [
        'uses' => 'MensajeController@getEnviarMensaje',
        'as' => 'enviarMensaje'
    ]);

    Route::get('/editarMensaje/{id}', [
        'uses' => 'MensajeController@getEditarMensaje',
        'as' => 'editarMensaje'
    ]);

    Route::post('/editarMensaje', [
        'uses' => 'MensajeController@editarMensaje',
        'as' => 'editarMensaje'
    ]);

    Route::get('/mensajesEstudiante/{id}', [
        'uses' => 'MensajeController@getMensajesEstudiante',
        'as' => 'mensajesEstudiante'
    ]);

    Route::get('/mensaje/{id}', [
        'uses' => 'MensajeController@getMensaje',
        'as' => 'mensaje'
    ]);


    Route::post('/registrarMensaje', [
        'uses' => 'MensajeController@postRegistrarMensaje',
        'as' => 'registrarMensaje'
    ]);

    Route::post('/eliminarMensaje', [
        'uses' => 'MensajeController@postEliminarMensaje',
        'as' => 'eliminarMensaje'
    ]);

    // Notas

    Route::get('/ingresarNotas', [
        'uses' => 'NotaController@getNotas',
        'as' => 'ingresarNotas'
    ]);

    Route::get('/ingresarNota/{idEstudiante}', [
        'uses' => 'NotaController@getIngresarNota',
        'as' => 'ingresarNota'
    ]);

    Route::post('/guardarNota', [
        'uses' => 'NotaController@postGuardarNota',
        'as' => 'guardarNota'
    ]);

    Route::get('/notasEstudiantes', [
        'uses' => 'NotaController@getNotasEstudiantes',
        'as' => 'notasEstudiantes'
    ]);

    Route::get('/editarNota/{id_nota}', [
        'uses' => 'NotaController@editarNota',
        'as' => 'editarNota'
    ]);

    Route::post('/eliminarNota', [
        'uses' => 'NotaController@postEliminarNota',
        'as' => 'eliminarNota'
    ]);
    

    Route::post('/editarNota/', [
        'uses' => 'NotaController@postGuardarNotaEditada',
        'as' => 'editarNota'
    ]);


    // matricula horario

    Route::post('/matricularHorario/', [
        'uses' => 'ProyectoPreaprobadoController@postMatricularHorario',
        'as' => 'matricularHorario'
    ]);

    Route::get('/horariosMatriculados/{id_usuario}', [
        'uses' => 'HorarioController@gethorariosMatriculados',
        'as' => 'horariosMatriculados'
    ]);


});