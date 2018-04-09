<div class="container">
        <h1>Propuestas Estudiantes</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Estado</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Ver</th>
                <th scope="col">Borrar</th>
                <th scope="col">Aprobar</th>
                <th scope="col">Reprobar</th>
              </tr>
            </thead>
            <tbody>
                @if($propuestas && count($propuestas) > 0)
                    @foreach ($propuestas as $propuesta)
                        <tr>
                            <td>{{$propuesta->titulo}}</td>
                            <td>{{$propuesta->activa ? "Activa" : "Inactiva" }}</td>
                            <td>{{$propuesta->estudiante->nombre.' '.$propuesta->estudiante->primer_apellido}}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="/propuesta/{{$propuesta->id}}" role="button">Ver Propuesta</a>
                            </td>
                            <td>
                                <form action="{{ route('borrarPropuesta') }}" method="post">
                                    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                    <input name="id" type="hidden" value="{{$propuesta->id}}">
                                    {{ csrf_field() }}
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('aprobarPropuesta') }}" method="post">
                                    <button type="submit" class="btn btn-success btn-sm">Aprobar</button>
                                    <input name="id" type="hidden" value="{{$propuesta->id}}">
                                    {{ csrf_field() }}
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('reprobarPropuesta') }}" method="post">
                                    <button type="submit" class="btn btn-danger btn-sm">Reprobar</button>
                                    <input name="id" type="hidden" value="{{$propuesta->id}}">
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