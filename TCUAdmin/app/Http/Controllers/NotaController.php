<?php

namespace App\Http\Controllers;

use App\Nota;
use App\Usuario;
use App\ProyectoPreaprobado;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\MessageBag;
use DateTime;

class NotaController extends Controller {

    private function validarNota(Request $request) {
        $this->validate($request, [
            'nota' => 'required|max:255',
            'descripcion' => 'required|max:255'
        ]);
    }

    public function getNotas(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $estudiantes = Usuario::all();

        return view('contenedor-notas')->with('estudiantes', $estudiantes);
    }

    public function getIngresarNota(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $usuario = Usuario::where('id', '=', $request['idEstudiante'])->first();
        $proyectosPreaprobados = ProyectoPreaprobado::all();

        return view('contenedor-ingresar-nota')->with('usuario', $usuario)->with('proyectosPreaprobados', $proyectosPreaprobados);
    }

    public function postGuardarNota(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

        $this->validarNota($request);
        
        $nota = new Nota();
        $nota->id_usuario = $request['id_estudiante'];
        $nota->descripcion = $request['descripcion'];
        $nota->nota = $request['nota'];
        $nota->id_proyecto_preaprobado = $request['proyecto_preaprobado'];
        $nota->save();
        $request->session()->flash('success', 'Nota Agregada con Exito');

        $estudiantes = Usuario::all();
        return view('contenedor-notas')->with('estudiantes', $estudiantes);
    }


}
