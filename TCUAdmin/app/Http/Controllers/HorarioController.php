<?php

namespace App\Http\Controllers;

use App\Horario;
use App\ProyectoPreaprobado;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\MessageBag;

class HorarioController extends Controller
{

    private function validarRegistro(Request $request) {
        $this->validate($request, [
            'horario' => 'required|max:255',
            'cantidad_instructores' => 'required|max:255',
            'id_proyecto' => 'required'
        ]);
    }

    private function crearHorario(Request $request){
        $horario = new Horario();
        $horario->horario = $request['horario'];
        $horario->cantidad_instructores = $request['cantidad_instructores'];
        $horario->id_proyecto = $request['id_proyecto'];

        return $horario;
    }

    public function postIngresarHorario(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $proyecto = ProyectoPreaprobado::where('id', '=', $request['id_proyecto'])->first();
        
        return view('contenedor-ingresar-horario')->with('proyecto', $proyecto);
    }

    public function postRegistrarHorario(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $this->validarRegistro($request);
        $horario = $this->crearHorario($request);
        $horario->save();
        
        return redirect()->route('principal');
    }

}
