<div class="container">
        <h1>Estudiantes</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
                <th scope="col">Cedula</th>
                <th scope="col">Carnet Universidad</th>
                <th scope="col">Correo Universidad</th>
                <th scope="col">Correo Personal</th>
                <th scope="col">Genero</th>
                <th scope="col">Sede</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
                @if($estudiantes && count($estudiantes) > 0)
                    @foreach ($estudiantes as $estudiante)
                        <tr>
                            <td>{{$estudiante->nombre}}</td>
                            <td>{{$estudiante->primer_apellido}}</td>
                            <td>{{$estudiante->segundo_apellido}}</td>
                            <td>{{$estudiante->cedula}}</td>
                            <td>{{$estudiante->carnet_universidad}}</td>
                            <td>{{$estudiante->correo_personal}}</td>
                            <td>{{$estudiante->correo_universidad}}</td>
                            <td>{{$estudiante->genero}}</td>
                            <td>{{$estudiante->sede}}</td>
                            <td>
                            <a class="btn btn-warning btn-sm" href="/editarEstudiante/{{$estudiante->id}}" role="button">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('eliminarEstudiante') }}" method="post">
                                        <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                        <input name="id_estudiante" type="hidden" value="{{$estudiante->id}}">
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