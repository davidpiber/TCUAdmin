@extends('layouts.master')

@section('content')
@if(Auth::user() && Auth::user()->admin)
<div class="container col-md-6 contenedor-principal">
      <div class="panel panel-default">
        <div class="panel-body">
          Estudiantes
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          Mensajes
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          Reportes
      </div>
</div>
@else
        @include('includes.info-estudiantes')
<div class="container col-md-6 contenedor-principal">
      <div class="panel panel-default">
        <div class="panel-body">
        <a class="btn btn-primary register-button" href="/ingresarPropuesta" role="button">Ingresar Propuesta de TCU</a>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
        <a class="btn btn-primary register-button" href="/mensajes/{{Auth::user()->id}}" role="button">Mensajes</a>
      </div>
</div>
@endif
      <!-- Site footer -->
      <footer class="footer navbar-fixed-bottom">
        <p>Universidad latina de Costa Rica</p>
      </footer>

    </div> <!-- /container -->
@endSection
