<?php

namespace App\Http\Controllers;

use App\ProyectoPreaprobado;
use App\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\MessageBag;

class ProyectoPreaprobadoController extends Controller
{

    private function validarProyectoPreaprobado(Request $request) {
        $this->validate($request, [
            'nombre_proyecto' => 'required|max:255',
            'descripcion_proyecto' => 'required|max:255'
        ]);
    }

    private function crearProyectoPreaprobado(Request $request){
        $proyectoPreaprobado = new ProyectoPreaprobado();
        $proyectoPreaprobado->nombre_proyecto = $request['nombre_proyecto'];
        $proyectoPreaprobado->descripcion_proyecto = $request['descripcion_proyecto'];
        $activo = $request['activo'];
        $proyectoPreaprobado->activo = $activo && $activo == 'true' ? true : false;
        return $proyectoPreaprobado;
    }

    public function postIngresarProyectoPreaprobado(Request $request) {
        $this->validarProyectoPreaprobado($request);
        $nuevoproyectoPreaprobado = $this->crearProyectoPreaprobado($request);
        $nuevoproyectoPreaprobado->save();
        $request->session()->flash('success', 'Proyecto Registrado con Exito');
        return redirect()->route('principal');
    }

    public function getIngresarProyectoPreaprobado(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        return view('contenedor-proyecto-preaprobado');
    }

    public function getIngresarHorarios(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $proyectos = ProyectoPreaprobado::all();

        return view('contenedor-registrar-horarios')->with('proyectos', $proyectos);
        //return view('contenedor-ingresar-horarios'); js data tables example
    }

    public function postHorariosPropuesta(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $idUsuario = Auth::user()->id;
        $idProyecto = $request['id_proyecto'];

        $notasEstudiante = Nota::where('id_usuario', '=', $idUsuario)->where('id_proyecto_preaprobado', $idProyecto)->count();
        dd($notasEstudiante);
    }

}
