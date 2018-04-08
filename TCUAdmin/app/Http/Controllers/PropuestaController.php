<?php

namespace App\Http\Controllers;

use App\Propuesta;
use App\Usuario;
use App\ProyectoPreaprobado;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Rule;

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
            'propuesta' => 'required|file'
        ]);
    }

    private function crearPropuesta(Request $request) {

        $propuesta = new Propuesta();
        if ($request->hasFile('propuesta')) {
            $fileName = $request->propuesta->getClientOriginalName();
            $propuesta->titulo = $request['titulo'];
            $propuesta->nombre_propuesta = $fileName;
            $propuesta->cantidad_revisiones = 0;
            $propuesta->id_usuario = Auth::user()->id;
            $propuesta->aprobada = false;
        }
        
        return $propuesta;
    }

    // Validamos la propuesta.
    public function postIngresarPropuesta(Request $request) {

        if (!Auth::check()){
            return view('welcome');
        }
        $this->validarRegistroPropuesta($request);
        $nuevaPropuesta = $this->crearPropuesta($request);

        // Validamos que exista alguna propuesta existente.
        $propuestaExistente = Propuesta::where('id', '=', Auth::user()->id);
        // dd($propuestaExistente->count());

        // validamos que haya una propuesa, si no hay insertamos
        if ($propuestaExistente->count() > 0) {
            if($propuestaExistente->cantidad_revisiones == 0) {
                $request->file('propuesta')->storeAs('public', $nuevaPropuesta->nombre_propuesta);
                $nuevaPropuesta->save();
                $request->session()->flash('success', 'Propuesta Ingresada con Exito');
            }
        }

        return redirect()->route('ingresarEmpresa');
    }

    public function getTipoPropuesta(Request $request){
        if (!Auth::check()){
            return view('welcome');
        } 
        return view('contenedor-tipo-propuesta');
        
    }

    public function getPropuestasPreaprobadas(Request $request){
        if (!Auth::check()){
            return view('welcome');
        }
        $propuestas = Propuesta::all();

        foreach ($propuestas as $propuesta) {
            $propuesta->estudiante = Usuario::where('id', '=', $propuesta->id_usuario)->first();
        }
        return view('contenedor-aprobar-propuestas')->with('propuestas', $propuestas);
    }

    public function postTipoPropuesta(Request $request){
        if (!Auth::check()){
            return view('welcome');
        }

        if($request['preaprobada'] == 'true'){
            $proyectosPreaprobados = ProyectoPreaprobado::all();

            return view('contenedor-propuesta-preaprobada')->with('proyectosPreaprobados', $proyectosPreaprobados);
        }

        return redirect()->route('ingresarPropuesta');
        
    }

    public function getPropuesta(Request $request){
        if (!Auth::check()){
            return view('welcome');
        }

        $propuesta = Propuesta::where('id', '=', $request['id'])->first();

        return view('contenedor-propuesta')->with('propuesta', $propuesta);
    }

    public function postAprobarPropuesta(Request $request){
        if (!Auth::check()){
            return view('welcome');
        }

        $propuestaaActualizar = Propuesta::find($request['id_propuesta']);
        $propuestaaActualizar->activa = true;
        $propuestaaActualizar->save();
        $request->session()->flash('success', 'Propuesta Aprobada con Exito');

        return redirect()->route('aprobarPropuestas');
    }

}
