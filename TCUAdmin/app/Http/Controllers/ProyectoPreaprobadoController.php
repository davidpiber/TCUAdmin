<?php

namespace App\Http\Controllers;

use App\ProyectoPreaprobado;
use App\Propuesta;
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

        return view('contenedor-horarios')->with('proyectos', $proyectos);
        //return view('contenedor-ingresar-horarios'); js data tables example
    }

}
