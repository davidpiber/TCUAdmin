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

    private function validarGuardarHorario(Request $request) {
        $this->validate($request, [
            'id_horario' => 'required|max:255',
            'horario' => 'required|max:255',
            'cantidad_instructores' => 'required|max:255'
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

    public function EditarHorario(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $horario = Horario::where('id', '=', $request['id'])->first();
        $proyecto = ProyectoPreaprobado::where('id', '=', $horario->id_proyecto)->first();
        return view('contenedor-editar-horario')->with('horario', $horario)->with('proyecto', $proyecto);

    }

    public function postGuardarHorario(Request $request) {
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

        return redirect()->route('principal');

    }

    public function getHorarios(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $horarios = Horario::all();
        $horariosConproyecto;
        foreach ($horarios as $horario) {
            $horario->proyecto = ProyectoPreaprobado::where('id', '=', $horario->id_proyecto)->first();
        }
         //dd($horarios->proyecto->nombre_proyecto);

        return view('contenedor-horarios')->with('horarios', $horarios);
    }

}
