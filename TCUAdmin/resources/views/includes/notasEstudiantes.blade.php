<div class="container">
        <h1>Notas</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nota</th>
                <th scope="col">Descripción</th>
                <th scope="col">Nombre Estudiante</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
                @if($notas && count($notas) > 0)
                    @foreach ($notas as $nota)
                        <tr>
                            <td>{{$nota->nota}}</td>
                            <td>{{$nota->descripcion}}</td>
                            <td>{{$nota->estudiante->nombre}}</td>
                            <td>{{$nota->estudiante->primer_apellido}}</td>
                            <td>{{$nota->estudiante->segundo_apellido}}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="/editarNota/{{$nota->id}}" role="button">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('eliminarNota') }}" method="post">
                                        <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                        <input name="id_nota" type="hidden" value="{{$nota->id}}">
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