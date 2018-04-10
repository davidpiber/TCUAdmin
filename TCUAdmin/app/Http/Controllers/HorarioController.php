<?php

namespace App\Http\Controllers;

use App\Horario;
use App\ProyectoPreaprobado;
use App\UsuarioHorario;
use App\Usuario;
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
            'cantidad_instructores' => 'required|max:255',
            'ubicacion' => 'required|max:255',
            'fecha_inicio' => 'required|max:255'
        ]);
    }

    private function crearHorario(Request $request){
        $horario = new Horario();
        $horario->horario = $request['horario'];
        $horario->cantidad_instructores = $request['cantidad_instructores'];
        $horario->id_proyecto = $request['id_proyecto'];
        $horario->ubicacion = $request['ubicacion'];
        $horario->fecha_inicio = $request['fecha_inicio'];

        return $horario;
    }

    public function IngresarHorario(Request $request) {
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
        $request->session()->flash('success', 'Horario Registrado');
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
        $ubicacion = $request['ubicacion'];
        $fecha_inicio = $request['fecha_inicio'];


        if($idHorario && $horario && $cantidadInstructores){
            $horarioaActualizar = Horario::find($idHorario);
            $horarioaActualizar->horario = $horario;
            $horarioaActualizar->cantidad_instructores = $cantidadInstructores;
            $horarioaActualizar->ubicacion = $ubicacion;
            $horarioaActualizar->fecha_inicio = $fecha_inicio;
            $horarioaActualizar->save();
        }
        $request->session()->flash('success', 'Horario Editado con Exito');
        return redirect()->route('horarios');
    }

    public function postEliminarHorario(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

        $idHorario = $request['id_horario'];

        if($idHorario){
            $horarioaBorrar = Horario::find($idHorario);

            $usuarioHorario = UsuarioHorario::where('id_horario', '=',$horarioaBorrar->id)->first();

            if($usuarioHorario && $usuarioHorario->count() > 0) {
                $request->session()->flash('warning', 'Existen Estudiantes matriculados a este Horario, debe eliminar la Matricula antes de eliminar este Horario.');
                return redirect()->route('horarios');
            }

            $horarioaBorrar->Delete();
        }
        $request->session()->flash('success', 'Horario Eliminado con Exito');
        return redirect()->route('horarios');
    }

    public function getHorarios(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $horarios = Horario::all();
        foreach ($horarios as $horario) {
            $horario->proyecto = ProyectoPreaprobado::where('id', '=', $horario->id_proyecto)->first();
        }

        return view('contenedor-horarios')->with('horarios', $horarios);
    }

    public function gethorariosMatriculados(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $usuarioHorarios = UsuarioHorario::all();

        foreach($usuarioHorarios as $usuarioHorario) {
            $usuarioHorario->horario = Horario::where('id', '=', $usuarioHorario->id_horario)->first();
            $usuarioHorario->usuario = Usuario::where('id', '=', $usuarioHorario->id_usuario)->first();
            $usuarioHorario->proyecto = ProyectoPreaprobado::where('id', '=', $usuarioHorario->horario->id_proyecto)->first();
        }

        return view('contenedor-horarios-matriculados')->with('usuarioHorarios', $usuarioHorarios);
    }

}
