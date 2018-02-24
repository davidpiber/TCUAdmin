<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Propuesta;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\MessageBag;

class EmpresaController extends Controller
{

    private function validarRegistroEmpresa(Request $request) {
        $this->validate($request, [
            'nombre_empresa' => 'required|max:255',
            'cedula_juridica' => 'required|max:255',
            'nombre_supervisor' => 'required|max:255',
            'primer_apellido_supervisor' => 'required|max:255',
            'segundo_apellido_supervisor' => 'required|max:255',
            'telefono' => 'required|max:255',
            'correo_supervisor' => 'required|max:255'
        ]);
    }

    private function crearEmpresa(Request $request){
        $empresa = new Empresa();
        $empresa->nombre_empresa = $request['nombre_empresa'];
        $empresa->cedula_juridica = $request['cedula_juridica'];
        $empresa->nombre_supervisor = $request['nombre_supervisor'];
        $empresa->primer_apellido_supervisor = $request['primer_apellido_supervisor'];
        $empresa->segundo_apellido_supervisor = $request['segundo_apellido_supervisor'];
        $empresa->telefono = $request['telefono'];
        $empresa->correo_supervisor = $request['correo_supervisor'];
        // Obtenemos la ultima propuesta ingresada por los estudiantes
        // hay q revisar si es valido usar la ultima o hacer el filtro en el query. 
        $propuesta = Propuesta::where('id_usuario', '=', Auth::user()->id)->latest()->first();
        $empresa->id_propuesta = $propuesta->id;
        return $empresa;
    }

    public function postIngresarEmpresa(Request $request) {
        $this->validarRegistroEmpresa($request);
        $nuevaEmpresa = $this->crearEmpresa($request);
        $nuevaEmpresa->save();
        return redirect()->route('principal');
    }

}
