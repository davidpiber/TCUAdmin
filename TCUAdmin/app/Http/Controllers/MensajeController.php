<?php

namespace App\Http\Controllers;

use App\Mensaje;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\MessageBag;
use DateTime;

class MensajeController extends Controller {

    private function validarMensaje(Request $request) {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required|max:255'
        ]);
    }

    private function actualizarMensajeVisto($id) {
        $mensaje = Mensaje::find($id);
        $mensaje->visto = true;
        $mensaje->save();
    }

    public function getEnviarMensaje(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

        $usuario = Usuario::where('id', '=', $request['id'])->first();
        return view('contenedor-registrar-mensaje')->with('usuario', $usuario);

    }

    public function postRegistrarMensaje(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $this->validarMensaje($request);
        $mensaje = new Mensaje();
        $mensaje->titulo = $request['titulo'];
        $mensaje->descripcion = $request['descripcion'];
        $mensaje->id_usuario = $request['id_usuario'];
        $mensaje->fecha = new DateTime();
        $mensaje->id_usuario_envia = $request['id_usuario_envia'];
        $mensaje->visto = false;
        $mensaje->save();

        $request->session()->flash('success', 'Mensaje Enviado con Exito');
        return redirect()->route('estudiantes');

    }

    public function getMensajes(Request $request) {
        if (!Auth::check() || !Auth::user()->admin){
            return view('welcome');
        }
        $mensajes = Mensaje::all();
        foreach ($mensajes as $mensaje) {
            $mensaje->usuario = Usuario::where('id', '=', $mensaje->id_usuario)->first();
            $mensaje->usuario_envia = Usuario::where('id', '=', $mensaje->id_usuario_envia)->first();
            $mensaje->fecha = new DateTime($mensaje->fecha);
            $mensaje->fecha = $mensaje->fecha->format('d-m-Y');
        }

        return view('contenedor-mensajes')->with('mensajes', $mensajes);

    }

    public function getEditarMensaje(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $mensaje = Mensaje::find($request['id']);

        return view('contenedor-editar-mensaje')->with('mensaje', $mensaje);
    }

    public function editarMensaje(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $mensaje = Mensaje::find($request['id']);
        $mensaje->titulo = $request['titulo'];
        $mensaje->descripcion = $request['descripcion'];
        $mensaje->id_usuario = $request['id_usuario'];
        $mensaje->fecha = new DateTime();
        $mensaje->id_usuario_envia = $request['id_usuario_envia'];
        $mensaje->visto = false;
        $mensaje->save();
        $request->session()->flash('success', 'Mensaje Editado con Exito');
        return redirect()->route('mensajes');
    }

    public function getMensajesEstudiante(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $mensajes = Mensaje::where('id_usuario', '=', $request['id'])->get();

        foreach ($mensajes as $mensaje) {
            $mensaje->usuario_envia = Usuario::where('id', '=', $mensaje->id_usuario_envia)->first();
            $mensaje->fecha = new DateTime($mensaje->fecha);
            $mensaje->fecha = $mensaje->fecha->format('d-m-Y');
            $mensaje->titulo = substr($mensaje->titulo, 0, 25);
            $mensaje->descripcion = substr($mensaje->titulo, 0, 25);
        }

        return view('contenedor-mensajes-estudiante')->with('mensajes', $mensajes);
    }

    public function getMensaje(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        $idMensaje = $request['id'];
        $mensaje = Mensaje::find($idMensaje);
        $mensaje->usuarioEnvia = Usuario::find($mensaje->id_usuario_envia);
        $this->actualizarMensajeVisto($idMensaje);
        $mensaje->usuarioEnvia->nombre = ucwords($mensaje->usuarioEnvia->nombre);

        return view('contenedor-mensaje-estudiante')->with('mensaje', $mensaje);
    }

    public function postEliminarMensaje(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

        $idMensaje = $request['id_mensaje'];

        if($idMensaje){
            $mensajeaBorrar = Mensaje::find($idMensaje);
            $mensajeaBorrar->Delete();
        }
        $request->session()->flash('success', 'Mensaje Eliminado con Exito');
        return redirect()->route('mensajes');
    }

}
