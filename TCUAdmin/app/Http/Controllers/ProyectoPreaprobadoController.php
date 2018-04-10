<?php

namespace App\Http\Controllers;

use App\ProyectoPreaprobado;
use App\Nota;
use App\Horario;
use App\UsuarioHorario;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\MessageBag;
use DateTime;

class ProyectoPreaprobadoController extends Controller
{

    private function validarProyectoPreaprobado(Request $request) {
        $this->validate($request, [
            'nombre_proyecto' => 'required|max:255',
            'descripcion_proyecto' => 'required|max:255'
        ]);
    }

    private function crearProyectoPreaprobado(Request $request){
        if (!Auth::check()){
            return view('welcome');
        }

        $proyectoPreaprobado = new ProyectoPreaprobado();
        $proyectoPreaprobado->nombre_proyecto = $request['nombre_proyecto'];
        $proyectoPreaprobado->descripcion_proyecto = $request['descripcion_proyecto'];
        $activo = $request['activo'];
        $proyectoPreaprobado->activo = $activo && $activo == 'true' ? true : false;
        return $proyectoPreaprobado;
    }

    public function postIngresarProyectoPreaprobado(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

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
        $proyecto = ProyectoPreaprobado::where('id', '=', $idProyecto)->first();
        if($notasEstudiante >= 1) {
            $horarios = Horario::where('id_proyecto', '=', $idProyecto)->get();
            foreach ($horarios as $horario) {
                $horario->proyecto = ProyectoPreaprobado::where('id', '=', $horario->id_proyecto)->first();
            }
            
            return view('contenedor-matricular-horarios')->with('horarios', $horarios)->with('proyecto', $proyecto);
        }
        return view('contenedor-matricular-horarios-error')->with('notas', $notasEstudiante);;

    }

    public function postMatricularHorario(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $id_horario = $request['id_horario'];
        $id_usuario = $request['id_usuario'];
        // En caso de que algun otro estudiante haya matriculdo en este segundo
        $cantidadIntructores = Horario::where('id', '=', $id_horario)->first()->cantidad_instructores;

        if($cantidadIntructores && $cantidadIntructores > 0) {

            //Revisamos si ya el usuario amtriculo este horario.
            $cantidadMatriculas = UsuarioHorario::where('id_usuario', '=', $id_usuario)->count();

            if($cantidadMatriculas == 0) {
                $usuarioHorario = new UsuarioHorario();
                $usuarioHorario->id_horario = $id_horario;
                $usuarioHorario->id_usuario = $id_usuario;
                $usuarioHorario->save();
    
                //actualizamos la cantidad de instructores para el horario.
                $horario = Horario::find($id_horario);
                $horario->cantidad_instructores	 = $horario->cantidad_instructores - 1;
                $horario->save();
                $request->session()->flash('success', 'Horario Matriculado con Exito');
            } else {
                $request->session()->flash('error', 'Este Horario ya fue Matriculado.');
                return redirect()->route('principal');
            }
        }
        
        return redirect()->route('principal');
    }

    public function getProyectosPreaprobados(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $proyectos = ProyectoPreaprobado::all();

        return view('contenedor-proyectos-preaprobados')->with('proyectos', $proyectos);
    }


    public function postEliminarProyecto(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

        $idproyecto = $request['id'];

        if($idproyecto){
            $proyectoaBorrar = ProyectoPreaprobado::find($idproyecto);

            $horario = Horario::where('id_proyecto', '=',$proyectoaBorrar->id)->first();
            if($horario && $horario->count() > 0) {
                $request->session()->flash('warning', 'Existe un Horario relacionado con esta Proyecto, debe eliminar el Horario antes de eliminar este Proyecto.');
                return redirect()->route('proyectosPreaprobados');
            }

            $nota = Nota::where('id_proyecto_preaprobado', '=',$proyectoaBorrar->id)->first();
            if($nota && $nota->count() > 0) {
                $request->session()->flash('warning', 'Existe una Nota relacionada con esta Proyecto, debe eliminar la Nota antes de eliminar este Proyecto.');
                return redirect()->route('proyectosPreaprobados');
            }

            $proyectoaBorrar->Delete();
        }
        $request->session()->flash('success', 'Proyecto Eliminado con Exito');
        return redirect()->route('proyectosPreaprobados');
    }

    

    public function editarproyecto(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $proyecto = ProyectoPreaprobado::where('id', '=', $request['id'])->first();
        return view('contenedor-editar-proyecto-preaprobado')->with('proyecto', $proyecto);

    }

    public function postGuardarProyectoPreaprobado(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

        $this->validarProyectoPreaprobado($request);
        $proyectoAGuardar = ProyectoPreaprobado::find($request['id']); 
        $proyectoAGuardar->nombre_proyecto = $request['nombre_proyecto'];
        $proyectoAGuardar->descripcion_proyecto = $request['descripcion_proyecto'];
        $proyectoAGuardar->activo = $request['activo'] && $request['activo']== 'true' ? true : false;

        $proyectoAGuardar->save();
        $request->session()->flash('success', 'Proyecto Actulizado con Exito');
        return redirect()->route('proyectosPreaprobados');
    }

    

}
