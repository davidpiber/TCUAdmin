<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\MessageBag;

class UsuarioController extends Controller {

    public function getPagina() {
        if (!Auth::check()) {
            return view('welcome');
        } else {
            return view('principal');
        }
    }

    public function getPrincipal() {
        if (!Auth::check()) {
            return view('welcome');
        }
            
        return view('principal');
    }

    public function getRegistrar() {
        return view('register-container');
    }

    private function validarRegistro(Request $request) {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'primer_apellido' => 'required|max:255',
            'segundo_apellido' => 'required|max:255',
            'cedula' => 'required|max:255',
            'carnet_universidad' => 'required|max:255',
            'correo_universidad' => 'email|unique:usuarios|required|max:255',
            'correo_personal' => 'email|unique:usuarios|required|max:255',
            'password' => 'required|max:255',
            'genero' => 'required|max:255',
            'sede' => 'required|max:255'
        ]);
    }

    private function validarLogin(Request $request) {
        $this->validate($request, [
            'correo_universidad' => 'email|required',
            'password' => 'required'
        ]);
    }

    private function crearUsuario(Request $request){
        $usuario = new Usuario();
        $usuario->nombre = $request['nombre'];
        $usuario->primer_apellido = $request['primer_apellido'];
        $usuario->segundo_apellido = $request['segundo_apellido'];
        $usuario->cedula = $request['cedula'];
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

        $this->validarLogin($request);

        $correo = $request['correo_universidad'];
        $password = $request['password'];

        // If login is not valid redirect to login page.
        if(!Auth::attempt(['correo_universidad' => $correo, 'password' => $password])) {
            $errors = new MessageBag();

            // add your error messages:
            $errors->add('user or passowrd equivovado', 'Su usuario o contrasena no es valido');

            return view('login-container')->withErrors($errors);
        }
        return redirect()->route('principal');
    }

    public function login(Request $request) {
        return view('login-container');
    }

    public function postLogout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }

    public function getEstudiantes(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $estudiantes = Usuario::all();

        return view('contenedor-estudiantes')->with('estudiantes', $estudiantes);;
    }

    public function EditarEstudiante(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $estudiante = Usuario::where('id', '=', $request['id'])->first();
        return view('contenedor-editar-estudiante')->with('estudiante', $estudiante);

    }

    public function postGuardarEstudiante(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $this->validarGuardarHorario($request);

        $idHorario = $request['id_horario'];
        $horario = $request['horario'];
        $cantidadInstructores = $request['cantidad_instructores'];

        if($idHorario && $horario && $cantidadInstructores){
            $horarioaActualizar = Horario::find($idHorario);
            $horarioaActualizar->horario = $horario;
            $horarioaActualizar->cantidad_instructores = $cantidadInstructores;
            $horarioaActualizar->save();
        }
        $request->session()->flash('success', 'Horario Editado con Exito');
        return redirect()->route('horarios');
    }

    public function postEliminarHorario(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

        $idHorario = $request['id_horario'];

        if($idHorario){
            $horarioaBorrar = Horario::find($idHorario);
            $horarioaBorrar->Delete();
        }
        $request->session()->flash('success', 'Horario Eliminado con Exito');
        return redirect()->route('horarios');
    }


}

