<div class="container">
    <h1>Horarios</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Proyecto</th>
            <th scope="col">Cantidad Instructores</th>
            <th scope="col">Horario</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @if($horarios && count($horarios) > 0)
                @foreach ($horarios as $horario)
                    <tr>
                        <td>{{$horario->proyecto->nombre_proyecto}}</td>
                        <td>{{$horario->cantidad_instructores}}</td>
                        <td>{{$horario->horario}}</td>
                        <td>
                                <form action="{{ route('editarHorario') }}" method="post">
                                        <button type="submit" class="btn btn-warning">Editar Horario</button>
                                        <input name="id_horario" type="hidden" value="{{$horario->id}}">
                                        {{ csrf_field() }}
                                </form>
                        </td>
                        <td>
                                <form action="{{ route('eliminarHorario') }}" method="post">
                                        <button type="submit" class="btn btn-danger">Borrar Horario</button>
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