<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;

class UsuarioController extends Controller {

    public function getPrincipal() {
        return view('principal');
    }

    private function validarRegistro() {
        $this->validate($request, [
            'email' => 'email|unique:usuarios'
        ]);
    }

    private function crearUsuario(Request $request){
        $usuario = new Usuario();
        $usuario->nombre = $request['nombre'];
        $usuario->primer_apellido = $request['primer_apellido'];
        $usuario->segundo_apellido = $request['segundo_apellido'];
        $usuario->carnet_universidad = $request['carnet_universidad'];
        $usuario->correo_universidad = $request['correo_universidad'];
        $usuario->email = $request['correo_personal'];
        $usuario->password = bcrypt($request['password']);
        $usuario->genero = $request['genero'];
        $usuario->sede = $request['sede'];
        $usuario->admin = false;

        return $usuario;
    }

    public function postRegistrar(Request $request) {
        $this->validarRegistro();
        $nuevoUsuario = $this.crearUsuario($request);
        $nuevoUsuario->save();
        Auth::login($usuario);
        return redirect()->route('principal');
    }

    public function postLogearse(Request $request) {

        $email = $request['email'];
        $password = $request['password'];

        // If login is not valid redirect to login page.
        if(!Auth::attempt(['correo_universidad' => $email, 'password' => $password])) {
            return redirect()->back();
        }
        return redirect()->route('principal');
    }


}

