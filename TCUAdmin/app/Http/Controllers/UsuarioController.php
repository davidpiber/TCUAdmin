<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Mensaje;
use App\Propuesta;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\MessageBag;

class UsuarioController extends Controller {

    public function getPagina() {
        if (!Auth::check()) {
            return view('welcome');
        } else {
            return redirect()->route('principal');
        }
    }

    public function getPrincipal() {
        if (!Auth::check()) {
            return view('welcome');
        }
        $mensajesSinleer = Mensaje::where('id_usuario', '=', Auth::user()->id)->where('visto', false)->count();
        $propuesta = Propuesta::where('id_usuario', '=', Auth::user()->id)->first();
        return view('principal')->with('mensajesSinleer', $mensajesSinleer)->with('propuesta', $propuesta);
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

    private function validarGuardarEstudiante(Request $request) {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'primer_apellido' => 'required|max:255',
            'segundo_apellido' => 'required|max:255',
            'cedula' => 'required|max:255',
            'carnet_universidad' => 'required|max:255',
            'correo_universidad' => 'email|required|max:255',
            'correo_personal' => 'email|required|max:255',
            'genero' => 'required|max:255',
            'sede' => 'required|max:255',
            'is_admin' => 'required|max:255',
            'reset_password' => 'required|max:255'
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

    private function crearUsuarioaGuardar(Request $request){
        $usuario = Usuario::find($request['id_estudiante']);
        $usuario->nombre = $request['nombre'];
        $usuario->primer_apellido = $request['primer_apellido'];
        $usuario->segundo_apellido = $request['segundo_apellido'];
        $usuario->cedula = $request['cedula'];
        $usuario->carnet_universidad = $request['carnet_universidad'];
        $usuario->correo_universidad = $request['correo_universidad'];
        $usuario->correo_personal = $request['correo_personal'];

        if($request['reset_password'] == 'true') {
            $usuario->password = bcrypt('Latina2018*');
        }
        
        $usuario->genero = $request['genero'];
        $usuario->sede = $request['sede'];

        $usuario->admin = $request['is_admin'] == 'true' ? true : false;

        return $usuario;
    }

    public function postRegistrar(Request $request) {
        $this->validarRegistro($request);
        $nuevoUsuario = $this->crearUsuario($request);
        $nuevoUsuario->save();
        Auth::login($nuevoUsuario);
        $request->session()->flash('success', 'Estudiante Registrado con Exito');
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
        $request->session()->flash('success', 'Bienvenido al Sistema');
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

        return view('contenedor-estudiantes')->with('estudiantes', $estudiantes);
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
        $this->validarGuardarEstudiante($request);

        $estudiante = $this->crearUsuarioaGuardar($request);
        $estudiante->save();

        $request->session()->flash('success', 'Estudiante Actualizado con Exito');
        return redirect()->route('estudiantes');
    }

    public function postEliminarEstudiante(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

        $idEstudiante = $request['id_estudiante'];

        if($idEstudiante){
            $estudianteaBorrar = Usuario::find($idEstudiante);
            $estudianteaBorrar->Delete();
        }
        $request->session()->flash('success', 'Estudiante Eliminado con Exito');
        return redirect()->route('estudiantes');
    }


}

