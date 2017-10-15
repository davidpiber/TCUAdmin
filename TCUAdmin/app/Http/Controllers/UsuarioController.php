<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;

class UsuarioController extends Controller {

    public function getPrincipal() {
        return view('principal');
    }

    private function validarRegistro(Request $request) {
        $this->validate($request, [
            'nombre' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'carnet_universidad' => 'required',
            'correo_universidad' => 'email|unique:usuarios|required',
            'correo_personal' => 'email|unique:usuarios|required',
            'password' => 'required',
            'genero' => 'required',
            'sede' => 'required'
        ]);
    }

    private function crearUsuario(Request $request){
        $usuario = new Usuario();
        $usuario->nombre = $request['nombre'];
        $usuario->primer_apellido = $request['primer_apellido'];
        $usuario->segundo_apellido = $request['segundo_apellido'];
        $usuario->carnet_universidad = $request['carnet_universidad'];
        $usuario->correo_universidad = $request['correo_universidad'];
        $usuario->correo_personal = $request['correo_personal'];
        //Encriptamos el password :)
        $usuario->password = bcrypt($request['password']);
        $usuario->genero = $request['genero'];
        $usuario->sede = $request['sede'];
        // Ningun nuevo usario es admin :)
        $usuario->admin = false;

        return $usuario;
    }

    public function postRegistrar(Request $request) {
        $this->validarRegistro($request);
        $nuevoUsuario = $this->crearUsuario($request);
        $nuevoUsuario->save();
        Auth::login($nuevoUsuario);
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

