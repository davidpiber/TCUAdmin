<?php

namespace App\Http\Controllers;

use App\Propuesta;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\MessageBag;

class PropuestaController extends Controller
{

    public function getIngresarPropuesta() {
        if (!Auth::check()){
            return view('welcome');
        }
        return view('contenedor-registro-propuesta');
    }

    private function validarRegistroPropuesta(Request $request) {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'justificacion' => 'required|max:255',
            'descripcion_beneficiarios' => 'required|max:255',
            'objetivo_general' => 'required|max:255',
            'estrategia_trabajo' => 'required|max:255',
            'recursos_necesarios' => 'required|max:255',
            'pertenencia_solucion' => 'required|max:255',
            'resultados_esperados' => 'required|max:255',
            'cronograma' => 'required|max:255',
            'preaprobada' => 'required|max:255',
            'id_usuario' => 'required|max:255',
        ]);
    }

    private function crearPropuesta(Request $request){
        $propuesta = new Propuesta();
        $propuesta->titulo = $request['titulo'];
        $propuesta->justificacion = $request['justificacion'];
        $propuesta->descripcion_beneficiarios = $request['descripcion_beneficiarios'];
        $propuesta->objetivo_general = $request['objetivo_general'];
        $propuesta->estrategia_trabajo = $request['estrategia_trabajo'];
        $propuesta->recursos_necesarios = $request['recursos_necesarios'];
        $propuesta->pertenencia_solucion = $request['pertenencia_solucion'];
        $propuesta->resultados_esperados = $request['resultados_esperados'];
        $propuesta->cronograma = $request['cronograma'];
        $propuesta->preaprobada = $request['preaprobada'] == 'true' ? true : false;
        $propuesta->id_usuario = $request['id_usuario'];
        $propuesta->activa = false;

        return $propuesta;
    }

    public function postIngresarPropuesta(Request $request) {
        $this->validarRegistroPropuesta($request);
        $nuevaPropuesta = $this->crearPropuesta($request);
        $nuevaPropuesta->save();
        return redirect()->route('institucionPropuesta');
    }

    public function getInstitucionPropuesta(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        
        $propuesta = Propuesta::where('id_usuario', '=', Auth::user()->id)->latest()->first();
        if($propuesta && $propuesta->preaprobada) {
            return view('contenedor-propuesta-preaprobada');
        }
        return view('contenedor-propuesta-empresa');

    }


}
