<div class="container">
    <h1>Horarios</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Proyecto</th>
            <th scope="col">Cantidad Instructores</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Horario</th>
            <th scope="col">Editar</th>
            <th scope="col">Borrar</th>
          </tr>
        </thead>
        <tbody>
            @if($horarios && count($horarios) > 0)
                @foreach ($horarios as $horario)
                    <tr>
                        <td>{{$horario->proyecto->nombre_proyecto}}</td>
                        <td>{{$horario->cantidad_instructores}}</td>
                        <td>{{$horario->ubicacion}}</td>
                        <td>{{$horario->fecha_inicio}}</td>
                        <td>{{$horario->horario}}</td>
                        <td>
                        <a class="btn btn-sm btn-warning" href="/editarHorario/{{$horario->id}}" role="button">Editar Horario</a>
                        </td>
                        <td>
                            <form action="{{ route('eliminarHorario') }}" method="post">
                                <button type="submit" class="btn btn-sm btn-danger">Borrar Horario</button>
                                <input name="id_horario" type="hidden" value="{{$horario->id}}">
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>  
                @endforeach
            @endif
          <tr>
          </tr>
        </tbody>
      </table>
</div>