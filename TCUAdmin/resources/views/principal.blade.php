@extends('layouts.master')

@section('content')
@if(Auth::user() && Auth::user()->admin)
<div class="container col-md-6 contenedor-principal">
      <div class="panel panel-default">
        <div class="panel-body">
          <a class="btn btn-primary register-button" href="/estudiantes" role="button">Estudiantes</a>
          <a class="btn btn-primary register-button" href="/aprobarPropuestas" role="button">Propuestas Estudiantes</a>
          <a class="btn btn-primary register-button" href="/ingresarProyectoPreaprobado" role="button">Ingresar Proyecto Preaprobado</a><br/>
          <a class="btn btn-primary register-button" href="/ingresarHorarios" role="button">Ingresar Horarios</a><br/>
          <a class="btn btn-primary register-button" href="/horarios" role="button">Horarios</a><br/>
          <a class="btn btn-primary register-button" href="/empresas" role="button">Empresas</a>
          <a class="btn btn-primary register-button" href="/mensajes" role="button">Mensajes</a>
        </div>
      </div>
</div>
@else
        @include('includes.info-estudiantes')
<div class="container col-md-6 contenedor-principal">
      <div class="panel panel-default">
        <div class="panel-body">
        <a class="btn btn-primary register-button" href="/tipoPropuesta" role="button">Ingresar Propuesta de TCU</a>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
        <a class="btn btn-primary register-button" href="/mensajesEstudiante/{{Auth::user()->id}}" role="button">Mensajes</a>
      </div>
</div>
@endif
      <!-- Site footer -->
      <footer class="footer navbar-fixed-bottom">
        <p>Universidad latina de Costa Rica</p>
      </footer>

    </div> <!-- /container -->
@endSection
