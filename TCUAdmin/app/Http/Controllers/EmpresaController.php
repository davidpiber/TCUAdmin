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

    private function crearEmpresaaGuardar(Request $request){
        $empresa = Empresa::find($request['id']);
        $empresa->nombre_empresa = $request['nombre_empresa'];
        $empresa->cedula_juridica = $request['cedula_juridica'];
        $empresa->nombre_supervisor = $request['nombre_supervisor'];
        $empresa->primer_apellido_supervisor = $request['primer_apellido_supervisor'];
        $empresa->segundo_apellido_supervisor = $request['segundo_apellido_supervisor'];
        $empresa->telefono = $request['telefono'];
        $empresa->correo_supervisor = $request['correo_supervisor'];

        return $empresa;
    }

    private function crearEmpresa(Request $request){

        if (!Auth::check()){
            return view('welcome');
        }

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
        if (!Auth::check()){
            return view('welcome');
        }

        $this->validarRegistroEmpresa($request);
        $nuevaEmpresa = $this->crearEmpresa($request);
        $nuevaEmpresa->save();
        $request->session()->flash('success', 'Empresa Ingresada con Exito');
        return redirect()->route('principal');
    }

    public function getIngresarEmpresa(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        return view('contenedor-propuesta-empresa');
    }

    public function getEmpresas(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

        $empresas = Empresa::all();

        return view('contenedor-empresas')->with('empresas', $empresas);
    }

    public function getEditarEmpresa(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }
        
        $empresa = Empresa::where('id', '=',$request['id'])->first(); 
    
        return view('contenedor-editar-empresa')->with('empresa', $empresa);
    }

    public function postGuardarEmpresa(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

        $this->validarRegistroEmpresa($request);

        $empresaaGuardar = $this->crearEmpresaaGuardar($request);

        $empresaaGuardar->save();
        $request->session()->flash('success', 'Empresa Editada con Exito');

        if (!Auth::user()->admin) {
            return redirect()->route('principal');
        }

        return redirect()->route('empresas');
    }

    public function postEliminarEmpresa(Request $request) {
        if (!Auth::check()){
            return view('welcome');
        }

        $idEmpresa = $request['id'];

        if($idEmpresa){
            $empresaaBorrar = Empresa::find($idEmpresa);
            $empresaaBorrar->Delete();
        }
        $request->session()->flash('success', 'Empresa Eliminada con Exito');
        return redirect()->route('empresas');
    }
    
}
