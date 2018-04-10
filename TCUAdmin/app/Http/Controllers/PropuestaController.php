<?php

namespace App\Http\Controllers;

use App\Propuesta;
use App\Usuario;
use App\Empresa;
use App\ProyectoPreaprobado;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PropuestaController extends Controller
{

    public function getIngresarPropuesta() {
        if (!Auth::check()){
            return view('welcome');
        }
        // Validamos que exista alguna propuesta existente.
        $propuestaExistente = Propuesta::where('id_usuario', '=', Auth::user()->id);
        if ($propuestaExistente->count() > 0) {
            return redirect()->route('editarPropuesta');
        }
        return view('contenedor-registro-propuesta');
    }

    public function getEditarPropuesta() {
        $propuesta = Propuesta::where('id_usuario', '=', Auth::user()->id)->first();
        return view('contenedor-editar-propuesta')->with('propuesta', $propuesta);
    }

    public function postEditarPropuesta(Request $request) {
        $propuesta = Propuesta::where('id_usuario', '=', Auth::user()->id)->first();
    
        if($propuesta->cantidad_revisiones == 1) {
            // Borramos la propuesta anterior.
            Storage::delete($propuesta->nombre_propuesta);

            $propuesta->nombre_propuesta = $request->propuesta->getClientOriginalName();
            $request->file('propuesta')->storeAs('public', $propuesta->nombre_propuesta);
            $propuesta->save();
            $request->session()->flash('success', 'Propuesta Actulizada con Exito');
        }

        if($propuesta->cantidad_revisiones > 1) {
            $request->session()->flash('error', 'La cantidad máxima de Revisiones para su Propuesta ha sido alcanzada, por favor contacte al Administrador.');
        }
        return redirect()->route('principal');
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

        $request->file('propuesta')->storeAs('public', $nuevaPropuesta->nombre_propuesta);
        $nuevaPropuesta->save();
        $request->session()->flash('success', 'Propuesta Ingresada con Exito');

        return redirect()->route('ingresarEmpresa');
    }

    public function getTipoPropuesta(Request $request){
        if (!Auth::check()){
            return view('welcome');
        } 
        return view('contenedor-tipo-propuesta');
        
    }

    public function postBorrarPropuesta(Request $request){
        if (!Auth::check()){
            return view('welcome');
        }

        $idPropuesta = $request['id'];

        if($idPropuesta){
            $propuestaaBorrar = Propuesta::find($idPropuesta);
            $propuestaEmpresa = Empresa::where('id_propuesta', '=',$propuestaaBorrar->id)->first();

            if ($propuestaEmpresa && $propuestaEmpresa->count() > 0) {
                $request->session()->flash('error', 'Existe un empresa relacionada con esta propuesta, debe eliminar la empresa antes de eliminar esta propuesta.');
                return redirect()->route('aprobarPropuestas');
            }
            $propuestaaBorrar->Delete();
        }
        $request->session()->flash('success', 'Propuesta Eliminada con Exito');
        return redirect()->route('aprobarPropuestas');;
        
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

        $propuestaaActualizar = Propuesta::find($request['id']);
        $propuestaaActualizar->aprobada = true;
        $propuestaaActualizar->save();
        $request->session()->flash('success', 'Propuesta Aprobada con Exito');

        return redirect()->route('aprobarPropuestas');
    }

    public function postReprobarPropuesta(Request $request){
        if (!Auth::check()){
            return view('welcome');
        }

        $propuesta = Propuesta::find($request['id']);
        $propuesta->aprobada = false;
        $propuesta->save();
        $request->session()->flash('warning', 'Propuesta Reprobada, Ingrese la Propuesta con sus Comentarios.');

        return view('contenedor-reprobar-propuesta')->with('propuesta', $propuesta);;
    }

    public function postReprobarPropuestaGuardar(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

        $this->validarRegistroPropuesta($request);

        // Buscamos la propuesta.
        $propuesta = Propuesta::find($request['id']);

        // Borramos la propuesta anterior.
        Storage::delete(storage_path('app/public/'.$propuesta->nombre_propuesta));


        $propuesta->aprobada = false;
        $propuesta->cantidad_revisiones = $propuesta->cantidad_revisiones + 1;

        // Guardamos la propuesta Subida por el Administrador.
        $propuesta->nombre_propuesta = $request->propuesta->getClientOriginalName();
        $request->file('propuesta')->storeAs('public', $propuesta->nombre_propuesta);
        
        $propuesta->save();
        $request->session()->flash('success', 'Propuesta Ingresada con Exito.');

        return redirect()->route('aprobarPropuestas');
    }
    

}
