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
        $mensaje->id_usuario_envia = $request['id_horario_envia'];
        $mensaje->visto = false;
        $mensaje->save();

        $request->session()->flash('success', 'Mensaje Enviado con Exito');
        return redirect()->route('estudiantes');

    }

}
