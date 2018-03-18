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

    public function getNotasEstudiantes(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $notas = Nota::all();

        foreach ($notas as $nota) {
            $nota->estudiante = Usuario::where('id', '=', $nota->id_usuario)->first();
        }

        return view('contenedor-notas-estudiantes')->with('notas', $notas);
    }

    public function editarNota(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $idNota = $request['id_nota'];
        $nota = Nota::find($idNota);
        $proyectosPreaprobados = ProyectoPreaprobado::all();

        return view('contenedor-editar-nota')->with('nota', $nota)->with('proyectosPreaprobados', $proyectosPreaprobados);
    }

    public function postGuardarNotaEditada(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $this->validarNota($request);
        $idNota = $request['id_nota'];
        $nota = Nota::find($idNota);
        $nota->descripcion = $request['descripcion'];
        $nota->nota = $request['nota'];
        $nota->id_proyecto_preaprobado = $request['proyecto_preaprobado'];
        $nota->save();

        $request->session()->flash('success', 'Nota Editada con Exito');
        return redirect()->route('notasEstudiantes');
    }

    public function postEliminarNota(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

        $idNota = $request['id_nota'];

        if($idNota){
            $NotaABorrar = Nota::find($idNota);
            $NotaABorrar->Delete();
        }
        $request->session()->flash('success', 'Nota Eliminada con Exito');
        return redirect()->route('notasEstudiantes');
    }

}
