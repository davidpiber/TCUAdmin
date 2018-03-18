<div class="container">
        <h1>Ingresar Notas</h1>
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
                <th scope="col">Ingresar Nota</th>
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
                            <td>
                                <a class="btn btn-success btn-sm" href="/ingresarNota/{{$estudiante->id}}" role="button">Ingresar Nota</a>
                            </td>
                        </tr>  
                    @endforeach
                @endif
              <tr>
              </tr>
            </tbody>
          </table>
    </div>