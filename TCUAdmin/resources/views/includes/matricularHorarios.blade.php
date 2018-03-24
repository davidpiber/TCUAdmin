<div class="container">
        <h1>Horarios</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Proyecto</th>
                <th scope="col">Espacios Disponibles</th>
                <th scope="col">Horario</th>
                <th scope="col">Borrar</th>
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
                                <form action="{{ route('matricularHorario') }}" method="post">
                                    <button type="submit" class="btn btn-sm btn-success">Matricular</button>
                                    <input name="id_horario" type="hidden" value="{{$horario->id}}">
                                    <input name="id_usuario" type="hidden" value="{{Auth::user()->id}}">
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