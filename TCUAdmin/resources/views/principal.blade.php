@extends('layouts.master')

@section('content')
@if(Auth::user() && Auth::user()->admin)
<div class="panel panel-default container">
      <div class="row main-panel">
        <div class="col-sm-6">
          <div class="card card-style">
              <div class="card-body">
                <h5 class="card-title">Horarios</h5>
                <p class="card-text">Visualizar, Editar y Borrar Horarios.</p>
                <a href="/horarios" class="btn btn-success">Horarios</a>
              </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card card-style">
            <div class="card-body">
              <h5 class="card-title">Estudiantes</h5>
              <p class="card-text">Visualizar, Editar, Borrar y enviar Mensajes a Estudiantes.</p>
              <a href="/estudiantes" class="btn btn-success">Estudiantes</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-style">
              <div class="card-body">
                <h5 class="card-title">Ingresar Horarios</h5>
                <p class="card-text">Ingresar Horarios para los Proyectos Pre Aprobados.</p>
                <a href="/ingresarHorarios" class="btn btn-success">Ingresar Horarios</a>
              </div>
            </div>
          </div>
        <div class="col-sm-6">
          <div class="card card-style">
            <div class="card-body">
              <h5 class="card-title">Propuestas Estudiantes</h5>
              <p class="card-text">Aprobar Propuestas de los Estudiantes.</p>
              <a href="/aprobarPropuestas" class="btn btn-success">Propuestas Estudiantes</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-style">
              <div class="card-body">
                <h5 class="card-title">Matriculas de Horarios</h5>
                <p class="card-text">Visualizar, Editar y Borrar Matrículas de Horarios de Estudiantes.</p>
                <a href="/horariosMatriculadosEstudiantes" class="btn btn-success">Horarios Estudiantes</a>
              </div>
            </div>
        </div>
        <div class="col-sm-6">
          <div class="card card-style">
            <div class="card-body">
              <h5 class="card-title">Ingresar Proyecto Pre Aprobado</h5>
              <p class="card-text">Ingresar un Proyecto Pre Aprobado.</p>
              <a href="/ingresarProyectoPreaprobado" class="btn btn-success">Ingresar Proyecto Pre Aprobado</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-style">
              <div class="card-body">
                <h5 class="card-title">Notas Estudiantes</h5>
                <p class="card-text">Visualizar, Editar y Borrar Notas.</p>
                <a href="/notasEstudiantes" class="btn btn-success">Notas Estudiantes</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
              <div class="card card-style">
                <div class="card-body">
                  <h5 class="card-title">Proyectos Pre Aprobados</h5>
                  <p class="card-text">Visualizar, Editar y Borrar Proyectos Pre Aprobados.</p>
                  <a href="/proyectosPreaprobados" class="btn btn-success">Proyectos Pre Aprobados</a>
                </div>
              </div>
            </div>
        <div class="col-sm-6">
          <div class="card card-style">
            <div class="card-body">
              <h5 class="card-title">Empresas</h5>
              <p class="card-text">Visualizar Información de Empresas Registradas en Propuestas.</p>
              <a href="/empresas" class="btn btn-success">Empresas</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-style">
              <div class="card-body">
                <h5 class="card-title">Ingresar Notas</h5>
                <p class="card-text">Ingresar Notas para los Estudiantes.</p>
                <a href="/ingresarNotas" class="btn btn-success">Ingresar Notas</a>
              </div>
            </div>
          </div>
        <div class="col-sm-6">
          <div class="card card-style">
            <div class="card-body">
              <h5 class="card-title">Mensajes</h5>
              <p class="card-text">Visualizar, Editar y Borrar Mensajes.</p>
              <a href="/mensajes" class="btn btn-success">Mensajes</a>
            </div>
          </div>
        </div>
      </div>
</div>
@else

<div class="panel panel-default container">
    <div class="row main-panel">
        <div class="col-sm-4">
            <div class="card card-style">
              <div class="card-body">
                <h5 class="card-title">Ingresar Propuesta TCU</h5>
                <p class="card-text">Ingresar la Propuesta de TCU, Pre Aprobada o Empresa.</p>
                <a href="/tipoPropuesta" class="btn btn-success">Ingresar Propuesta</a>
              </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card card-style">
              <div class="card-body">
                <h5 class="card-title">Mensajes</h5>
                <p class="card-text">Ver los Mensajes de los Administradores.</p>
                <a href="/mensajesEstudiante/{{Auth::user()->id}}" class="btn btn-success">Mensajes</a>
              </div>
            </div>
        </div>
        @if($mensajesSinleer && $mensajesSinleer > 0)
          <div class="col-sm-4">
              <div class="card card-style">
                <div class="card-body">
                  <h5 class="card-title">Tienes Mensajes que requieren tu atención.</h5>
                  <div class="alert alert-danger">
                      <ul>
                          <li>Tienes {{$mensajesSinleer}} mensajes sin leer.</li>
                      </ul>
                  </div>
                </div>
              </div>
          </div>
      @endif
      <div class="col-sm-4">
          <div class="card card-style">
            <div class="card-body">
              <h5 class="card-title">Horarios Matriculados</h5>
              <p class="card-text">Ver los Horarios Matrículados.</p>
              <a href="/horariosMatriculados/{{Auth::user()->id}}" class="btn btn-success">Horarios Matrículados</a>
            </div>
          </div>
      </div>
      @if($propuesta)
      <div class="col-sm-4">
          <div class="card card-style">
            <div class="card-body">
              <h5 class="card-title">Editar Propuesta Ingresada</h5>
              <p class="card-text">Editar la Propuesta de Empresa Ingresada.</p>
              <a href="/editarPropuesta" class="btn btn-success">Editar Propuesta</a>
            </div>
          </div>
      </div>
      @endif
      @if($empresa && $empresa->count() > 0)
          <div class="col-sm-4">
            <div class="card card-style">
                <div class="card-body">
                    <h5 class="card-title">Editar Empresa Ingresada</h5>
                    <p class="card-text">Editar la Empresa Ingresada.</p>
                    <a href="/editarEmpresa/{{$empresa->id}}" class="btn btn-success">Editar Empresa</a>
                </div>
              </div>
            </div>
      @endif
    </div>
</div>
      <div class="container panel panel-default">
          <h3 class="card-title">Guías para proyectos Pre Aprobados</h3>
          <div class="row main-panel">
              <div class="col-sm-6">
                  <div class="card card-style">
                    <div class="card-body">
                      <h5 class="card-title">Guía para elaboración del TCU</h5>
                      <a class="btn btn-info" href="{{Storage::url('GuiaAnteproyo2017.docx')}}" download="{{Storage::url('GuiaAnteproyo2017.docx')}}">
                          <span class="glyphicon glyphicon-download"></span>Descargar Guía
                        </a>
                    </div>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="card card-style">
                    <div class="card-body">
                      <h5 class="card-title">Guía para Proyecto Pre Aprobado RoboTico</h5>
                      <a class="btn btn-info" href="{{Storage::url('robotico.pdf')}}" download="{{Storage::url('robotico.pdf')}}">
                          <span class="glyphicon glyphicon-download"></span>Descargar Guía
                        </a>
                    </div>
                  </div>
              </div>
              @if($propuesta && $propuesta->cantidad_revisiones == 1)
                <div class="col-sm-6">
                    <div class="card card-style">
                      <div class="card-body">
                        <h5 class="card-title">Tu Propuesta tiene cambios que requieren tu Atención, descarga la Propuesta, corrige los Cambios y vuelva a subirla al Sistema.</h5>
                        <div class="alert alert-danger">
                          <a class="btn btn-info" href="{{Storage::url($propuesta->nombre_propuesta)}}" download="{{Storage::url($propuesta->nombre_propuesta)}}">
                            <span class="glyphicon glyphicon-download"></span>Descargar Propuesta
                          </a>
                        </div>
                      </div>
                    </div>
                </div>
              @endif
          </div>
      </div>

@endif
      <!-- Site footer -->
      <footer class="footer navbar-fixed-bottom">
       <div class="row">
        <p class="footer-text">Universidad Latina de Costa Rica - Teléfono: (506) 2277-8261 - Correo: <a class="mail-link" href="mailto:infosistemas@ulatina.cr">infosistemas@ulatina.cr</a></p> 
       </div>
      </footer>
    </div> <!-- /container -->
@endSection
