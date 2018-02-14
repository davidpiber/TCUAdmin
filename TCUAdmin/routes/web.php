<?php
Route::group(['middleware' => ['web']], function() {
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

});