@extends('layouts.master')

@section('content')
@if(Auth::user() && Auth::user()->admin)
<div class="panel panel-default container">
      <div class="row main-panel">
        <div class="col-sm-6">
          <div class="card card-style">
            <div class="card-body">
              <h5 class="card-title">Estudiantes</h5>
              <p class="card-text">Visualizar, Editar, Borrar y enviar mensajes a Estudiantes.</p>
              <a href="/estudiantes" class="btn btn-success">Estudiantes</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card card-style">
            <div class="card-body">
              <h5 class="card-title">Propuestas Estudiantes</h5>
              <p class="card-text">Aprobar propuestas de los Estudiantes.</p>
              <a href="/aprobarPropuestas" class="btn btn-success">Propuestas Estudiantes</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card card-style">
            <div class="card-body">
              <h5 class="card-title">Proyecto Preaprobado</h5>
              <p class="card-text">Ingresar un Proyecto Prearobado.</p>
              <a href="/ingresarProyectoPreaprobado" class="btn btn-success">Proyecto Preaprobado</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card card-style">
            <div class="card-body">
              <h5 class="card-title">Ingresar Horarios</h5>
              <p class="card-text">Ingresar Horarios para los proyectos preaprobados.</p>
              <a href="/ingresarHorarios" class="btn btn-success">Ingresar Horarios</a>
            </div>
          </div>
        </div>
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
              <h5 class="card-title">Propuestas Empresas</h5>
              <p class="card-text">Visualizar propuestas de Empresas de los Estudiantes.</p>
              <a href="/empresas" class="btn btn-success">Propuestas Empresas</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card card-style">
            <div class="card-body">
              <h5 class="card-title">Mensajes</h5>
              <p class="card-text">Visualizar, Editar y Borrar Empresas.</p>
              <a href="/mensajes" class="btn btn-success">Mensajes</a>
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
              <h5 class="card-title">Notas Estudiantes</h5>
              <p class="card-text">Visualizar, Editar y Borrar Notas.</p>
              <a href="/notasEstudiantes" class="btn btn-success">Notas Estudiantes</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-style">
              <div class="card-body">
                <h5 class="card-title">Horarios Estudiantes</h5>
                <p class="card-text">Visualizar, Editar y Borrar matriculas de Horarios de Estudiantes.</p>
                <a href="/horariosMatriculadosEstudiantes" class="btn btn-success">Horarios Estudiantes</a>
              </div>
            </div>
          </div>
      </div>
</div>
@else
      <div class="container panel panel-default">
        <div class="row main-panel">
            <div class="col-sm-6">
                <div class="card card-style">
                  <div class="card-body">
                    <h5 class="card-title">Ingresar Propuesta TCU</h5>
                    <p class="card-text">Ingresar la propuesta de TCU, preaprobada o Empresa.</p>
                    <a href="/tipoPropuesta" class="btn btn-success">Ingresar Propuesta</a>
                  </div>
                </div>
              </div>
                  <div class="col-sm-6">
                      <div class="card card-style">
                        <div class="card-body">
                          <h5 class="card-title">Mensajes</h5>
                          <p class="card-text">Ver los mensajes de los administradores.</p>
                          <a href="/mensajesEstudiante/{{Auth::user()->id}}" class="btn btn-success">Mensajes</a>
                        </div>
                      </div>
                  </div>
                  @if($mensajesSinleer && $mensajesSinleer > 0)
                  <div class="col-sm-6">
                      <div class="card card-style">
                        <div class="card-body">
                          <h5 class="card-title">Tienes mensajes que requieren tu atención.</h5>
                          <div class="alert alert-danger">
                              <ul>
                                  <li>Tienes {{$mensajesSinleer}} mensajes sin leer.</li>
                              </ul>
                          </div>
                        </div>
                      </div>
                  </div>
                @endif
                <div class="col-sm-6">
                    <div class="card card-style">
                      <div class="card-body">
                        <h5 class="card-title">Horarios Matriculados</h5>
                        <p class="card-text">Ver los horarios mariculados.</p>
                        <a href="/horariosMatriculados/{{Auth::user()->id}}" class="btn btn-success">Horarios Matriculados</a>
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card card-style">
                      <div class="card-body">
                        <h5 class="card-title">Editar Propuesta Ingresada</h5>
                        <p class="card-text">Editar la Propuesta de Empresa Ingresada.</p>
                        <a href="/editarPropuestaEmpresa/{{Auth::user()->id}}" class="btn btn-success">Editar Propuesta</a>
                      </div>
                    </div>
                </div>
        </div>
      </div>

@endif
      <!-- Site footer -->
      <footer class="footer navbar-fixed-bottom">
        <p class="footer-text">Universidad latina de Costa Rica</p>
      </footer>
    </div> <!-- /container -->
@endSection
