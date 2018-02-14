@extends('layouts.master')

@section('content')
<div class="loggedin-user container">
  Hola {{Auth::user()->nombre}}
</div>
@if(Auth::user()->admin)
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
</div>
@else
        @include('includes.info-estudiantes')
<div class="container col-md-6 contenedor-principal">
      <div class="panel panel-default">
        <div class="panel-body">
          Ingresar Propuesta de TCU
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
        Mensajes
      </div>
</div>
@endif


      <!-- Site footer -->
      <footer class="footer navbar-fixed-bottom">
        <p>Universidad latina de Costa Rica</p>
      </footer>

    </div> <!-- /container -->
@endSection
